<?php
namespace ThunderCore;


use Doctrine\ORM\EntityManagerInterface;
use Firebase\JWT\JWT;
use GuzzleHttp\Psr7\ServerRequest;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use ThunderCore\Config\Config;
use Generator;
use ThunderCore\entity\UsersAuthMethods;
use ThunderCore\Logger\Interfaces\LoggerHelperInterface;
use ThunderCore\Logger\Traits\LoggerHelperTrait;
use ThunderCore\modules\Session\Entity\Session;
use ThunderCore\modules\Session\Entity\SessionRepository;
use ThunderCore\modules\Session\Entity\Users;

class Helper implements LoggerHelperInterface
{
    use LoggerHelperTrait;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var string
     */
    protected $basepath;
    /**
     * @var string
     */
    protected $session_key = 'user';

    /**
     * @var bool
     */
    protected $session_destroy = true;

    protected $jwt = false;


    /**
     * Base constructor.
     * @param EntityManagerInterface $entityManager
     * @param Config $config
     * @param LoggerInterface|null $logger
     */
    public function __construct(EntityManagerInterface $entityManager, Config $config, LoggerInterface $logger = null)
    {
        $this->entityManager = $entityManager;
        $this->basepath = $config->get(array('routing','basepath'), '/');
        $this->config = $config->fromDimension(array('route','modules'));
        $this->jwt = $config->get(array('jwt'),false);
        $this->setLogDebug($this->config->get('debug', false));
        if ($logger) {
            $this->setLogger($logger);
        }
        $this->session_key = $this->config->get(array('Session', 'session_key'), 'user');
        $this->session_destroy = $this->config->get(array('Session', 'session_destroy'), true);
    }


    /**
     * @param bool $active
     * @param null $hidden
     * @return Generator
     */
    public function getModulesList($active = true, $hidden = null)
    {
        $where = array();
        if (!is_null($active)) {
            $where['active'] = (bool)$active;
        }
        if (!is_null($hidden)) {
            $where['hidden'] = (bool)$hidden;
        }
        /*  $modules = $this->entityManager->getRepository('Wave:Modules')->findBy($where, array('ord' => 'ASC'));
      if (!empty($modules)) {
            foreach ($modules as $module) {

                if ($this->isWaveModule($module->getClassname())) {
                    yield $module->getClassname();
                }
            }
        }*/
    }

    /**
     * @param $fields
     * @return bool
     */
    public function validateFields($fields)
    {
        $invalidField = "";
        foreach ($fields as $field => $type) {
            if ($type == "string") {
                if (empty($field)) {
                    $invalidField = "empty_field";
                }else{
                    if (mb_strlen($field) < 3) {
                        $invalidField = "too_few_char";
                    }
                }
            }
            if($type == "int"){
                if(!is_numeric($field)){
                    $invalidField = "empty_field";
                }
            }
        }

        return $invalidField;
    }

    /**
     * @return array
     */
    public function getMenu()
    {
        $menu = array();
        $has_active = 0;

        $sessionUser = $this->getSessionUser();

        foreach ($this->getModulesList(true, false) as $module) {
            $menu_items = $this->config->get(array($module::NAME,'menu'), array());
            foreach ($menu_items as $menu_item) {
                $ignoreBasepath = $menu_item["ignoreBasepath"] || !is_null(parse_url($menu_item['url'], PHP_URL_SCHEME));
                if (!$ignoreBasepath) {
                    $menu_item['url'] = $this->getRealUrl($menu_item['url']);
                }
                if (!empty($menu_item['require_permission'])) {
                    if (!$sessionUser || !$sessionUser->hasPermission($menu_item['require_permission'][0], $menu_item['require_permission'][1])) {
                        continue;
                    }
                }
                if (strpos(ServerRequest::fromGlobals()->getUri()->getPath(), $menu_item['url'].'/') === 0) {
                    $menu_item['active'] = true;
                }
                if (!$has_active) {
                    $has_active = $this->isMenuActive($menu_item);
                }
                if (!empty($menu_item["menu"])) {
                    foreach ($menu_item["menu"] as $sub_menu_key => $sub_menu_item) {
                        $ignoreBasepath = $sub_menu_item["ignoreBasepath"] || !is_null(parse_url($sub_menu_item['url'], PHP_URL_SCHEME));

                        if (!$ignoreBasepath) {
                            $menu_item["menu"][$sub_menu_key]["url"] = $this->getRealUrl($sub_menu_item['url']);
                        }
                    }
                }
                $menu[] = $menu_item;
            }
        }

        return $menu;
    }


    /**
     * @return bool|object
     */
    public function getSessionUser()
    {
        if (!empty($_SESSION[$this->session_key])) {
            /** @var SessionRepository $sessionRepository */
            $sessionRepository = $this->entityManager->getRepository($this->config->get(array('session', 'entity', 'session'), 'Session:Session'));
            /** @var Session $session */
            $session = $sessionRepository->findOneBy(array('user' => $_SESSION[$this->session_key], 'sessionId' => session_id()));
            if ($session) {
                return $session->getUser();
            }
        }else{
            $headerToken = isset($_SERVER["HTTP_THUNDERTOKEN"]) ? $_SERVER["HTTP_THUNDERTOKEN"] : '';
            $token = (isset($_GET["thunder_token"]) ? $_GET["thunder_token"] : (isset($_POST["thunder_token"]) ? $_POST["thunder_token"] : (!empty($headerToken) ? $headerToken : "")));
            if(!empty($token)){
                try{
                    $decodedData = JWT::decode($token, $this->jwt["key"], array('HS256'));
                    if(is_object($decodedData)){
                        $fetchData = $decodedData->data;
                        /** @var Users $getAuthMethod */
                        return $this->entityManager->getRepository('Session:Users')->findOneBy(array('hash'=>$fetchData->hash));
                    }
                }catch (\Exception $e){}
            }
        }
        return false;
    }

    /**
     * @param ServerRequestInterface $request
     * @return string
     */
    public function parseLang(ServerRequestInterface $request, Config $config)
    {
        $params = $request->getQueryParams();
        if (array_key_exists('request', $params)) {
            $tmp = explode('/', $params['request']);
            $lng = array_shift($tmp);
            $headerLang = (isset($_SERVER["HTTP_THUNDERLANG"]) ? $_SERVER["HTTP_THUNDERLANG"] : null);
            return in_array($lng, $config->get('languages', array('en'))) ? $lng : (!empty($headerLang) ? (in_array($headerLang,$config->get('languages', array('en'))) ? $headerLang : $config->get('default_language')) : $config->get('default_language'));
        } else {
            return $config->get('default_language', 'en');
        }
    }

    /**
     * @return EntityManagerInterface
     */
    public function getEntitymanager()
    {
       return $this->entityManager;
    }

    /**
     * @param $menu_item
     * @return bool
     */
    private function isMenuActive(&$menu_item)
    {
        if (!empty($menu_item['menu'])) {
            foreach ($menu_item['menu'] as &$menu) {
                if ($this->isMenuActive($menu)) {
                    $menu_item['active'] = true;
                    return true;
                }
            }
        }
        if ($menu_item['url'] == ServerRequest::fromGlobals()->getUri()->getPath()) {
            $menu_item['active'] = true;
            return true;
        }
        return false;
    }

    /**
     * @return string
     */
    public function getDefaultUrl()
    {
        $url = '';
        return $url;
    }


    /**
     * @return string
     */
    public function getSessionKey()
    {
        return $this->session_key;
    }

    /**
     * @return bool
     */
    public function isSessionDestroy()
    {
        return $this->session_destroy;
    }

    /**
     * @return string
     */
    public function getBasepath()
    {
        return $this->basepath;
    }

    /**
     * @param $url
     * @return string
     */
    public function getRealUrl($url)
    {
        $basepath = rtrim($this->basepath, '/');
        return implode('/', array($basepath, ltrim($url, '/')));
    }
}
