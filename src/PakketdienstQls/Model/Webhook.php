<?php

namespace Grip\PakketdienstQls\Model;

class Webhook
{

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $url;

    /**
     *
     * @var WebhookType
     */
    private $type;

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
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return WebhookType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param WebhookType $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}
