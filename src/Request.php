<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 09/07/2018
 * Time: 05:52
 */

namespace Zoop;

use Exception;


class Request
{
    /**
     * Base url from api
     *
     * @var string
     */
    private $baseUrl = '';


    function __construct(Credentials $credentials)
    {
        if ($credentials->getEnv() == "PRODUCTION") {
            $this->baseUrl = 'https://api.zoop.ws';
        } elseif ($credentials->getEnv() == "SANDBOX") {
            $this->baseUrl = 'https://api.zoop.ws';
        } else {
           return false;
        }
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param Getnet $credentials
     * @param        $url_path
     *
     * @return mixed
     * @throws Exception
     */
    function get(Getnet $credentials, $url_path)
    {
        return $this->send($credentials, $url_path, 'GET');
    }

    /**
     * @param Getnet $credentials
     * @param        $url_path
     * @param        $method
     * @param null   $json
     *
     * @return mixed
     * @throws \Exception
     */
    private function send(
        Credentials $credentials,
        $url_path,
        $method,
        $json = null
    ) {
        $curl = curl_init($this->getFullUrl($url_path));

        $defaultCurlOptions = array(
            CURLOPT_CONNECTTIMEOUT => 60,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 60,
            CURLOPT_HTTPHEADER     => array('Content-Type: application/json'),
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_SSL_VERIFYPEER => 0,
        );
        curl_setopt($curl, CURLOPT_USERPWD,
            $credentials->getPublishableKey().":");

        if ($method == 'POST') {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
        } elseif ($method == 'PUT') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
        }
        curl_setopt($curl, CURLOPT_ENCODING, "");
        curl_setopt_array($curl, $defaultCurlOptions);


        try {
            $response = curl_exec($curl);
        } catch (Exception $e) {
            return "ERROR";
        }


        if (isset(json_decode($response)->error)) {
            throw new Exception(json_decode($response)->error->message, json_decode($response)->error->status_code);
        }

        if (curl_getinfo($curl, CURLINFO_HTTP_CODE) >= 400) {
            throw new Exception($response, 100);
        }
        if ( ! $response) {
            print "ERROR";
            EXIT;
        }
        curl_close($curl);

        return $response;
    }

    /**
     * Get request full url
     *
     * @param string $url_path
     *
     * @return string $url(config) + $url_path
     */
    private function getFullUrl($url_path)
    {
        if (stripos($url_path, $this->baseUrl, 0) === 0) {
            return $url_path;
        }

        return $this->baseUrl.$url_path;
    }

    function post(Credentials $credentials, $url_path, $params)
    {
        return $this->send($credentials, $url_path, 'POST', $params);
    }


    /**
     * @param Getnet $credentials
     * @param        $url_path
     * @param        $params
     *
     * @return mixed
     * @throws Exception
     */
    function put(Getnet $credentials, $url_path, $params)
    {
        return $this->send($credentials, $url_path, 'PUT', $params);
    }

}
