<?php

namespace Grip\PakketdienstQls\Model;

class Company
{

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var bool
     */
    private $hasFulfillment;

    /**
     * @var bool
     */
    private $isActive;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
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
     * @return bool
     */
    public function hasFulfillment()
    {
        return $this->hasFulfillment;
    }

    /**
     * @param bool $hasFulfillment
     */
    public function setHasFulfillment($hasFulfillment)
    {
        $this->hasFulfillment = $hasFulfillment;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
    }
}
