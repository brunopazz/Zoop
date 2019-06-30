<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2019-06-07
 * Time: 19:56
 */

namespace Zoop;


class installmentPlan implements \JsonSerializable
{
    private $mode;
    private $number_installments;

    /**
     * installmentPlan constructor.
     *
     * @param $mode
     * @param $number_installments
     */
    public function __construct($mode, $number_installments)
    {
        $this->mode                = $mode;
        $this->number_installments = $number_installments;
    }


    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return mixed
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param mixed $mode
     *
     * @return installmentPlan
     */
    public function setMode($mode)
    {
        $this->mode = (string) $mode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumberInstallments()
    {
        return $this->number_installments;
    }

    /**
     * @param mixed $number_installments
     *
     * @return installmentPlan
     */
    public function setNumberInstallments($number_installments)
    {
        $this->number_installments = (string) $number_installments;

        return $this;
    }

}