<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2019-06-07
 * Time: 20:30
 */

namespace Zoop;


class Boleto implements \JsonSerializable
{
    protected $amount;
    protected $currency;
    protected $description;
    protected $on_behalf_of;
    protected $customer;
    protected $payment_type;
    protected $expiration_date;
    protected $body_instructions;
    protected $payment_limit_date;
    protected $reference_id;

    public function toJSON()
    {
        return json_encode($this->jsonSerialize(), JSON_PRETTY_PRINT);
    }

    public function jsonSerialize()
    {
        try {


            $obj        = array(
                'amount'         => $this->getAmount(),
                'currency'       => $this->getCurrency(),
                'description'    => $this->getDescription(),
                'on_behalf_of'   => $this->getOnBehalfOf(),
                'reference_id'   => $this->getReferenceId(),
                'customer'       => $this->getCustomer(),
                'payment_type'   => $this->getPaymentType(),
                'payment_method' => [
                    "expiration_date"    => $this->getExpirationDate(),
                    "payment_limit_date" => $this->getPaymentLimitDate(),
                    "body_instructions"  => $this->getBodyInstructions(),
                ],


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
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     *
     * @return Boleto
     */
    public function setAmount($amount)
    {
        $this->amount = (string)$amount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     *
     * @return Boleto
     */
    public function setCurrency($currency)
    {
        $this->currency = (string)$currency;

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
     * @return Boleto
     */
    public function setDescription($description)
    {
        $this->description = (string)$description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOnBehalfOf()
    {
        return $this->on_behalf_of;
    }

    /**
     * @param mixed $on_behalf_of
     *
     * @return Boleto
     */
    public function setOnBehalfOf($on_behalf_of)
    {
        $this->on_behalf_of = (string)$on_behalf_of;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReferenceId()
    {
        return $this->reference_id;
    }

    /**
     * @param mixed $reference_id
     *
     * @return Boleto
     */
    public function setReferenceId($reference_id)
    {
        $this->reference_id = (string)$reference_id;

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
     * @return Boleto
     */
    public function setCustomer($customer)
    {
        $this->customer = (string)$customer;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPaymentType()
    {
        return $this->payment_type;
    }

    /**
     * @param mixed $payment_type
     *
     * @return Boleto
     */
    public function setPaymentType($payment_type)
    {
        $this->payment_type = (string)$payment_type;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getExpirationDate()
    {
        return $this->expiration_date;
    }

    /**
     * @param mixed $expiration_date
     *
     * @return Boleto
     */
    public function setExpirationDate($expiration_date)
    {
        $this->expiration_date = (string)$expiration_date;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPaymentLimitDate()
    {
        return $this->payment_limit_date;
    }

    /**
     * @param mixed $payment_limit_date
     *
     * @return Boleto
     */
    public function setPaymentLimitDate($payment_limit_date)
    {
        $this->payment_limit_date = (string)$payment_limit_date;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBodyInstructions()
    {
        return $this->body_instructions;
    }

    /**
     * @param mixed $body_instructions
     *
     * @return Boleto
     */
    public function setBodyInstructions($body_instructions)
    {
        $this->body_instructions = (string)$body_instructions;

        return $this;
    }

}

