<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2019-06-07
 * Time: 19:50
 */

namespace Zoop;

use Exception;
use Zoop\Responses\SellerResponse;


class Seller
{
    protected $request;
    protected $credentials;

    public function __construct(Credentials $credentials)
    {
        try {
            $this->request     = new Request($credentials);
            $this->credentials = $credentials;
        } catch (\Exception $e) {
            $error = new BaseResponse();
            $error->setResponse($e->getMessage());

            return $error;
        }

        return $this;
    }

    public function getAll()
    {
        try {
            $response = $this->request->get($this->credentials,
                "/v1/marketplaces/".$this->credentials->getMarketplaceId()."/sellers");


        } catch (Exception $e) {

            $error = new SellerResponse();
            $error->setResponse($e->getMessage());

            return $error;
        }
        return json_decode($response,true);

    }

    public function getById($id)
    {
        try {
            $response = $this->request->get($this->credentials,
                "/v1/marketplaces/".$this->credentials->getMarketplaceId()."/sellers/".$id);

        } catch (Exception $e) {

            $error = new SellerResponse($e->getMessage());

            return $error;
        }

        return json_decode($response,true);

    }

    public function getBusinessAddress(){

    }

}