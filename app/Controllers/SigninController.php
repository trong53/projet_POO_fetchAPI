<?php
namespace App\Controllers;

use App\Models\SigninModel;
use App\Models\BaseController;

class SigninController extends SigninModel
{
    protected CONST MESSAGE_SIGNIN = 'Email and/or Password not correct, try again !';

    public function signIn (string $email, string $password) : void {
        $user = $this->getUserByEmail($email);
        if (!$user){
            render('views.signin', [
                'message_signin' => self::MESSAGE_SIGNIN
            ]);
        }else{
            $userPassword = $user['password'];
            if (password_verify($password, $userPassword)){
                $_SESSION['user'] = $user;
                header('Location: /');
            }else{
                render('views.signin', [
                    'message_signin' => self::MESSAGE_SIGNIN
                ]);
            }
        }
    }
}
        




/*
Array
(
    [id] => 1
    [name] => hung
    [email] => vtrhung@yahoo.com
    [password] => $2y$10$bxVfvONOjHshN2Odyw0IGO4uYykNWJAIpAKj1WAmZSueDgh.Fivmi
    [created_at] => 
)
*/