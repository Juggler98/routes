<?php


namespace App\Models;


use DateTime;

class Activities extends \App\Core\Model
{
    protected $activityId;
    protected $userId;

    protected $type;
    protected $timeStart;
    protected $timeEnd;
    protected $public;
    protected $title;
    protected $file;
    protected $distance;
    protected $elevation;
    protected $movTime;

//    protected

    public function __construct($activityId = "", $userId = "", $type = "", $timeStart = "", $timeEnd = "", $public = "", $distance = "", $elevation = "")
    {
        $this->activityId = $activityId;
        $this->userId = $userId;
        $this->type = $type;
        $this->timeStart = $timeStart;
        $this->timeEnd = $timeEnd;
        $this->public = $public;
        $this->distance = $distance;
        $this->elevation = $elevation;
        //$this->movTime = $this->calculateTime();
    }

    private function calculateTime()
    {
//        $start_date = new DateTime($this->timeStart);
//        $since_start = $start_date->diff(new DateTime($this->timeEnd));
//        $seconds = $since_start->days * 24 * 60 * 60;
//        $seconds += $since_start->h * 60 * 60;
//        $seconds += $since_start->i * 60;
//        $seconds += $since_start->s;
//        return $seconds;
    }

    public function setAll($activityId, $userId, $type, $timeStart, $timeEnd, $public, $distance, $elevation)
    {
//        $this->activityId = $activityId;
//        $this->userId = $userId;
//        $this->type = $type;
//        $this->timeStart = $timeStart;
//        $this->timeEnd = $timeEnd;
//        $this->public = $public;
//        $this->distance = $distance;
//        $this->elevation = $elevation;
//        $this->movTime = $this->calculateTime();
    }

    static public function setDbColumns()
    {
        return ['id_activity', 'id_user', 'type_activity', 'time_start', 'time_end',
            'public', 'gpx_file', 'distance', 'ele_gain', 'title_activity', 'mov_time'];
    }

    static public function setTableName()
    {
        return 'activity';
    }

    /**
     * @return mixed
     */
    public function getActivityId()
    {
        return $this->activityId;
    }

    /**
     * @param mixed $activityId
     */
    public function setActivityId($activityId): void
    {
        $this->activityId = $activityId;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
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
    public function getTimeStart()
    {
        return $this->timeStart;
    }

    /**
     * @param mixed $timeStart
     */
    public function setTimeStart($timeStart): void
    {
        $this->timeStart = $timeStart;
    }

    /**
     * @return mixed
     */
    public function getTimeEnd()
    {
        return $this->timeEnd;
    }

    /**
     * @param mixed $timeEnd
     */
    public function setTimeEnd($timeEnd): void
    {
        $this->timeEnd = $timeEnd;
    }

    /**
     * @return mixed|string
     */
    public function getElevation()
    {
        return $this->elevation;
    }

    /**
     * @param mixed|string $elevation
     */
    public function setElevation($elevation): void
    {
        $this->elevation = $elevation;
    }
}