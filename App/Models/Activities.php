<?php


namespace App\Models;


use DateTime;

class Activities extends \App\Core\Model
{
    protected $id_activity;
    protected $id_user;

    protected $type_activity;
    protected $time_start;
    protected $time_end;
    protected $public;
    protected $title_activity;
    protected $file;
    protected $distance;
    protected $ele_gain;
    protected $mov_time;
    protected $name;


    protected ?User $user = null;

    public function __construct($activityId = "", $userId = "", $type = "", $timeStart = "", $timeEnd = "", $public = "", $distance = "", $elevation = "", $name = "")
    {
        $this->id_activity = $activityId;
        $this->id_user = $userId;
        $this->type_activity = $type;
        $this->time_start = $timeStart;
        $this->time_end = $timeEnd;
        $this->public = $public;
        $this->distance = $distance;
        $this->ele_gain = $elevation;
        $this->name = $name;
        //$this->movTime = $this->calculateTime();
    }

    public function loadUser()
    {
//        $this->user = User::getOne(1);
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     */
    public function setUser(?User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
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
        return $this->id_activity;
    }

    /**
     * @param mixed $activityId
     */
    public function setActivityId($activityId): void
    {
        $this->id_activity = $activityId;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->id_user = $userId;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type_activity;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type_activity = $type;
    }

    /**
     * @return mixed
     */
    public function getTimeStart()
    {
        return $this->time_start;
    }

    /**
     * @param mixed $time_start
     */
    public function setTimeStart($time_start): void
    {
        $this->time_start = $time_start;
    }

    /**
     * @return mixed
     */
    public function getTimeEnd()
    {
        return $this->time_end;
    }

    /**
     * @param mixed $time_end
     */
    public function setTimeEnd($time_end): void
    {
        $this->time_end = $time_end;
    }

    /**
     * @return mixed|string
     */
    public function getElegain()
    {
        return $this->ele_gain;
    }

    /**
     * @param mixed|string $ele_gain
     */
    public function setElegain($ele_gain): void
    {
        $this->ele_gain = $ele_gain;
    }
}