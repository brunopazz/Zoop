<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2019-06-07
 * Time: 19:50
 */

namespace Zoop;

use Exception;
use Zoop\Responses\TokenResponse;


/**
 * Class Zoop
 *
 * @package Zoop
 */
class Zoop
{
    /**
     * @var Request
     */
    protected $request;
    /**
     * @var Credentials
     */
    protected $credentials;

    /**
     * Zoop constructor.
     *
     * @param Credentials $credentials
     */
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

    /**
     * @param Boleto   $boleto
     * @param Customer $customer
     *
     * @return AuthorizeResponse
     */
    public function Boleto(Boleto $boleto, Customer $customer)
    {
        try {
            $customer_response = $this->request->post($this->credentials,
                "/v1/marketplaces/".$this->credentials->getMarketplaceId()."/buyers",
                $customer->toJSON());

            $boleto->setCustomer(json_decode($customer_response)->id);

            $response = $this->request->post($this->credentials,
                "/v1/marketplaces/".$this->credentials->getMarketplaceId()."/transactions",
                $boleto->toJSON());

        } catch (Exception $e) {

            $error = new AuthorizeResponse();
            $error->setResponse($e->getMessage());

            return $error;
        }
        $authresponse = new AuthorizeResponse();
        $authresponse->mapperJson(json_decode($response, true));

        return $authresponse;
    }

    /**
     * @param Transactions $transaction
     *
     * @return AuthorizeResponse|BaseResponse
     */
    public function Authorize(Transactions $transaction)
    {
        try {
            $response = $this->request->post($this->credentials,
                "/v1/marketplaces/".$this->credentials->getMarketplaceId()."/transactions",
                $transaction->toJSON());

        } catch (Exception $e) {

            $error = new BaseResponse();
            $error->setResponse($e->getMessage());

            return $error;
        }
        $authresponse = new AuthorizeResponse();
        $authresponse->mapperJson(json_decode($response, true));

        return $authresponse;
    }

    /**
     * @param      $OnBehalfOf
     * @param      $transactionID
     * @param null $amount
     *
     * @return AuthorizeResponse|BaseResponse
     */
    public function Capture($OnBehalfOf, $transactionID, $amount = null)
    {
        try {

            $json = ["on_behalf_of" => $OnBehalfOf];
            if (isset($amount)) {
                $json["amount"] = $amount;
            }

            $response = $this->request->post($this->credentials,
                "/v1/marketplaces/".$this->credentials->getMarketplaceId()."/transactions/".$transactionID."/capture",
                json_encode($json));

        } catch (Exception $e) {

            $error = new BaseResponse();
            $error->setResponse($e->getMessage());

            return $error;
        }
        $authresponse = new AuthorizeResponse();
        $authresponse->mapperJson(json_decode($response, true));

        return $authresponse;
    }

    /**
     * @param      $OnBehalfOf
     * @param      $transactionID
     * @param null $amount
     *
     * @return AuthorizeResponse|BaseResponse
     */
    public function Cancel($OnBehalfOf, $transactionID, $amount = null)
    {
        try {

            $json = ["on_behalf_of" => $OnBehalfOf];
            if (isset($amount)) {
                $json["amount"] = $amount;
            }

            $response = $this->request->post($this->credentials,
                "/v1/marketplaces/".$this->credentials->getMarketplaceId()."/transactions/".$transactionID."/void",
                json_encode($json));

        } catch (Exception $e) {

            $error = new BaseResponse();
            $error->setResponse($e->getMessage());

            return $error;
        }
        $authresponse = new AuthorizeResponse();
        $authresponse->mapperJson(json_decode($response, true));

        return $authresponse;
    }

    /**
     * @param Split $split
     * @param       $transactionID
     *
     * @return BaseResponse|SplitResponse
     */
    public function Split(Split $split, $transactionID)
    {
        try {

            $response = $this->request->post($this->credentials,
                "/v1/marketplaces/".$this->credentials->getMarketplaceId()."/transactions/".$transactionID."/split_rules",
                $split->toJSON());


        } catch (Exception $e) {

            $error = new BaseResponse();
            $error->setResponse($e->getMessage());

            return $error;
        }
        $splitresponse = new SplitResponse();
        $splitresponse->mapperJson(json_decode($response, true));

        return $splitresponse;
    }


    /**
     * @param $OnBehalfOf
     * @param $transactionID
     *
     * @return AuthorizeResponse|BaseResponse
     */
    public function QueryOrder($OnBehalfOf, $transactionID)
    {
        try {

            $json = ["on_behalf_of" => $OnBehalfOf];

            $response = $this->request->get($this->credentials, "/v1/marketplaces/".$this->credentials->getMarketplaceId()."/transactions?reference_id=".$transactionID,json_encode($json));


        } catch (Exception $e) {

            $error = new BaseResponse();
            $error->setResponse($e->getMessage());

            return $error;
        }
        $authresponse = new AuthorizeResponse();
        $authresponse->mapperJson(json_decode($response, true));

        return $authresponse;
    }

    /**
     * @param $transactionID
     *
     * @return AuthorizeResponse|BaseResponse
     */
    public function QueryOrderByID($transactionID)
    {
        try {

            $response = $this->request->get($this->credentials,
                "/v1/marketplaces/".$this->credentials->getMarketplaceId()."/transactions/".$transactionID);

        } catch (Exception $e) {

            $error = new BaseResponse();
            $error->setResponse($e->getMessage());

            return $error;
        }
        $authresponse = new AuthorizeResponse();
        $authresponse->mapperJson(json_decode($response, true));

        return $authresponse;
    }


    /**
     * @param Card     $card
     * @param Customer $customer
     *
     * @return bool|TokenResponse
     */
    public function ZeroDolarAuth(Card $card, Customer $customer)
    {
        try {
            $token = $this->request->post($this->credentials, "/v1/marketplaces/".$this->credentials->getMarketplaceId()."/cards/tokens",$card->toJSON());
            if(isset(json_decode($token)->id)){
                $buyer = $this->request->post($this->credentials, "/v1/marketplaces/".$this->credentials->getMarketplaceId()."/buyers",$customer->toJSON());
                if(isset(json_decode($buyer)->id)){

                    $associate = [
                        "token"=>json_decode($token)->id,
                        "customer"=>json_decode($buyer)->id
                    ];
                    $associated = $this->request->post($this->credentials, "/v1/marketplaces/".$this->credentials->getMarketplaceId()."/cards",json_encode($associate));
                    $authresponse = new TokenResponse(json_decode($associated, true));
                    return $authresponse;
                }
            }

        } catch (Exception $e) {
            $error = new TokenResponse($e->getMessage());
            $error->setResponse($e->getMessage());
            return $error;
        }
        return false;

    }
}