<?php

session_start();
define('__ROOT__', dirname(dirname(__FILE__)));

require_once (__ROOT__.'/vendor/autoload.php');
require_once (__ROOT__.'/classes/Database.php');
require_once (__ROOT__.'/classes/Google_Auth.php');
require_once (__ROOT__.'/classes/Resources_Manager.php');
?>