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
                    return true;
                }
            }
        }
        return false;
    }


    function checkIfRegistered($email)
    {
        $stmt = $this->db->prepare('SELECT * FROM user WHERE email = (?)');
        if ($stmt->execute([$email])) {
            if ($stmt->rowCount() == 1) {
                return true;
            }
        }
        return false;
    }

    function register($email, $password, $name, $surname)
    {
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
                $activity['distance'], $activity['ele_gain'], $activity['title_activity']);
        }
        $types = [];
        $stmt = $this->db->prepare('SELECT * FROM type_activity');
        $stmt->execute();
        $dbTypes = $stmt->fetchAll();
        foreach ($activities as $activity) {
            foreach ($dbTypes as $type) {
                if ($type['id_type_activity'] == $activity->getType()) {
                    $activity->setType($type['type']);
                }
            }
        }
        return $activities;
    }

    function loadAllAthletes()
    {
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
            $athletes[$athlete['id_friend'] - 1]->setFollowing(true);
        }
        return $athletes;
    }

    function loadAllClubs() {
        $clubs = [];
        $stmt = $this->db->prepare('SELECT * FROM club');
        $stmt->execute();
        $dbClubs = $stmt->fetchAll();
        foreach ($dbClubs as $club) {
            $clubs[] = new Club($club['id_club'], $club['title_club'], 1);
        }
        $stmt = $this->db->prepare('SELECT id_club FROM membership where id_user = ?');
        $stmt->execute([$_SESSION['id']]);
        $dbClubs = $stmt->fetchAll();
        foreach ($dbClubs as $club) {
            $clubs[$club['id_club'] - 1]->setMembership(true);
        }
        return $clubs;
    }

    function follow($id)
    {
        $stmt = $this->db->prepare('INSERT INTO following (id_user, id_friend) 
                                                VALUES (?, ?)');
        return $stmt->execute([$_SESSION['id'], $id]);
    }

    function unfollow($id)
    {
        $stmt = $this->db->prepare('DELETE FROM following where id_user = ? and id_friend = ?');
        return $stmt->execute([$_SESSION['id'], $id]);
    }

    function join($id)
    {
        $stmt = $this->db->prepare('INSERT INTO membership (id_user, id_club) 
                                                VALUES (?, ?)');
        return $stmt->execute([$_SESSION['id'], $id]);
    }

    function leave($id)
    {
        $stmt = $this->db->prepare('DELETE FROM membership where id_user = ? and id_club = ?');
        return $stmt->execute([$_SESSION['id'], $id]);
    }

    function getCredentials()
    {
        $stmt = $this->db->prepare('SELECT * FROM user WHERE id_user = ?');
        $stmt->execute([$_SESSION['id']]);
        $row = $stmt->fetch();
        $credentials[0] = $row['name'];
        $credentials[1] = $row['lastname'];
        $credentials[2] = $row['email'];
        return $credentials;
    }

    function changeCredentials($name, $surname, $email)
    {
        $credentials = $this->getCredentials();
        if ($credentials[0] != $name || $credentials[1] != $surname || $credentials[2] != $email) {
            $stmt = $this->db->prepare('UPDATE user SET name = ?, lastname = ?, email= ? WHERE id_user = ?');
            return $stmt->execute([$name, $surname, $email, $_SESSION['id']]);
        }
        return false;
    }

    function checkPassword($password)
    {
        $stmt = $this->db->prepare('SELECT password FROM user WHERE id_user = (?)');
        if ($stmt->execute([$_SESSION['id']])) {
            $row = $stmt->fetch();
            if ($password == $row['password']) {
                return true;
            }
        }
        return false;
    }

    function changePassword($newPassword)
    {
        if (!$this->checkPassword($newPassword)) {
            $stmt = $this->db->prepare('UPDATE user SET password = ? WHERE id_user = ?');
            return $stmt->execute([$newPassword, $_SESSION['id']]);
        }
        return false;
    }


}