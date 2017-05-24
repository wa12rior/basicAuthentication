<?php

require_once 'pokaz_kod.php';

class AuthService {
    
    private $loginUsername, $loginPassword;
    private $db, $helper;

    public function __construct() {
        $this->db = new DB();
        $this->helper = new Helper();
        $this->loginUsername = $this->helper->escapePostInput('loginUsername');
        $this->loginPassword = $this->helper->escapePostInput('loginPassword');

    }

    public function findUser() {
        $user = $this->db->query("
            SELECT * FROM users
            WHERE username = ?
        ", [$this->loginUsername]);

        return $user;
    }

    public function isUserVerified() {
        return password_verify($this->loginPassword, $this->findUser()[0]['password']);
    }

    public function isUserActive() {
        return $this->findUser()[0]['active'];
    }
}