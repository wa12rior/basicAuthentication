<?php

require_once 'pokaz_kod.php';
 
class DB {
    private $connection, $stmt;

    public function __construct() {
        try {
            $this->connection = new PDO("mysql:host=" . Config::get('db.host') . "; dbname=" . Config::get('db.database'),
                                                Config::get('db.user'), Config::get('db.password')
                                        );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
        } catch (PDOException $e) {
            die($e);
        }
    }

    public function execute($query, $params = []) { 
        $this->stmt = $this->connection->prepare($query); 
        return $this->stmt->execute($params); 
    } 

    public function query($query, $params = []) { 
        if ($this->execute($query, $params)) { 
            return $this->stmt->fetchAll(); 
        } 
        return false; 
    } 
}