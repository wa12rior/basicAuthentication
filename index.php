<?php 

// Require pliku inicjujÄ…cego i widoku

require_once 'app/pokaz_kod.php';

ini_set('display_errors', 1);

require_once __DIR__ . '/app/init.php';
require_once VIEW_ROOT . '/home.php';

if ($_SESSION['logged']) {
    if ($_SESSION['admin']) {
        header('Location: https://platform.reculazy.com:4430/kamilserafin/cms/app/views/admin.php');
    } else {
        header('Location: https://platform.reculazy.com:4430/kamilserafin/cms/app/views/user.php');
    }
}
