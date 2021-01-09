<?php


class activity
{
    private $type;
    private $timeStart;
    private $timeEnd;
    private $public;
    private $title;
    private $file;
    private $distance;
    private $elevation;
    private $movTime;

    public function __construct($type, $timeStart, $timeEnd, $public, $distance, $elevation, $title)
    {
        $this->type = $type;
        $this->timeStart = $timeStart;
        $this->timeEnd = $timeEnd;
        $this->public = $public;
        $this->distance = $distance;
        $this->elevation = $elevation;
        $this->title = $title == null ? 'Activity' : $title;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * @param mixed $public
     */
    public function setPublic($public): void
    {
        $this->public = $public;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file): void
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getMovTime()
    {
        return $this->movTime;
    }

    /**
     * @param mixed $movTime
     */
    public function setMovTime($movTime): void
    {
        $this->movTime = $movTime;
    }

    /**
     * @return mixed
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * @return mixed
     */
    public function getElevation()
    {
        return $this->elevation;
    }

    public function getTime()
    {
        $start_date = new DateTime($this->timeStart);
        $since_start = $start_date->diff(new DateTime($this->timeEnd));
        $seconds = $since_start->days * 24 * 60 * 60;
        $seconds += $since_start->h * 60 * 60;
        $seconds += $since_start->i * 60;
        $seconds += $since_start->s;

        return $seconds;
    }

    public function getSeconds()
    {
        return $this->getTime() - $this->getHours() * 3600 - $this->getMinutes() * 60;
    }

    public function getMinutes()
    {
        return floor(($this->getTime() - $this->getHours() * 3600) / 60);
    }

    public function getHours()
    {
        return floor($this->getTime() / 3600);
    }

    /**
     * @return mixed
     */
    public function getTimeStart()
    {
        return $this->timeStart;
    }


}