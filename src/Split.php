<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2019-06-07
 * Time: 19:51
 */

namespace Zoop;


/**
 * Class Split
 *
 * @package Zoop
 */
class Split implements \JsonSerializable
{

    protected $recipient;
    protected $liable;
    protected $charge_processing_fee;
    protected $charge_recipient_processing_fee;
    protected $is_gross_amount;
    protected $percentage;
    protected $amount;

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
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * @param mixed $recipient
     *
     * @return Split
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getChargeRecipientProcessingFee()
    {
        return $this->charge_recipient_processing_fee;
    }

    /**
     * @param mixed $charge_recipient_processing_fee
     *
     * @return Split
     */
    public function setChargeRecipientProcessingFee($charge_recipient_processing_fee)
    {
        $this->charge_recipient_processing_fee = $charge_recipient_processing_fee;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getisGrossAmount()
    {
        return $this->is_gross_amount;
    }

    /**
     * @param mixed $is_gross_amount
     *
     * @return Split
     */
    public function setIsGrossAmount($is_gross_amount)
    {
        $this->is_gross_amount = $is_gross_amount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLiable()
    {
        return $this->liable;
    }

    /**
     * @param mixed $liable
     *
     * @return Split
     */
    public function setLiable($liable)
    {
        $this->liable = $liable;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getChargeProcessingFee()
    {
        return $this->charge_processing_fee;
    }

    /**
     * @param mixed $charge_processing_fee
     *
     * @return Split
     */
    public function setChargeProcessingFee($charge_processing_fee)
    {
        $this->charge_processing_fee = $charge_processing_fee;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * @param mixed $percentage
     *
     * @return Split
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     *
     * @return Split
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

}