<?php

require_once '../init.php'; 

require 'templates/admin/header.php';

echo 'Witaj użytkowniku ' . $_SESSION['username'];

echo '<br>' . '<a href="../controllers/changePreferences.php">Zmień dane.<a>';

echo '<br>' . '<a href="../controllers/logout.php">Wyloguj</a>';

require 'templates/admin/footer.php';
?>