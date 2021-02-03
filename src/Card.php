<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2019-06-07
 * Time: 19:51
 */

namespace Zoop;


/**
 * Class Card
 *
 * @package Zoop
 */
class Card implements \JsonSerializable
{

    /**
     * @var
     */
    protected $holder_name;
    /**
     * @var
     */
    protected $expiration_month;
    /**
     * @var
     */
    protected $expiration_year;
    /**
     * @var
     */
    protected $card_number;
    /**
     * @var
     */
    protected $security_code;

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
        $vars = get_object_vars ($this);
        $vars_clear = array_filter ($vars, function ( $value ) {
            return null !== $value;
        });

        return $vars_clear;

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
     * @return Card
     */
    public function setHolderName($holder_name)
    {
        $this->holder_name = $holder_name;

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
     * @return Card
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
     * @return Card
     */
    public function setExpirationYear($expiration_year)
    {
        $this->expiration_year = $expiration_year;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCardNumber()
    {
        return $this->card_number;
    }

    /**
     * @param mixed $card_number
     *
     * @return Card
     */
    public function setCardNumber($card_number)
    {
        $this->card_number = $card_number;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSecurityCode()
    {
        return $this->security_code;
    }

    /**
     * @param mixed $security_code
     *
     * @return Card
     */
    public function setSecurityCode($security_code)
    {
        $this->security_code = $security_code;

        return $this;
    }


}