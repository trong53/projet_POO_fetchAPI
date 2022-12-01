<?php
namespace App\Controllers;

use App\Models\SignupModel;

class SignupController extends SignupModel
{
    private $validation_params = array(
        'password'      =>  [   
                                'pattern'   => '/^(?=.*\d)(?=.*\W)(?=.*[A-Z]).{8,}$/',
                                'error'     => ''
                            ],
        'name'          =>  [
                                'pattern'   => '/^[A-z]{1,}\s?[A-z]{1,}\'?\-?[A-z]{2,}\s?([A-z]{1,})?$/',
                                'error'     => ''
                            ],
        'email'         =>  [
                                'pattern'   => '/^[A-z][A-z0-9_\.\-]{2,32}@([A-z0-9\.\-]{3,15})(\.[A-z]{2,8}){1,2}$/',
                                'error'     => ''
                            ],
        'message_signup'=>  ''                                 
    );

    protected $validation = true;
    protected $name, $email, $password;

    public function setParams (string $name, string $email, string $password) : void {
        if (empty(trim($name))) {
            $this->validation_params['name']['error'] = 'Error ! Name is empty';
            $this->validation *= false;
        }else{
            $this->name = trim($name);
        }

        if (empty(trim($email))) {
            $this->validation_params['email']['error'] = 'Error ! Email is empty';
            $this->validation *= false;
        }else{
            $this->email = trim($email);
        }

        if (empty($password)) {
            $this->validation_params['password']['error'] = 'Error ! Password is empty';
            $this->validation *= false;
        }else{
            $this->password = $password;
        }
    }

    public function checkParams() : bool {
        if (!$this->validator($this->name, $this->validation_params['name']['pattern'])){
            $this->validation_params['name']['error'] = 'Error ! Name is not correct';
            $this->validation *= false;
        }

        if (!$this->validator($this->email, $this->validation_params['email']['pattern'])){
            $this->validation_params['email']['error'] = 'Error ! Email is not correct';
            $this->validation *= false;
        }elseif ($this->checkExist('email', $this->email)) {
            $this->validation_params['email']['error'] = 'Email already existed';
            $this->validation *= false;
        }

        if (!$this->validator($this->password, $this->validation_params['password']['pattern'])){
            $this->validation_params['password']['error'] = 'Error ! Password is not correct';
            $this->validation *= false;
        }
        return $this->validation;
    }

    public function createUser(string $name, string $email, string $password) : void {
        
        $this->setParams($name, $email, $password);
        if (!$this->validation) {
            render('views.signup', $this->validation_params);
            exit;
        }
        
        if (!$this->checkParams()) {
            render('views.signup', $this->validation_params);
            exit;
        }else{
            $this->password = password_hash($this->password,PASSWORD_DEFAULT);
            $this->createUserModel($this->name, $this->email, $this->password);
            $this->validation_params['message_signup'] = 'Inscription was successfully saved';
            render('views.signup', $this->validation_params);
        }
    }

}






/*
 name : John Smith
John D'Largy
John Doe-Smith
John Doe Smith
Hector Sausage-Hausen
Mathias d'Arras
Martin Luther King
Ai Wong
Chao Chang
Alzbeta Bara
 */