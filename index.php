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
$f3->route('GET /', function (){
   $view = new Template();
   echo $view->render("views/pet-home.html");
});

// Define a route (order route)
$f3->route('GET|POST /order', function ($f3) {
    $colors = getColors();

    // Check if the form has been posted
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // validate
        if(empty($_POST['pet']))
        {


        }
        else
        {

        }
    }

    $f3->set('colors', $colors);
    $view = new Template();
    echo $view->render("views/pet-order.html");
});

// Order 2 Route
$f3->route('POST /order2', function ($f3)
{
    if(isset($_POST['petType']))
    {
        $_SESSION['petType'] = $_POST['petType'];
    }

    if(isset($_POST['color']))
    {
        $_SESSION['color'] = $_POST['color'];
    }

    $sizes = getSizes();
    $access = getAccessories();

    $f3->set('sizes', $sizes);
    $f3->set('access', $access);

    $view = new Template();
    echo $view->render("views/pet-order2.html");
});

//Summary route
$f3->route('POST /summary', function()
{
    $_SESSION['size'] = $_POST['size'];
    $_SESSION['access'] = implode(', ', $_POST['access']);

    $view = new Template();
    echo $view->render('views/summary.html');

    session_destroy();
});

$f3->run();













