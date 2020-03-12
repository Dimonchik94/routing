<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

require_once 'config.php';
require_once "vendor/autoload.php";
require_once 'System/rb-mysql.php';
require_once 'System/Router.php';


Router::run();