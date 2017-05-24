<?php

require_once 'pokaz_kod.php';

class ErrorsHandler {

    private $registrationErrors;
    private $loginErrors;

    public function __construct() {
        $this->registrationErrors = [];
        $this->loginErrors = [];
    }

    public function setRegistrationErrors($error) {
        array_push($this->registrationErrors, $error);
    }

    public function setLoginErrors($error) {
        array_push($this->loginErrors, $error);
    }

    public function getRegistrationErrors() {
        return $this->registrationErrors;
    }

    public function getLoginErrors() {
        return $this->loginErrors;
    }

}