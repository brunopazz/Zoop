<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2019-06-07
 * Time: 20:30
 */

namespace Zoop;


class Customer implements \JsonSerializable
{
    protected $first_name;
    protected $taxpayer_id;
    protected $email;
    protected $address_line1;
    protected $address_line2;
    protected $address_neighborhood;
    protected $address_city;
    protected $address_state;
    protected $address_postal_code;
    protected $address_country_code;

    public function toJSON()
    {
        return json_encode($this->jsonSerialize(), JSON_PRETTY_PRINT);
    }

    public function jsonSerialize()
    {
        try {


            $obj        = array(
                'first_name'  => $this->getFirstName(),
                'taxpayer_id' => $this->getTaxpayerId(),
                'email'       => $this->getEmail(),

                'address' =>
                    array(
                        'line1'        => $this->getAddressLine1(),
                        'line2'        => $this->getAddressLine2(),
                        'neighborhood' => $this->getAddressNeighborhood(),
                        'city'         => $this->getAddressCity(),
                        'state'        => $this->getAddressState(),
                        'postal_code'  => $this->getAddressPostalCode(),
                        'country_code' => $this->getAddressCountryCode(),
                    ),

            );
            $vars_clear = array_filter($obj, function ($value) {
                if (is_array($value)) {
                    foreach ($value as $value2) {
                        return null !== $value2;
                    }
                } else {
                    return null !== $value;
                }
            });

            return $vars_clear;
        } catch (\Exception $e) {
            return false;
        }

    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     *
     * @return Customer
     */
    public function setFirstName($first_name)
    {
        $this->first_name = (string)$first_name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTaxpayerId()
    {
        return $this->taxpayer_id;
    }

    /**
     * @param mixed $taxpayer_id
     *
     * @return Customer
     */
    public function setTaxpayerId($taxpayer_id)
    {
        $this->taxpayer_id = (string)$taxpayer_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     *
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = (string)$email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressLine1()
    {
        return $this->address_line1;
    }

    /**
     * @param mixed $address_line1
     *
     * @return Customer
     */
    public function setAddressLine1($address_line1)
    {
        $this->address_line1 = (string)$address_line1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressLine2()
    {
        return $this->address_line2;
    }

    /**
     * @param mixed $address_line2
     *
     * @return Customer
     */
    public function setAddressLine2($address_line2)
    {
        $this->address_line2 = (string)$address_line2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressNeighborhood()
    {
        return $this->address_neighborhood;
    }

    /**
     * @param mixed $address_neighborhood
     *
     * @return Customer
     */
    public function setAddressNeighborhood($address_neighborhood)
    {
        $this->address_neighborhood = (string)$address_neighborhood;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressCity()
    {
        return $this->address_city;
    }

    /**
     * @param mixed $address_city
     *
     * @return Customer
     */
    public function setAddressCity($address_city)
    {
        $this->address_city = (string)$address_city;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressState()
    {
        return $this->address_state;
    }

    /**
     * @param mixed $address_state
     *
     * @return Customer
     */
    public function setAddressState($address_state)
    {
        $this->address_state = (string)$address_state;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressPostalCode()
    {
        return $this->address_postal_code;
    }

    /**
     * @param mixed $address_postal_code
     *
     * @return Customer
     */
    public function setAddressPostalCode($address_postal_code)
    {
        $this->address_postal_code = (string)$address_postal_code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddressCountryCode()
    {
        return $this->address_country_code;
    }

    /**
     * @param mixed $address_country_code
     *
     * @return Customer
     */
    public function setAddressCountryCode($address_country_code)
    {
        $this->address_country_code = (string)$address_country_code;

        return $this;
    }


}

