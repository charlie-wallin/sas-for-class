<?php

// Include Composer's autoloader to make all installed packages available
require_once __DIR__ . '/../vendor/autoload.php';

// Create a new Dotenv instance pointing to the parent directory (project root)
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');

// Load the environment variables from the .env file into $_ENV and $_SERVER
$dotenv->load();


// Assign file paths to PHP constants
// __FILE__ returns the current path to this file
// dirname() returns the path to the parent directory
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');


// Assign the root URL to a PHP constant
// * Do not need to include the domain
// * Use same document root as webserver
// * Can set a hardcoded value:
// define("WWW_ROOT", '/~kevinskoglund/globe_bank/public');
// define("WWW_ROOT", '');
// * Can dynamically find everything in URL up to "/public"
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);


require_once('functions.php');
