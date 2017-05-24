<?php

require_once 'pokaz_kod.php';

class RegistrationService {
    
    /*
     * Klasa obsługująca rejestrację użytkownika
     * W niej zostają sprawdzane potencjalne błędy
     * Korzysta z klas DB oraz Helper
     */

    private $username, $password, $confirmedPassword, $email;
    private $db, $helper, $link;

    public function __construct() {
        $this->db = new DB();
        $this->helper = new Helper();
        $this->username = $this->helper->escapePostInput('username');
        $this->password = $this->helper->escapePostInput('password');
        $this->confirmedPassword = $this->helper->escapePostInput('confirmedPassword');
        $this->email = $this->helper->escapePostInput('email');
        $this->link = $this->generateActivationLink();
    }

    public function registerUser() {
        $createdUser = $this->db->execute("
            INSERT INTO users ( id, username, password, email, created, active, activationLink) 
            VALUES (NULL, ?, ?, ?, NOW(), 0, ?)", 
            
            [$this->username, $this->helper->hashPassword($this->password), $this->email, $this->link]
        );

        return $createdUser;
    }

    public function isRegistered() {
        $isUserExisting = $this->db->query("
            SELECT * FROM users
            WHERE username = ?
            OR    email = ?
        ", [$this->username, $this->email]);

        return $isUserExisting;
    }

    public function isEmailCorrect() {
        return (filter_var($this->email, FILTER_VALIDATE_EMAIL));
    }

    public function arePasswordsMatched() {
        return ($this->password === $this->confirmedPassword);
    }

    public function generateActivationLink() {
        return "https://platform.reculazy.com:4430/kamilserafin/cms/activation/activation.php?link=" . md5(rand(1,15));
    }

    public function getUserEmail() {
        return $this->email;
    }

    public function getUserLink() {
        return $this->link;
    }
}