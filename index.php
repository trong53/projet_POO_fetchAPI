<?php
session_start();
require 'vendor/autoload.php';

// use App\Database\Database;
// $db = new Database();
// $db->createTable('users');

use App\Controllers\SignupController;
use App\Controllers\SigninController;
use App\Controllers\HomeController;
use App\Controllers\ArticleController;
use App\Controllers\CartController;

switch (getUri()) {
    case '/':
        $home = new HomeController();
        $filter = $_GET['filter']??'all';
        $page = $_GET['page']??1;
        $home->index($filter, $page);
        break;
        
    case '/article':
        $article = new ArticleController();
        $id = $_GET['id']??'';
        $cartData = json_decode(file_get_contents('php://input', true));
        $article->index($id);
        break;

    case '/panier':
        $article = new ArticleController();
        $article->getArticles();
        break;

    case '/cart':
        $cart = new CartController();
        $cart->index();
        break;
    
    case '/signup':
        if (empty($_POST['submitSignup'])){
            render('views.signup');
            exit;
        }
        $sign_up = new SignupController();
        $sign_up->createUser($_POST['name'], $_POST['email'], $_POST['password']);
        break;
        
    case '/signin':
        if (!empty($_SESSION['user'])){
            render('views.home', $_SESSION['user']);
            exit;
        }
        if (empty($_POST['submitSignin'])){
            render('views.signin');
            exit;
        }
        $sign_in = new SigninController();
        $sign_in->signIn($_POST['email'], $_POST['password']);
        break;

    case '/signout':
        session_unset();  // session_destroy() is OK with header.
        header('Location: /');
        break;
};

