<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2019-06-07
 * Time: 22:58
 */

namespace Zoop\Responses;


class SellerResponse implements \JsonSerializable
{


    private $id;
    private $status;
    private $resource;
    private $type;
    private $description;
    private $account_balance;
    private $current_balance;
    private $business_name;
    private $business_phone;
    private $business_email;
    private $business_website;
    private $business_description;
    private $business_opening_date;
    private $business_facebook;
    private $business_twitter;
    private $ein;
    private $statement_descriptor;
    private $mcc;
    private $show_profile_online;
    private $is_mobile;
    private $decline_on_fail_security_code;
    private $decline_on_fail_zipcode;
    private $delinquent;
    private $payment_methods;
    private $default_debit;
    private $default_credit;
    private $merchant_code;
    private $terminal_code;
    private $uri;
    private $marketplace_id;
    private $created_at;
    private $updated_at;
    private $business_address;
    private $owner;
    private $response;
    private $error;

    /**
     * SellerResponse constructor.
     *
     * @param $response
     */
    public function __construct($response)
    {
        $this->response = $response;

        if (empty($response["id"])) {
            $this->setError(true);
        }

        if ( ! is_array($response)) {
            return $this;
        }
        array_walk_recursive($response, function ($value, $key) {

            if (property_exists($this, $key)) {
                if (empty($this->$key)) {
                    $this->$key = $value;
                }
            }
        });


        if (is_array($response["business_address"])) {
            $this->setBusinessAddress((object)$response["business_address"]);
        }

        if (is_array($response["owner"])) {
            $this->setOwner((object)$response["owner"]);
        }


    }

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


    public function toJSON()
    {
        return json_encode($this->jsonSerialize(), JSON_PRETTY_PRINT);
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return SellerResponse
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     *
     * @return SellerResponse
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @param mixed $resource
     *
     * @return SellerResponse
     */
    public function setResource($resource)
    {
        $this->resource = $resource;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     *
     * @return SellerResponse
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     *
     * @return SellerResponse
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAccountBalance()
    {
        return $this->account_balance;
    }

    /**
     * @param mixed $account_balance
     *
     * @return SellerResponse
     */
    public function setAccountBalance($account_balance)
    {
        $this->account_balance = $account_balance;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCurrentBalance()
    {
        return $this->current_balance;
    }

    /**
     * @param mixed $current_balance
     *
     * @return SellerResponse
     */
    public function setCurrentBalance($current_balance)
    {
        $this->current_balance = $current_balance;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBusinessName()
    {
        return $this->business_name;
    }

    /**
     * @param mixed $business_name
     *
     * @return SellerResponse
     */
    public function setBusinessName($business_name)
    {
        $this->business_name = $business_name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBusinessPhone()
    {
        return $this->business_phone;
    }

    /**
     * @param mixed $business_phone
     *
     * @return SellerResponse
     */
    public function setBusinessPhone($business_phone)
    {
        $this->business_phone = $business_phone;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBusinessEmail()
    {
        return $this->business_email;
    }

    /**
     * @param mixed $business_email
     *
     * @return SellerResponse
     */
    public function setBusinessEmail($business_email)
    {
        $this->business_email = $business_email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBusinessWebsite()
    {
        return $this->business_website;
    }

    /**
     * @param mixed $business_website
     *
     * @return SellerResponse
     */
    public function setBusinessWebsite($business_website)
    {
        $this->business_website = $business_website;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBusinessDescription()
    {
        return $this->business_description;
    }

    /**
     * @param mixed $business_description
     *
     * @return SellerResponse
     */
    public function setBusinessDescription($business_description)
    {
        $this->business_description = $business_description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBusinessOpeningDate()
    {
        return $this->business_opening_date;
    }

    /**
     * @param mixed $business_opening_date
     *
     * @return SellerResponse
     */
    public function setBusinessOpeningDate($business_opening_date)
    {
        $this->business_opening_date = $business_opening_date;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBusinessFacebook()
    {
        return $this->business_facebook;
    }

    /**
     * @param mixed $business_facebook
     *
     * @return SellerResponse
     */
    public function setBusinessFacebook($business_facebook)
    {
        $this->business_facebook = $business_facebook;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBusinessTwitter()
    {
        return $this->business_twitter;
    }

    /**
     * @param mixed $business_twitter
     *
     * @return SellerResponse
     */
    public function setBusinessTwitter($business_twitter)
    {
        $this->business_twitter = $business_twitter;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEin()
    {
        return $this->ein;
    }

    /**
     * @param mixed $ein
     *
     * @return SellerResponse
     */
    public function setEin($ein)
    {
        $this->ein = $ein;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatementDescriptor()
    {
        return $this->statement_descriptor;
    }

    /**
     * @param mixed $statement_descriptor
     *
     * @return SellerResponse
     */
    public function setStatementDescriptor($statement_descriptor)
    {
        $this->statement_descriptor = $statement_descriptor;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMcc()
    {
        return $this->mcc;
    }

    /**
     * @param mixed $mcc
     *
     * @return SellerResponse
     */
    public function setMcc($mcc)
    {
        $this->mcc = $mcc;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getShowProfileOnline()
    {
        return $this->show_profile_online;
    }

    /**
     * @param mixed $show_profile_online
     *
     * @return SellerResponse
     */
    public function setShowProfileOnline($show_profile_online)
    {
        $this->show_profile_online = $show_profile_online;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getisMobile()
    {
        return $this->is_mobile;
    }

    /**
     * @param mixed $is_mobile
     *
     * @return SellerResponse
     */
    public function setIsMobile($is_mobile)
    {
        $this->is_mobile = $is_mobile;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeclineOnFailSecurityCode()
    {
        return $this->decline_on_fail_security_code;
    }

    /**
     * @param mixed $decline_on_fail_security_code
     *
     * @return SellerResponse
     */
    public function setDeclineOnFailSecurityCode($decline_on_fail_security_code)
    {
        $this->decline_on_fail_security_code = $decline_on_fail_security_code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeclineOnFailZipcode()
    {
        return $this->decline_on_fail_zipcode;
    }

    /**
     * @param mixed $decline_on_fail_zipcode
     *
     * @return SellerResponse
     */
    public function setDeclineOnFailZipcode($decline_on_fail_zipcode)
    {
        $this->decline_on_fail_zipcode = $decline_on_fail_zipcode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDelinquent()
    {
        return $this->delinquent;
    }

    /**
     * @param mixed $delinquent
     *
     * @return SellerResponse
     */
    public function setDelinquent($delinquent)
    {
        $this->delinquent = $delinquent;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethods()
    {
        return $this->payment_methods;
    }

    /**
     * @param mixed $payment_methods
     *
     * @return SellerResponse
     */
    public function setPaymentMethods($payment_methods)
    {
        $this->payment_methods = $payment_methods;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDefaultDebit()
    {
        return $this->default_debit;
    }

    /**
     * @param mixed $default_debit
     *
     * @return SellerResponse
     */
    public function setDefaultDebit($default_debit)
    {
        $this->default_debit = $default_debit;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDefaultCredit()
    {
        return $this->default_credit;
    }

    /**
     * @param mixed $default_credit
     *
     * @return SellerResponse
     */
    public function setDefaultCredit($default_credit)
    {
        $this->default_credit = $default_credit;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMerchantCode()
    {
        return $this->merchant_code;
    }

    /**
     * @param mixed $merchant_code
     *
     * @return SellerResponse
     */
    public function setMerchantCode($merchant_code)
    {
        $this->merchant_code = $merchant_code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTerminalCode()
    {
        return $this->terminal_code;
    }

    /**
     * @param mixed $terminal_code
     *
     * @return SellerResponse
     */
    public function setTerminalCode($terminal_code)
    {
        $this->terminal_code = $terminal_code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param mixed $uri
     *
     * @return SellerResponse
     */
    public function setUri($uri)
    {
        $this->uri = $uri;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMarketplaceId()
    {
        return $this->marketplace_id;
    }

    /**
     * @param mixed $marketplace_id
     *
     * @return SellerResponse
     */
    public function setMarketplaceId($marketplace_id)
    {
        $this->marketplace_id = $marketplace_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     *
     * @return SellerResponse
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     *
     * @return SellerResponse
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBusinessAddress()
    {
        return $this->business_address;
    }

    /**
     * @param mixed $business_address
     *
     * @return SellerResponse
     */
    public function setBusinessAddress($business_address)
    {
        $this->business_address = $business_address;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param mixed $owner
     *
     * @return SellerResponse
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param mixed $error
     *
     * @return SellerResponse
     */
    public function setError($error)
    {
        $this->error = $error;

        return $this;
    }


}