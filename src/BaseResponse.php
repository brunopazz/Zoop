<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2019-06-07
 * Time: 22:58
 */

namespace Zoop;


class BaseResponse implements \JsonSerializable
{

    private $response;

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param mixed $response
     */
    public function setResponse($response)
    {
        $this->response = $response;

    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function isAuthorized()
    {
        if ($this->getStatus() == "pre_authorized") {
            return true;
        }

        return false;
    }

    public function isCaptured(){

       return false;
    }
    public function isCancelled(){

        return false;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        if($this->hasError()){
            return "ERROR";
        }
        return $this->status;
    }

    public function hasError()
    {
        if ( ! is_array($this->response)) {
            return true;
        }
        return false;
    }

    public function mapperJson($json)
    {
        $this->setResponse($json);
        if ( ! is_array($json)) {
            return $this;
        }
        array_walk_recursive($json, function ($value, $key) {

            if (property_exists($this, $key)) {
                if (empty($this->$key)) {
                    $this->$key = $value;
                }
            }
        });
        return $this;
    }

    public function toJSON()
    {
        return json_encode($this->jsonSerialize(), JSON_PRETTY_PRINT);
    }
}