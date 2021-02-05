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
$f3->route('GET|POST /order', function ($f3) {

    //Check if the form has been posted
    if($_SERVER['REQUEST_METHOD' == 'POST']){

        //Validate the data
        if(empty($_POST['pet'])){
            echo 'Post is empty!';
        }else{
            echo'Post is not empty!';
        }
    }
    $colors = getColors();
    $f3->set('colors', $colors);

    $view = new Template();
    echo $view->render("views/pet-home.html");
});

$f3->route('POST /order2', function () {

    var_dump($_POST);

    if(isset($_POST['color']))
    {
        $_SESSION['color'] = $_POST['color'];
    }

    $view = new Template();
    echo $view->render("views/pet-order2.html");
});




$f3->run();













