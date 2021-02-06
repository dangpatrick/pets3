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

// Define a default route (order route)
$f3->route('GET|POST /order', function ($f3) {
    $colors = getColors();

    //Check if the form has been posted
    if(isset($_POST['color']))
    {
        $_SESSION['color'] = $_POST['color'];
    }

    $f3->set('colors', $colors);
    $view = new Template();
    echo $view->render("views/pet-order.html");
});

// Order 2 Route
$f3->route('POST /order2', function ($f3) {

    var_dump($_POST);

    $sizes = getSizes();
    $access = getAccessories();

    if(isset($_POST['size']) || isset($_POST['access']))
    {
        $_SESSION['size'] = $_POST['size'];
        $_SESSION['access'] = $_POST['access'];
    }

    $f3->set('sizes', $sizes);
    $f3->set('access', $access);

    $view = new Template();
    echo $view->render("views/pet-order2.html");
});

//Summary route
$f3->route('POST /summary', function() {
    //echo '<h1>Thank you for your order!</h1>';
    //var_dump($_POST);
    var_dump($_POST);

    $view = new Template();
    echo $view->render('views/summary.html');

    session_destroy();
});

$f3->run();













