<?php


class Club
{
    private $id;
    private $title;
    private $type;
    private $membership;

    public function __construct($id, $title, $type)
    {
        $this->id = $id;
        $this->title = $title;
        $this->type = $type;
        $this->membership = false;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return false
     */
    public function getMembership()
    {
        return $this->membership;
    }

    /**
     * @param false $membership
     */
    public function setMembership($membership): void
    {
        $this->membership = $membership;
    }

}