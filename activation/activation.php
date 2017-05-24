<?php

require_once '../app/init.php';

function checkAndUpdateBase() {
    $db = new DB();
    $url = "https://platform.reculazy.com:4430/kamilserafin/cms/activation/activation.php?link=";
    $query = "SELECT * FROM users WHERE active = 0 AND activationLink = ?";
    
    $stmt = $db->query($query, [$url . $_GET['link']]);

    if ($stmt) {
        $query = "UPDATE users SET active = 1 WHERE activationLink = ?";

        $db->execute($query, [$url . $_GET['link']]);
    } else {
        echo 'Już aktywowałeś konto bądź nie istniejesz.';
        return false;
    }

    return true;
}


if(empty($_GET)) {
   die("Zły link aktywacyjny bądź jego brak."); 
}

if (checkAndUpdateBase()) echo 'Aktywowano konto.';
?>
<br>
<a href="../index.php">Powrót</a>



