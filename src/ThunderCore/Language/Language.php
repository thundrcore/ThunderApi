<?php
namespace ThunderCore\Language;


use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use ReflectionClass;
use ThunderCore\Base;
use ThunderCore\Config\Config;
use ThunderCore\Helper;
use Twig\Environment;

class Language extends Base
{
    protected $languages;
    protected $default_language;
    protected $lang;
    protected $translate = array();
    protected static $NAME;
    protected static $URLS = array();
    protected $request;

    public function __construct(Config $config, Environment $twig, EntityManagerInterface $entityManager, Helper $helper, ServerRequestInterface $request, LoggerInterface $logger = null)
    {
        $this->request = $request;
        $this->languages = $config->get(array('route', 'languages'), array('en'));
        $this->default_language = $config->get(array('route', 'default_language'), 'en');
        $this->lang = $helper->parseLang($request,$config->fromDimension(array('route')));
        foreach($this->languages as $lang) {
            $this->translate[$lang] = $config->get(array('route', 'global_translations', $lang), array());
        }
        $twig->addGlobal('__lang', $this->lang);
        $twig->addGlobal('__lang_urls', $this->getUrls());

        parent::__construct($config, $twig, $entityManager, $helper, $logger);
    }

    /**
     * @return string
     */
    public static function getURL()
    {
        return static::$URL;
    }

    /**
     * @param $key
     * @param string $lang
     * @return mixed
     */
    public function trans($key, $lang = '')
    {
        if (!$lang) {
            $lang = $this->lang;
        }
        $text = '';
        if (isset($this->translate[$lang][$key])) {
            $text = $this->translate[$lang][$key];
        }else{
            $text = $this->translate[$this->default_language][$key];
        }
        return $text;
    }

    public function search($term, $lang = '')
    {
        if (!$lang) {
            $lang = $this->lang;
        }
        foreach ($this->translate[$lang] as $txt) {
            if (is_string($txt)) {
                if (mb_stripos($txt, $term) !== false) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * @return array
     */
    public function getUrls()
    {
        return static::$URLS;
    }


    /**
     * @param $class
     * @param ServerRequestInterface $request
     * @return self
     */
    protected function loadMultiModule($class, ServerRequestInterface $request = null)
    {
        try {
            $reflector = new ReflectionClass($class);
        } catch (Exception $exception) {
            return null;
        }
        if (in_array(LanguageModulesInterface::class, $reflector->getInterfaceNames())) {
            if (!$request) {
                $request = $this->request;
            }
            $config = new Config(array('route' => $this->config->toArray()));
            return new $class($config, $this->twig, $this->entityManager, $this->helper, $request, $this->logger, true);
        }
        return null;
    }
}
