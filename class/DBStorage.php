<?php


class DBStorage
{
    private const DB_HOST = 'localhost';
    private const DB_NAME = 'routes';
    private const DB_USER = 'root';
    private const DB_PASS = 'dtb456';

    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:dbname=' . self::DB_NAME . ';host=' . self::DB_HOST, self::DB_USER, self::DB_PASS);
        } catch (PDOException $e) {
            echo 'Connection failed:' . $e->getMessage();
        }
    }

    function loadAllData()
    {
        $activities = [];
        $dbActivities = $this->db->query('SELECT * FROM activity');
        foreach ($dbActivities as $activity) {
            $activities[] = new Activity($activity['type_activity'],
                $activity['time_start'], $activity['time_end'], $activity['public'],
                $activity['distance'], $activity['ele_gain']);
        }
        return $activities;
    }


}