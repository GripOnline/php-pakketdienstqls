<?php

namespace Grip\PakketdienstQls\Model;

class ProductCombination
{
    /**
     * Product combination id
     * @var int
     */
    private $id;

    /**
     * Combination name
     * @var string
     */
    private $name;

    /**
     * Product options
     * @var ProductOption[]
     */
    private $productOptions;

    /**
     * Product id
     * @var int
     */
    private $productId;

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
     * @return ProductOption[]
     */
    public function getProductOptions()
    {
        return $this->productOptions;
    }

    /**
     * @param ProductOption[] $productOptions
     */
    public function setProductOptions($productOptions)
    {
        $this->productOptions = $productOptions;
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
}
