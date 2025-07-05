<?php

namespace Grip\PakketdienstQls\Model;

class Geo
{

    /**
     * Latitude
     * @var float
     */
    private $lat;

    /**
     * Longitude
     * @var float
     */
    private $long;

    /**
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param float $lat
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    /**
     * @return float
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * @param float $long
     */
    public function setLong($long)
    {
        $this->long = $long;
    }
}
