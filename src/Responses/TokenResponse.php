<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2019-06-07
 * Time: 22:58
 */

namespace Zoop\Responses;

use Zoop\BaseResponse;

/**
 * Class TokenResponse
 *
 * @package Zoop\Responses
 */
class TokenResponse extends BaseResponse
{

    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $resource;
    /**
     * @var
     */
    private $description;
    /**
     * @var
     */
    private $card_brand;
    /**
     * @var
     */
    private $first4_digits;
    /**
     * @var
     */
    private $last4_digits;
    /**
     * @var
     */
    private $expiration_month;
    /**
     * @var
     */
    private $expiration_year;
    /**
     * @var
     */
    private $holder_name;
    /**
     * @var
     */
    private $is_active;
    /**
     * @var
     */
    private $is_valid;
    /**
     * @var
     */
    private $is_verified;
    /**
     * @var
     */
    private $customer;
    /**
     * @var
     */
    private $fingerprint;
    /**
     * @var
     */
    private $address;
    /**
     * @var
     */
    private $response;
    /**
     * @var
     */
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

    }


    public function isValidCard(){
        if ($this->getisValid()  && $this->getisActive()) {
            return true;
        }

        return false;
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

    /**
     * @return false|string
     */
    public function toJSON()
    {
        return json_encode($this->jsonSerialize(), JSON_PRETTY_PRINT);
    }

    /**
     * @return array|mixed
     */
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
     * @return TokenResponse
     */
    public function setId($id)
    {
        $this->id = $id;

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
     * @return TokenResponse
     */
    public function setResource($resource)
    {
        $this->resource = $resource;

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
     * @return TokenResponse
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCardBrand()
    {
        return $this->card_brand;
    }

    /**
     * @param mixed $card_brand
     *
     * @return TokenResponse
     */
    public function setCardBrand($card_brand)
    {
        $this->card_brand = $card_brand;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirst4Digits()
    {
        return $this->first4_digits;
    }

    /**
     * @param mixed $first4_digits
     *
     * @return TokenResponse
     */
    public function setFirst4Digits($first4_digits)
    {
        $this->first4_digits = $first4_digits;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLast4Digits()
    {
        return $this->last4_digits;
    }

    /**
     * @param mixed $last4_digits
     *
     * @return TokenResponse
     */
    public function setLast4Digits($last4_digits)
    {
        $this->last4_digits = $last4_digits;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpirationMonth()
    {
        return $this->expiration_month;
    }

    /**
     * @param mixed $expiration_month
     *
     * @return TokenResponse
     */
    public function setExpirationMonth($expiration_month)
    {
        $this->expiration_month = $expiration_month;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpirationYear()
    {
        return $this->expiration_year;
    }

    /**
     * @param mixed $expiration_year
     *
     * @return TokenResponse
     */
    public function setExpirationYear($expiration_year)
    {
        $this->expiration_year = $expiration_year;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHolderName()
    {
        return $this->holder_name;
    }

    /**
     * @param mixed $holder_name
     *
     * @return TokenResponse
     */
    public function setHolderName($holder_name)
    {
        $this->holder_name = $holder_name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getisActive()
    {
        return $this->is_active;
    }

    /**
     * @param mixed $is_active
     *
     * @return TokenResponse
     */
    public function setIsActive($is_active)
    {
        $this->is_active = $is_active;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getisValid()
    {
        return $this->is_valid;
    }

    /**
     * @param mixed $is_valid
     *
     * @return TokenResponse
     */
    public function setIsValid($is_valid)
    {
        $this->is_valid = $is_valid;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getisVerified()
    {
        return $this->is_verified;
    }

    /**
     * @param mixed $is_verified
     *
     * @return TokenResponse
     */
    public function setIsVerified($is_verified)
    {
        $this->is_verified = $is_verified;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     *
     * @return TokenResponse
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * @param mixed $fingerprint
     *
     * @return TokenResponse
     */
    public function setFingerprint($fingerprint)
    {
        $this->fingerprint = $fingerprint;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     *
     * @return TokenResponse
     */
    public function setAddress($address)
    {
        $this->address = $address;

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