<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2019-06-07
 * Time: 23:15
 */

namespace Zoop;


class AuthorizeResponse extends BaseResponse
{
    protected $id;
    protected $resource;
    protected $status;
    protected $amount;
    protected $original_amount;
    protected $currency;
    protected $description;
    protected $payment_type;
    protected $transaction_number;
    protected $gateway_authorizer;
    protected $app_transaction_uid;
    protected $refunds;
    protected $rewards;
    protected $discounts;
    protected $pre_authorization;
    protected $sales_receipt;
    protected $on_behalf_of;
    protected $customer;
    protected $statement_descriptor;
    protected $refunded;
    protected $voided;
    protected $captured;
    protected $fees;
    protected $fee_details;
    protected $uri;
    protected $created_at;
    protected $reference_id;
    protected $authorizer_id;
    protected $authorization_code;
    protected $authorization_nsu;
    protected $authresponse;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return mixed
     */
    public function getOriginalAmount()
    {
        return $this->original_amount;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getPaymentType()
    {
        return $this->payment_type;
    }

    /**
     * @return mixed
     */
    public function getTransactionNumber()
    {
        return $this->transaction_number;
    }

    /**
     * @return mixed
     */
    public function getGatewayAuthorizer()
    {
        return $this->gateway_authorizer;
    }

    /**
     * @return mixed
     */
    public function getAppTransactionUid()
    {
        return $this->app_transaction_uid;
    }

    /**
     * @return mixed
     */
    public function getRefunds()
    {
        return $this->refunds;
    }

    /**
     * @return mixed
     */
    public function getRewards()
    {
        return $this->rewards;
    }

    /**
     * @return mixed
     */
    public function getDiscounts()
    {
        return $this->discounts;
    }

    /**
     * @return mixed
     */
    public function getPreAuthorization()
    {
        return $this->pre_authorization;
    }

    /**
     * @return mixed
     */
    public function getSalesReceipt()
    {
        return $this->sales_receipt;
    }

    /**
     * @return mixed
     */
    public function getOnBehalfOf()
    {
        return $this->on_behalf_of;
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @return mixed
     */
    public function getStatementDescriptor()
    {
        return $this->statement_descriptor;
    }

    /**
     * @return mixed
     */
    public function getRefunded()
    {
        return $this->refunded;
    }

    /**
     * @return mixed
     */
    public function getVoided()
    {
        return $this->voided;
    }

    /**
     * @return mixed
     */
    public function getCaptured()
    {
        return $this->captured;
    }

    /**
     * @return mixed
     */
    public function getFees()
    {
        return $this->fees;
    }

    /**
     * @return mixed
     */
    public function getFeeDetails()
    {
        return $this->fee_details;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return mixed
     */
    public function getReferenceId()
    {
        return $this->reference_id;
    }

    /**
     * @return mixed
     */
    public function getAuthorizerId()
    {
        return $this->authorizer_id;
    }

    /**
     * @return mixed
     */
    public function getAuthorizationCode()
    {
        return $this->authorization_code;
    }

    /**
     * @return mixed
     */
    public function getAuthorizationNsu()
    {
        return $this->authorization_nsu;
    }

    /**
     * @return mixed
     */
    public function getAuthresponse()
    {
        return $this->authresponse;
    }

    public function isCaptured(){

        if($this->captured == true){
            return true;
        }
        return false;
    }

    public function isCancelled(){

        if($this->voided == true){
            return true;
        }
        return false;
    }



}