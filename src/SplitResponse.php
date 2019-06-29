<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2019-06-07
 * Time: 23:15
 */

namespace Zoop;


class SplitResponse extends BaseResponse
{
    protected $id;
    protected $resource;
    protected $transaction;
    protected $recipient;
    protected $liable;
    protected $charge_processing_fee;
    protected $charge_recipient_processing_fee;
    protected $percentage;
    protected $amount;
    protected $receivable_amount;
    protected $receivable_gross_amount;
    protected $created_at;
    protected $updated_at;


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
     * @return SplitResponse
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
     * @return SplitResponse
     */
    public function setResource($resource)
    {
        $this->resource = $resource;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    /**
     * @param mixed $transaction
     *
     * @return SplitResponse
     */
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;

        return $this;
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
     * @return SplitResponse
     */
    public function setRecipient($recipient)
    {
        $this->recipient = $recipient;

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
     * @return SplitResponse
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
     * @return SplitResponse
     */
    public function setChargeProcessingFee($charge_processing_fee)
    {
        $this->charge_processing_fee = $charge_processing_fee;

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
     * @return SplitResponse
     */
    public function setChargeRecipientProcessingFee(
        $charge_recipient_processing_fee
    ) {
        $this->charge_recipient_processing_fee = $charge_recipient_processing_fee;

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
     * @return SplitResponse
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
     * @return SplitResponse
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReceivableAmount()
    {
        return $this->receivable_amount;
    }

    /**
     * @param mixed $receivable_amount
     *
     * @return SplitResponse
     */
    public function setReceivableAmount($receivable_amount)
    {
        $this->receivable_amount = $receivable_amount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReceivableGrossAmount()
    {
        return $this->receivable_gross_amount;
    }

    /**
     * @param mixed $receivable_gross_amount
     *
     * @return SplitResponse
     */
    public function setReceivableGrossAmount($receivable_gross_amount)
    {
        $this->receivable_gross_amount = $receivable_gross_amount;

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
     * @return SplitResponse
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
     * @return SplitResponse
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function hasSplitted(){

        if(isset($this->recipient)){
            return true;
        }
        return "false";

    }


}