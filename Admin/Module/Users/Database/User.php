<?php
/**
 * Created by PhpStorm.
 * User: nathan-port
 * Date: 13/07/2017
 * Time: 10:40
 */

namespace Module\users\Database;


class User
{

    private $id;
    private $user;
    private $pass;
    private $type_user;



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTypeUser()
    {
        return $this->type_user;
    }

    /**
     * @param mixed $type_user
     */
    public function setTypeUser($type_user)
    {
        $this->type_user = $type_user;
    }


    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }


}