<?php

session_start();

// set the default timezone to use.
date_default_timezone_set('Europe/Paris');

//~ Define the root path
define('TL_ROOT', dirname(__DIR__));

require_once TL_ROOT . './../config/env.php';

if ($config['mode'] === "dev") {
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
}

define('TL_BASE', $config['base']);

require_once TL_ROOT . './php/classes/Bdd.php';
require_once TL_ROOT . './php/classes/Authentication.php';
require_once TL_ROOT . './php/classes/User.php';
require_once TL_ROOT . './php/classes/Client.php';
require_once TL_ROOT . './php/classes/Prestation.php';
require_once TL_ROOT . './php/helpers/auth.php';
require_once TL_ROOT . './php/helpers/email.php';
require_once TL_ROOT . './php/helpers/formvalidation.php';
require_once TL_ROOT . '../../vendor/autoload.php';