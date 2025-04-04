<?php

namespace app\controllers;

use core\App;
use core\RoleUtils; 
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use core\Validator;


class RegisterCtrl {

   
    public function action_registerShow() {
        App::getSmarty()->assign('conf', App::getConf());
        App::getSmarty()->display('registerView.tpl');
    }

   
    public function action_register() {
     
        $username         = ParamUtils::getFromRequest('login', true, 'Błąd: Brak loginu');
        $password         = ParamUtils::getFromRequest('password', true, 'Błąd: Brak hasła');
        $confirm_password = ParamUtils::getFromRequest('confirm_password', true, 'Błąd: Brak potwierdzenia hasła');
        $email            = ParamUtils::getFromRequest('email', true, 'Błąd: Brak adresu e-mail');

       
        $v = new Validator();

        
        $v->validate($username, [
            'required'         => true,
            'min_length'       => 3,
            'max_length'       => 50,
            'validator_message' => 'Login musi mieć od 3 do 50 znaków.'
        ]);

      
        $v->validate($password, [
            'required'         => true,
            'min_length'       => 6,
            'validator_message' => 'Hasło musi mieć co najmniej 6 znaków.'
        ]);

       
        $v->validate($email, [
            'required'         => true,
            'email'            => true,
            'max_length'       => 100,
            'validator_message' => 'Podaj poprawny adres e-mail (maks. 100 znaków).'
        ]);

      
        if ($password !== $confirm_password) {
            Utils::addErrorMessage('Hasła muszą być takie same.');
        }

       
        if (App::getMessages()->isError()) {
           
            App::getSmarty()->assign('form', [
                'login'            => $username,
                'password'         => $password,
                'confirm_password' => $confirm_password,
                'email'            => $email
            ]);
            return $this->action_registerShow();
        }

        
        try {
            $existingUser = App::getDB()->has('users', [
                'OR' => [
                    'login' => $username,
                    'email' => $email
                ]
            ]);

            if ($existingUser) {
                Utils::addErrorMessage('Login lub e-mail już istnieje. Zmień dane i spróbuj ponownie.');
                App::getSmarty()->assign('form', [
                    'login'            => $username,
                    'password'         => $password,
                    'confirm_password' => $confirm_password,
                    'email'            => $email
                ]);
                return $this->action_registerShow();
            }

           
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

           
            App::getDB()->insert('users', [
                'login'    => $username,
                'password' => $hashedPassword,
                'email'    => $email
            ]);

            
            $newUserId = App::getDB()->id();

           
            App::getDB()->insert('user_roles', [
                'id_user' => $newUserId,
                'id_role' => 4
            ]);

         

           
            Utils::addInfoMessage('Rejestracja zakończona sukcesem. Możesz się teraz zalogować.');
            App::getRouter()->redirectTo('loginShow');

        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd podczas rejestracji: ' . $e->getMessage());
           
            App::getSmarty()->assign('form', [
                'login'            => $username,
                'password'         => $password,
                'confirm_password' => $confirm_password,
                'email'            => $email
            ]);
            return $this->action_registerShow();
        }
    }
}
