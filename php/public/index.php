<?php
ob_start();
 if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 

use Framework\Routeur;
use Framework\Controleur;


require_once "../vendor/autoload.php";

$routeur = new Routeur();


$routeur->register('/', function () {
    include '../view/accueil_real.php';
    
});
$routeur->register('/connexion', function () {
    if (!isset($_SESSION['username'])){
        include '../view/connexion_real.php';
    }
    
});
$routeur->register('/inscription', function () {
    if (!isset($_SESSION['username'])){
        include '../view/inscription_real.php';
    }
});
$routeur->register('/thread', function () {

    include '../view/thread_real.php';
});
$routeur->register('/profile', function () {

    if(isset($_SESSION['username'])){
        include '../view/profile_real.php';
    }else{
        header('Location: /');
    }
});
$routeur->register('/new', function () {
    if(isset($_SESSION['username'])){
        include '../view/new_real.php';
    }else{
        header('Location: /');
    }
});
$routeur->register('/profile_update', function () {

    if(isset($_SESSION['username'])){
        include '../view/updateprofile_real.php';
    }else{
        header('Location: /');
    }
});
$routeur->register('/category', function () {
    include "../view/category_real.php"; // temporaire
});
$routeur->register('/testservice', function () {
    include "service/test_service.php"; // temporaire
});
$routeur->register('/controle', function () {
    switch ($_GET['action']){
        case 'userSignIn':
            $control = new Controleur($_GET['action']);
            $control->controlerAddUser();
            break;
        case 'getSession':
            $control = new Controleur($_GET['action']);
            $control->controlerGetUserSession();
            break;
        case 'newThread':
            $control = new Controleur($_GET['action']);
            $control->controlerCreateThread();
            break;
        
        case 'newPost':
            $control = new Controleur($_GET['action']);
            $control->controlerCreatePost();
            break;
        case 'updateViewCount':
            $control = new Controleur($_GET['action']);
            $control->controlerUpdateViewCount();
            break;
        }
        
});
$routeur->register('/deconnection', function () {
    include "../view/deconnexion_real.php";
});
$routeur->register('/userlist', function () {
    include "../view/user_list_real.php";
});






$routeur->resolve($_SERVER['REQUEST_URI']);




?>