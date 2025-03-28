<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use core\SessionUtils;
use core\Validator;
use app\forms\LoginForm;

class LoginCtrl {

    private $form;

    public function __construct() {
        // Stworzenie obiektu formularza
        $this->form = new LoginForm();
    }

    public function validate() {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');

        // Walidacja pustych wartości
        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu.');
        }
        if (empty($this->form->pass)) {
            Utils::addErrorMessage('Nie podano hasła.');
        }

        if (App::getMessages()->isError()) {
            return false;
        }

        return true;
    }

    public function action_login() {
        if ($this->validate()) {
            try {
                // 1. Pobieramy użytkownika po loginie
                $user = App::getDB()->get("users", "*", [
                    "login" => $this->form->login
                ]);
                
                // 2. Sprawdzamy, czy w ogóle istnieje taki użytkownik
                if (!$user) {
                    Utils::addErrorMessage('Nieprawidłowy login lub hasło (brak użytkownika).');
                    return $this->action_loginShow();
                }
                
                // 3. Weryfikacja hasła
                if (!password_verify($this->form->pass, $user['password'])) {
                    Utils::addErrorMessage('Nieprawidłowy login lub hasło (złe hasło).');
                    return $this->action_loginShow();
                }
                
                // 4. Jeżeli użytkownik istnieje i hasło jest poprawne, dopiero wtedy pobieramy role z nazwami
                $role_ids = App::getDB()->select("user_roles", "id_role", [
                    "id_user" => $user['id_user']
                ]);

                // Pobieramy nazwy ról dla użytkownika
                $role_names = App::getDB()->select("roles", "role_name", [
                    "id_role" => $role_ids
                ]);

                foreach ($role_names as $role) {
                    \core\RoleUtils::addRole($role);
                }

                // Ustawienie sesji
                SessionUtils::store('user', $user);
                SessionUtils::store('id_user', $user['id_user']);

                Utils::addInfoMessage('Zalogowano pomyślnie.');
                App::getRouter()->redirectTo('eventList');

            } catch (\Exception $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas logowania: ' . $e->getMessage());
                return $this->action_loginShow();
            }
        } else {
            return $this->action_loginShow();
        }
    }

    public function action_logout() {
        // Wylogowanie użytkownika
        SessionUtils::remove('user');
        session_destroy();
        Utils::addInfoMessage('Wylogowano pomyślnie.');
        App::getRouter()->redirectTo('login');
    }

    public function action_loginShow() {
        App::getSmarty()->assign('form', $this->form);
        App::getSmarty()->assign('conf', App::getConf());
        App::getSmarty()->display('loginView.tpl');
    }
}
