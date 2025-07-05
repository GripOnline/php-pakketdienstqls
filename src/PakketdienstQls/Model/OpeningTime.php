<?php

namespace Grip\PakketdienstQls\Model;

class OpeningTime
{
    /**
     * Weekday
     * @var int
     */
    private $weekday;

    /**
     * Formatted opening time
     * @var string
     */
    private $formatted;

    /**
     * Opening time from
     * @var string
     */
    private $from;

    /**
     * Opening time to
     * @var string
     */
    private $to;

    /**
     * @return int
     */
    public function getWeekday()
    {
        return $this->weekday;
    }

    /**
     * @param int $weekday
     */
    public function setWeekday($weekday)
    {
        $this->weekday = $weekday;
    }

    /**
     * @return string
     */
    public function getFormatted()
    {
        return $this->formatted;
    }

    /**
     * @param string $formatted
     */
    public function setFormatted($formatted)
    {
        $this->formatted = $formatted;
    }

    /**
     * @return string
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return string
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param string $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }
}
