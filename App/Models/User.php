<?php
namespace App\Models;


class User extends \App\Core\Model
{

    protected $id_user;
    protected $name;
    protected $lastname;

    public function __construct($id = "", $name = "", $lastname = "")
    {
        $this->id_user = $id;
        $this->name = $name;
        $this->lastname =$lastname;
    }

    static public function setDbColumns()
    {
        return ['id_user', 'name', 'lastname'];
    }

    static public function setTableName()
    {
        return 'user';
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

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname($lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return mixed|string
     */
    public function getId()
    {
        return $this->id_user;
    }

    /**
     * @param mixed|string $id
     */
    public function setId($id): void
    {
        $this->id_user = $id;
    }
}