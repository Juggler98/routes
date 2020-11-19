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

    function checkUser($email, $password)
    {
        $stmt = $this->db->prepare('SELECT * FROM user WHERE email = (?)');
        if ($stmt->execute([$email])) {
            if ($stmt->rowCount() == 1) {
                $row = $stmt->fetch();
                if ($password == $row['password']) {
                    session_start();
                    $_SESSION['logged'] = true;
                    $_SESSION['id'] = $row['id_user'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['surname'] = $row['lastname'];
                    return true;
                }
            }
        }
        return false;
    }

    function checkIfRegistered($email) {
        $stmt = $this->db->prepare('SELECT * FROM user WHERE email = (?)');
        if ($stmt->execute([$email])) {
            if ($stmt->rowCount() == 1) {
                    return true;
                }
            }
        return false;
    }

    function register($email, $password, $name, $surname) {
        $stmt = $this->db->prepare('INSERT INTO user (email, password, name, lastname) 
                                                VALUES (?, ?, ?, ?)');
        return $stmt->execute([$email, $password, $name, $surname]);
    }

    function loadAllActivities()
    {
        $activities = [];
        $stmt = $this->db->prepare('SELECT * FROM activity WHERE id_user = ?');
        $stmt->execute([$_SESSION['id']]);
        $dbActivities = $stmt->fetchAll();
        foreach ($dbActivities as $activity) {
            $activities[] = new Activity($activity['type_activity'],
                $activity['time_start'], $activity['time_end'], $activity['public'],
                $activity['distance'], $activity['ele_gain']);
        }
        return $activities;
    }

    function loadAllAthletes() {
        $athletes = [];
        $stmt = $this->db->prepare('SELECT * FROM user');
        $stmt->execute();
        $dbAthletes = $stmt->fetchAll();
        foreach ($dbAthletes as $athlete) {
            $athletes[] = new Athlete($athlete['id_user'], $athlete['name'], $athlete['lastname']);
        }
        $stmt = $this->db->prepare('SELECT id_friend FROM following where id_user = ?');
        $stmt->execute([$_SESSION['id']]);
        $dbAthletes = $stmt->fetchAll();
        foreach ($dbAthletes as $athlete) {
            $athletes[$athlete['id_friend']-1]->setFollowing(true);
        }
        return $athletes;
    }

    function follow($id) {
        $stmt = $this->db->prepare('INSERT INTO following (id_user, id_friend) 
                                                VALUES (?, ?)');
        return $stmt->execute([$_SESSION['id'], $id]);
    }

    function unfollow($id) {
        $stmt = $this->db->prepare('DELETE FROM following where id_user = ? and id_friend = ?');
        return $stmt->execute([$_SESSION['id'], $id]);
    }


}