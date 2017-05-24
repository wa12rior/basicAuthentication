<?php

require_once '../init.php';

function directoryReader ($directory, array $excludeFiles = ['.', '..', 'css', 'models', 'user', 'admin', 'templates', 'views', 'controllers', 'activation', 'app', 'js']) {

    $files = [];

    if (!is_dir($directory)) {
        return null;
    }

    if (!($filesDirectory = opendir($directory))) {
        return null;
    }

    while (($file = readdir($filesDirectory)) !== false) {
        if (in_array($file ,$excludeFiles)) {
            continue;
        }

        if ($file ==="pokaz_kod.php") {
            continue;
        }

        $files[] = implode('/', array_splice(explode('/' ,$directory . '/' . $file), 3, 20));

    }

    closedir($filesDirectory);

    return $files;

}

$files = [];

array_push($files,directoryReader(__DIR__));
array_push($files, directoryReader(APP_ROOT));
array_push($files, directoryReader(APP_ROOT . '/js'));
array_push($files, directoryReader(APP_ROOT . '/css'));
array_push($files, directoryReader(VIEW_ROOT));
array_push($files, directoryReader(VIEW_ROOT . '/templates/admin'));
array_push($files, directoryReader(VIEW_ROOT . '/user'));
array_push($files, directoryReader(CLASSES_ROOT));

foreach($files as $row) {
    foreach($row as $file) {
        echo "<a style=\"font-size: 1.5rem; color: black;\" href=\"". $file . "?kod\">" . $file . "</a>";
        echo '<br>';
    }
}