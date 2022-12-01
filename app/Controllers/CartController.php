<?php
namespace App\Controllers;

class CartController
{
    public function index(INT $quantity = 1) {
       
        render('views.cart', [
            'user'          => $_SESSION['user']??'',
            
        ]);
    }
}