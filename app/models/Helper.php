<?php

require_once 'pokaz_kod.php';

class Helper {

    public function hashPassword($field) {
        return password_hash($field, PASSWORD_DEFAULT);
    }

    public function escapePostInput($field) {
        return isset($_POST[$field]) ? htmlspecialchars(trim($_POST[$field])) : null;
    }
}