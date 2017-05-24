<?php 
session_start();

require_once '../init.php'; 

require 'templates/admin/header.php';

echo '<h3>Witaj ' . $_SESSION['username'] . '</h3>';

echo '<br>' . '<a href="../controllers/changePreferences.php">Zmień dane.<a>';

echo '<br>' . '<a href="#">Zmień prawa.<a>';

echo '<br>' . '<a href="../controllers/logout.php">Wyloguj</a>';

echo '<h1>"Pokaz Kod"</h1>';

require '../controllers/pokaKod.php';

require 'templates/admin/footer.php';
?>