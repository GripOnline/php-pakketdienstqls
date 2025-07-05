<?php

namespace Grip\PakketdienstQls\Model;

class ProductFamily
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
     * @return string
     */
    private $targetGroupTag;

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
     * @return string
     */
    public function getTargetGroupTag()
    {
        return $this->targetGroupTag;
    }

    /**
     * @param string $targetGroupTag
     */
    public function setTargetGroupTag($targetGroupTag)
    {
        $this->targetGroupTag = $targetGroupTag;
    }
}
