<?php

session_start(); 
session_destroy(); 

require_once '../init.php';

header('Location: ../../index.php');