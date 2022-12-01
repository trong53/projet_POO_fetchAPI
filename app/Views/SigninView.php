<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Project_POO">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project PHP (Object) - Signin</title>
    <link rel="stylesheet" href="../assets/Css/style.css">
</head>
<body>

    <header class='signin-header'> 
        <a href='/' class="logo">World of Perfume</a>
    </header>

    <div class="sign-up">

        <form class="signup-form signin-form "  action="/signin" method="POST">
            <h1>Sign In</h1>
            
            <label class="label-input" for="email">Email : </label>
            <input type="text" class="input-text" name="email" id="email" placeholder="Email">
            <div class="message-signup"></div>

            <label class="label-input" for="password">Mot de passe : </label>
            <input type="password" class="input-text" name="password" id="password" placeholder="Mot de passe">
            <div class="message-signup"></div>

            <div class="password"> Minimum 8 caractères : au moins une lettre Majuscule, un caractère spécial et un chiffre </div>

            <input type="submit" name="submitSignin" class="submit-button" value="Sign In">
            
            <div class="message-success"> <?=($data['message_signin'])??''?> </div>

            <p>Vous n'avez pas un compte ?  <a href="/signup"> Créer un compte </a> </p>
        </form>

    </div>

</body>
</html>