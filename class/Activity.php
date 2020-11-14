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

    public function __construct($type, $timeStart, $timeEnd, $public, $distance, $elevation)
    {
        $this->type = $type;
        $this->timeStart = $timeStart;
        $this->timeEnd = $timeEnd;
        $this->public = $public;
        $this->distance = $distance;
        $this->elevation = $elevation;
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

    public function getTime() {
        return 5;
    }


}