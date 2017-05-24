<?php

session_start();

require_once '../init.php';
require_once '../views/changePreferencesForm.php';

$userService = new UserService();
$helper = new Helper();

$input = $helper->escapePostInput('hid');
$changedName = $helper->escapePostInput('name');
$changedPassword = $helper->escapePostInput('password');

switch ($input) {
    case 'NICKNAME':
        // zmiana nicku
        $userService->changeName($_SESSION['username'], $changedName);
        $_SESSION['username'] = $changedName;
        break;
    case 'PASSWORD':
        // zmiana hasła
        $userService->changePassword($_SESSION['username'], $changedPassword);
        break;
}



