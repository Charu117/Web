<?php

class User{
    public $first_name;
    public $last_name;
    public $email;
    public $password;

    function __construct($f_name, $l_name, $email_f, $password_f){
        $this->first_name = $f_name;
        $this->last_name = $l_name;
        $this->email = $email_f;
        $this->password = $password_f;
    }   
}
