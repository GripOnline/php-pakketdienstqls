<?php

namespace Grip\PakketdienstQls\Model;

class Product
{

    /**
     * The product_id
     * @var int
     */
    private $id;

    /**
     * Short name of the product
     * @var string
     */
    private $short;

    /**
     * Name of the product
     * @var string
     */
    private $name;

    /**
     * Type of the product
     * @var string
     */
    private $type;

    /**
     * Product is for servicepoint delivery
     * @var bool
     */
    private $forServicepoint;

    /**
     * Max piece height in mm
     * @var int
     */
    private $maxHeight;

    /**
     * Max piece length in mm
     * @var int
     */
    private $maxLength;

    /**
     * Max piece width in mm
     * @var int
     */
    private $maxWidth;

    /**
     * Pricing of the product
     * @var ProductPrice[]
     */
    private $pricing;

    /**
     * Options of the product
     * @var ProductOption[]
     */
    private $options;

    /**
     * Combinations of the product
     * @var ProductCombination[]
     */
    private $combinations;

    /**
     * @var ProductFamily
     */
    private $productFamily;

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
    public function getShort()
    {
        return $this->short;
    }

    /**
     * @param string $short
     */
    public function setShort($short)
    {
        $this->short = $short;
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
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return bool
     */
    public function isForServicepoint()
    {
        return $this->forServicepoint;
    }

    /**
     * @param bool $forServicepoint
     */
    public function setForServicepoint($forServicepoint)
    {
        $this->forServicepoint = $forServicepoint;
    }

    /**
     * @return int
     */
    public function getMaxHeight()
    {
        return $this->maxHeight;
    }

    /**
     * @param int $maxHeight
     */
    public function setMaxHeight($maxHeight)
    {
        $this->maxHeight = $maxHeight;
    }

    /**
     * @return int
     */
    public function getMaxLength()
    {
        return $this->maxLength;
    }

    /**
     * @param int $maxLength
     */
    public function setMaxLength($maxLength)
    {
        $this->maxLength = $maxLength;
    }

    /**
     * @return int
     */
    public function getMaxWidth()
    {
        return $this->maxWidth;
    }

    /**
     * @param int $maxWidth
     */
    public function setMaxWidth($maxWidth)
    {
        $this->maxWidth = $maxWidth;
    }

    /**
     * @return ProductPrice[]
     */
    public function getPricing()
    {
        return $this->pricing;
    }

    /**
     * @param ProductPrice[] $pricing
     */
    public function setPricing($pricing)
    {
        $this->pricing = $pricing;
    }

    /**
     * @return ProductOption[]
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param ProductOption[] $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }

    /**
     * @return ProductCombination[]
     */
    public function getCombinations()
    {
        return $this->combinations;
    }

    /**
     * @param ProductCombination[] $combinations
     */
    public function setCombinations($combinations)
    {
        $this->combinations = $combinations;
    }

    /**
     * @return ProductFamily
     */
    public function getProductFamily()
    {
        return $this->productFamily;
    }

    /**
     * @param ProductFamily $productFamily
     */
    public function setProductFamily($productFamily)
    {
        $this->productFamily = $productFamily;
    }
}
