<?php namespace TGL\Users\Commands;


class RegisterUserCommand
{
    public $username;
    public $full_name;
    public $email;
    public $password;

    function __construct($username, $full_name, $email, $password)
    {
        $this->username = $username;
        $this->full_name = $full_name;
        $this->email = $email;
        $this->password = $password;
    }
}