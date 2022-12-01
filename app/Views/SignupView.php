<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Project_POO">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project PHP (Object) - Signup</title>
    <link rel="stylesheet" href="../assets/Css/style.css">
</head>
<body>

    <header class='signin-header'> 
        <a href='/' class="logo">World of Perfume</a>
    </header>

    <div class="sign-up">

        <form class="signup-form"  action="/signup" method="POST">
            <h1>Créer un compte</h1>
            
            <label class="label-input" for="name">Nom : </label>
            <input type="text" class="input-text" name="name" id="name" placeholder="Name">
            <div class="message-signup"><?=(!empty($data['name']['error']))?'('.$data['name']['error'].')':''?></div>
            
            <label class="label-input" for="email">Email : </label>
            <input type="text" class="input-text" name="email" id="email" placeholder="Email">
            <div class="message-signup"><?=(!empty($data['email']['error']))?'('.$data['email']['error'].')':''?></div>

            <label class="label-input" for="password">Mot de passe : </label>
            <input type="password" class="input-text" name="password" id="password" placeholder="Mot de passe">
            <div class="message-signup"><?=(!empty($data['password']['error']))?'('.$data['password']['error'].')':''?></div>

            <div class="password"> Minimum 8 caractères : au moins une lettre Majuscule, un caractère spécial et un chiffre </div>

            <input type="submit" name="submitSignup" class="submit-button" value="S'inscrire">
            
            <div class="message-success"> <?=($data['message_signup'])??''?> </div>

            <p>Vous avez déjà un compte ? <a href="/signin">Connectez-vous!</a> </p>
        </form>

    </div>

</body>
</html>