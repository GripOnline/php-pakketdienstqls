<?php

namespace Grip\PakketdienstQls\Model;

class ProductPrice
{

    /**
     * Product price id
     * @var int
     */
    private $id;

    /**
     * Country ISO code
     * @var string
     */
    private $country;

    /**
     * Minimal weight
     * @var int
     */
    private $minWeight;

    /**
     * Maximal weight
     * @var int
     */
    private $maxWeight;

    /**
     * Price in euros
     * @var float
     */
    private $price;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return int
     */
    public function getMinWeight()
    {
        return $this->minWeight;
    }

    /**
     * @param int $minWeight
     */
    public function setMinWeight($minWeight)
    {
        $this->minWeight = $minWeight;
    }

    /**
     * @return int
     */
    public function getMaxWeight()
    {
        return $this->maxWeight;
    }

    /**
     * @param int $maxWeight
     */
    public function setMaxWeight($maxWeight)
    {
        $this->maxWeight = $maxWeight;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
}
