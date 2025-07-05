<?php

namespace Grip\PakketdienstQls\Model;

class WebhookType
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $action;

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
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }
}
