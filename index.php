<?php

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start a session
session_start();

// Require the autoload file
require_once('vendor/autoload.php');

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

// Define a order route (order page)
$f3->route('GET /order', function () {
    $view = new Template();
    echo $view->render("views/pet-order.html");
});

$f3->route('POST /order2', function () {

    //var_dump($_POST);

    if(isset($_POST['petType']))
    {
        $_SESSION['petType'] = $_POST['petType'];
    }

    if(isset($_POST['color']))
    {
        $_SESSION['color'] = $_POST['color'];
    }

    $view = new Template();
    echo $view->render("views/pet-order2.html");
});

$f3->route('POST /summary', function () {

    //echo "<p>POST:</p>";

    //var_dump($_POST);

    //echo "<p>SESSION:</p>";

    //var_dump($_SESSION);

    if(isset($_POST['petName']))
    {
        $_SESSION['petName'] = $_POST['petName'];
    }

    $view = new Template();
    echo $view->render("views/summary.html");
});

$f3->run();













