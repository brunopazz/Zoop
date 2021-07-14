<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2019-06-07
 * Time: 20:30
 */

namespace Zoop;


class P2P implements \JsonSerializable
{
    protected $amount;
    protected $description;
    protected $transfer_date;


    public function toJSON()
    {
        return json_encode($this->jsonSerialize(), JSON_PRETTY_PRINT);
    }

    public function jsonSerialize()
    {
        try {


            $obj        = array(
                'amount'            => $this->getAmount(),
                'description'       => $this->getDescription(),
                'transfer_date'     => $this->getTransferDate(),

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
    public function getTransferDate()
    {
        return $this->transfer_date;
    }

    /**
     * @param mixed $transfer_date
     *
     * @return P2P
     */
    public function setTransferDate($transfer_date)
    {
        $this->transfer_date = $transfer_date;

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



}