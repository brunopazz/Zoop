<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2019-06-07
 * Time: 20:30
 */

namespace Zoop;


class source implements \JsonSerializable
{
    private $usage;
    private $amount;
    private $currency;
    private $type;
    private $card;

    /**
     * source constructor.
     *
     * @param $usage
     * @param $amount
     * @param $currency
     * @param $type
     * @param $card
     */
    public function __construct($usage, $amount, $currency, $type, $card)
    {
        $this->usage    = $usage;
        $this->amount   = $amount;
        $this->currency = $currency;
        $this->type     = $type;
        $this->card     = $card;
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars ($this);
        $vars_clear = array_filter ($vars, function ( $value ) {
            return null !== $value;
        });

        return $vars_clear;
    }

}

