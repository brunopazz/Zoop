<?php
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 2019-06-07
 * Time: 18:55
 */

namespace Zoop;


class Credentials
{
 private $marketplaceId;
 private $publishableKey;
 private $sellerId;
 private $env = "SANDBOX";

    /**
     * Credentials constructor.
     *
     * @param $marketplaceId
     * @param $publishableKey
     * @param $sellerId
     * @param $env
     */
    public function __construct(
        $marketplaceId,
        $publishableKey,
        $sellerId,
        $env
    ) {
        $this->marketplaceId = $marketplaceId;
        $this->publishableKey = $publishableKey;
        $this->sellerId = $sellerId;
        $this->setEnv($env);
    }


    /**
     * @return mixed
     */
    public function getMarketplaceId()
    {
        return $this->marketplaceId;
    }

    /**
     * @param mixed $marketplaceId
     *
     * @return Credentials
     */
    public function setMarketplaceId($marketplaceId)
    {
        $this->marketplaceId = $marketplaceId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPublishableKey()
    {
        return $this->publishableKey;
    }

    /**
     * @param mixed $publishableKey
     *
     * @return Credentials
     */
    public function setPublishableKey($publishableKey)
    {
        $this->publishableKey = $publishableKey;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSellerId()
    {
        return $this->sellerId;
    }

    /**
     * @param mixed $sellerId
     *
     * @return Credentials
     */
    public function setSellerId($sellerId)
    {
        $this->sellerId = $sellerId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnv()
    {
        return $this->env;
    }

    /**
     * @param mixed $env
     *
     * @return Credentials
     */
    public function setEnv($env)
    {
        $this->env = $env;

        return $this;
    }


}