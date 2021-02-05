<?php

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start a session
session_start();

// Require the autoload file
require_once('vendor/autoload.php');
require_once('model/data-layer.php');

// Instantiate a Fat-free
$f3 = Base::instance();

// Turn on fatfree error reporting
// has to come after base instance
$f3->set('DEBUG', 3);

// Define a default route (home page)
$f3->route('GET /', function () {
    $view = new Template();
    echo $view->render("views/pet-home.html");
});

$f3->run();













