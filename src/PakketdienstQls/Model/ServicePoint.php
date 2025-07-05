<?php

namespace Grip\PakketdienstQls\Model;

class ServicePoint
{

    /**
     * The servicepoint code
     * @var string
     */
    private $code;

    /**
     * The servicepoint name
     * @var string
     */
    private $name;

    /**
     * The servicepoint address
     * @var Address
     */
    private $address;

    /**
     * The servicepoint geo location
     * @var Geo
     */
    private $geo;

    /**
     * The servicepoint opening times
     * @var OpeningTime[]
     */
    private $openingTimes;

    /**
     * product id
     * @var int
     */
    private $productId;

    /**
     * Carrier name
     * @var string
     */
    private $productName;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Address $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return Geo
     */
    public function getGeo()
    {
        return $this->geo;
    }

    /**
     * @param Geo $geo
     */
    public function setGeo($geo)
    {
        $this->geo = $geo;
    }

    /**
     * @return OpeningTime[]
     */
    public function getOpeningTimes()
    {
        return $this->openingTimes;
    }

    /**
     * @param OpeningTime[] $openingTimes
     */
    public function setOpeningTimes($openingTimes)
    {
        $this->openingTimes = $openingTimes;
    }

    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param string $productName
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
    }
}
