<?php 

require_once 'pokaz_kod.php';

class UserService {
    
    private $db, $helper;

    public function __construct() {
        $this->db = new DB();
        $this->helper = new Helper();
    }

    public function changePassword($user, $password) {
        $isChanged = $this->db->execute("
            UPDATE users
            SET password = ?
            WHERE username = ?
        ", [$this->helper->hashPassword($password), $user]);

        return $isChanged;
    }

    public function isNameAvailavle($user) {
        $isAvailable = $this->db->query("
            SELECT * FROM users WHERE username = ?
        ", [$user]);

        return $isAvailable;
    }

    public function changeName($user, $name) {
        if (!$this->isNameAvailavle($name)) {
            $isChanged = $this->db->execute("
                UPDATE users
                SET username = ?
                WHERE username = ?
            ", [$name, $user]);
        }

        return $isChanged;
    }
}