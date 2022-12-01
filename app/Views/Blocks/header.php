<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Project_POO">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/Css/style.css">
    <link rel="stylesheet" href="../assets/Css/cart.css">
    <link rel="stylesheet" href="../assets/Css/detailCart.css">
    <title>Project PHP (Object) - Page article</title>
</head>
<body>
    <div class="homepage">

        <header> 
            <a href='/' class="logo">World of Perfume</a>
            <div class="log">
                <div class="userZone">
                    <?php
                    if (!empty($_SESSION['user'])) { ?>
                        <div class="user"> 
                            <span>Welcome &nbsp;</span> 
                            <div class="username"><?=(!empty($data['user']['name']))?strtoupper($data['user']['name']):''?></div>
                            <span class="user-id"><?=(!empty($data['user']['id']))?$data['user']['id']:''?></span>
                        </div>
                        <a href="/signout" class="logout">LOG OUT</a>
                    <?php } else { ?>
                        <span class="user-id"><?=(!empty($data['user']['id']))?$data['user']['id']:''?></span>
                        <a href="/signin" class="login">LOG IN</a>
                    <?php } ?>
                </div>
                <a class="cart" href="/cart"> 
                    <img src="../assets/Img/cart.svg" alt="">
                    <div class="cart-products"></div>
                </a>
            </div>

            <div class="cartSection"> 
                <div class="cart-articles"></div>
            </div>

        </header>