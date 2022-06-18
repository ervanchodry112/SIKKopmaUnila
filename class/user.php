<?php

class user
{
    private $username;
    private $password;

    function setUsername($user)
    {
        $this->username = $user;
    }
    function setPassword($pass)
    {
        $this->password = $pass;
    }
    function getUsername()
    {
        return $this->username;
    }
    function getPassword()
    {
        return $this->password;
    }
    function __construct($user, $pass)
    {
        $this->username = $user;
        $this->password = $pass;
    }
}
