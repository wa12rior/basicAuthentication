<?php

session_start();

require_once 'pokaz_kod.php';

// Definiowanie staĹ‚ych Ĺ›cieĹĽek do poszczegĂłlnych struktur

ini_set('display_errors', 1);

define('APP_ROOT', __DIR__);
define('CLASSES_ROOT', APP_ROOT . '/models');
define('VIEW_ROOT', APP_ROOT . '/views');

// require klas, ktĂłrych instancje zostaĹ‚y utworzone w danym dokumencie

spl_autoload_register(function ($class){
    require CLASSES_ROOT . '/' . $class . '.php';
});