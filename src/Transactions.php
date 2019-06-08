<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2019-06-07
 * Time: 19:51
 */

namespace Zoop;


/**
 * Class Transactions
 *
 * @package Zoop
 */
class Transactions implements \JsonSerializable
{


    private $amount;
    private $currency;
    private $description;
    private $payment_type;
    private $capture;
    private $on_behalf_of;
    private $reference_id;
    private $usage;
    private $type;
    private $holder_name;
    private $expiration_month;
    private $expiration_year;
    private $card_number;
    private $security_code;
    private $statement_descriptor;
    private $installment_plan;

    public function toJSON()
    {
        return json_encode($this->jsonSerialize(), JSON_PRETTY_PRINT);
    }

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        try {


            $obj        = array(
                'amount'               => $this->getAmount(),
                'currency'             => $this->getCurrency(),
                'description'          => $this->getDescription(),
                'payment_type'         => $this->getPaymentType(),
                'capture'              => $this->getCapture(),
                'on_behalf_of'         => $this->getOnBehalfOf(),
                'reference_id'         => $this->getReferenceId(),
                'source'               =>
                    array(
                        'usage'                => $this->getUsage(),
                        'amount'               => $this->getAmount(),
                        'currency'             => $this->getCurrency(),
                        'description'          => $this->getDescription(),
                        'type'                 => $this->getType(),
                        'capture'              => $this->getCapture(),
                        'on_behalf_of'         => $this->getOnBehalfOf(),
                        'reference_id'         => $this->getReferenceId(),
                        'card'                 =>
                            array(
                                'amount'           => $this->getAmount(),
                                'holder_name'      => $this->getHolderName(),
                                'expiration_month' => $this->getExpirationMonth(),
                                'expiration_year'  => $this->getExpirationYear(),
                                'card_number'      => $this->getCardNumber(),
                                'security_code'    => $this->getSecurityCode(),
                            ),
                        'installment_plan'     =>
                            $this->getInstallmentPlan(),
                        'statement_descriptor' => $this->getStatementDescriptor(),

                    ),
                'installment_plan'     =>
                    $this->getInstallmentPlan(),
                'statement_descriptor' => $this->getStatementDescriptor(),

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
     * @return Transactions
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

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
     * @return Transactions
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

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
     * @return Transactions
     */
    public function setDescription($description)
    {
        $this->description = $description;

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
     * @return Transactions
     */
    public function setPaymentType($payment_type)
    {
        $this->payment_type = $payment_type;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCapture()
    {
        return $this->capture;
    }

    /**
     * @param mixed $capture
     *
     * @return Transactions
     */
    public function setCapture($capture)
    {
        $this->capture = $capture;

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
     * @return Transactions
     */
    public function setOnBehalfOf($on_behalf_of)
    {
        $this->on_behalf_of = $on_behalf_of;

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
     * @return Transactions
     */
    public function setReferenceId($reference_id)
    {
        $this->reference_id = $reference_id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsage()
    {
        return $this->usage;
    }

    /**
     * @param mixed $usage
     *
     * @return Transactions
     */
    public function setUsage($usage)
    {
        $this->usage = $usage;

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
     * @return Transactions
     */
    public function setType($type)
    {
        $this->type = $type;

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
     * @return Transactions
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
     * @return Transactions
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
     * @return Transactions
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
     * @return Transactions
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
     * @return Transactions
     */
    public function setSecurityCode($security_code)
    {
        $this->security_code = $security_code;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInstallmentPlan()
    {
        return $this->installment_plan;
    }

    /**
     * @param $mode
     * @param $number_installments
     *
     * @return $this
     */
    public function setInstallmentPlan($mode, $number_installments)
    {

        $installments           = new installmentPlan($mode,
            $number_installments);
        $this->installment_plan = $installments->jsonSerialize();

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
     * @return Transactions
     */
    public function setStatementDescriptor($statement_descriptor)
    {
        $this->statement_descriptor = $statement_descriptor;

        return $this;
    }


}