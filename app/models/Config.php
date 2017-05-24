<?php

require_once 'pokaz_kod.php';

class Config {
    private static $config = [
        'db' => [
            'host'      => 'mariadb',
            'database'  => 'elektryk_kamilserafin',
            'user'      => 'elektryk',
            'password'  => 'elektryk'
        ]
    ];

    public static function get($path) {
        $configPart = self::$config;

        foreach (explode('.', $path) as $key) {
            $configPart = $configPart[$key];
        }  
        
        return $configPart;
    }
}