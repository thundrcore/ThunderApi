<?php
namespace ThunderCore\Utils;

class APIResponseBuilder{

    /**
     * @var int
     */
    private $status = 200;

    /**
     * @var string
     */
    private $message = "";

    /**
     * @var array
     */
    private $data = array();

    /**
     * APIResponseBuilder constructor.
     * @param int $status
     * @param string $message
     * @param array $data
     */
    public function __construct($status = 200, $message = "", array $data = array())
    {
        $this->status = $status;
        $this->message = $message;
        $this->data = $data;
    }


    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return APIResponseBuilder
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return APIResponseBuilder
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     * @return APIResponseBuilder
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return string
     */
    public function build(){
        $response = array(
            "status" => $this->getStatus()
        );

        if($this->getMessage() != ""){
            $response["message"] = $this->getMessage();
        }
        if(is_array($this->getData()) && !empty($this->getData())){
            $response["data"] = $this->getData();
        }

        return json_encode($response);
    }
}