<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\RoleUtils;
use core\SessionUtils;
use core\Validator;




class AdminCtrl {

    public function action_adminPanel() {
        if (!RoleUtils::inRole("Admin")) {
            Utils::addErrorMessage('Brak uprawnień do panelu administratora.');
            App::getRouter()->redirectTo('main');
            return;
        }

        $users = App::getDB()->select('users', ['id_user', 'login', 'email', 'is_active']);
        App::getSmarty()->assign('users', $users);
        App::getSmarty()->assign('user_role', 2);
        App::getSmarty()->assign('msgs', App::getMessages());
        App::getSmarty()->assign('conf', App::getConf());
        App::getSmarty()->display('adminPanel.tpl');
       
    }

    public function action_manageCatalogs() {
        if (!RoleUtils::inRole("Admin")) {
            Utils::addErrorMessage('Brak dostępu. Musisz być administratorem.');
            App::getRouter()->redirectTo('main');
            return;
        }

        $statuses = App::getDB()->select('event_statuses', ['id_status', 'status_name']);
        $types = App::getDB()->select('event_types', ['id_type', 'type_name']);

        App::getSmarty()->assign('statuses', $statuses);
        App::getSmarty()->assign('types', $types);
        App::getSmarty()->assign('user_role', 2);
        App::getSmarty()->display('manageCatalogs.tpl');
    }

    // ------------------- STATUSY WYDARZEŃ -------------------

    public function action_addStatus() {
        if (!RoleUtils::inRole("Admin")) {
            Utils::addErrorMessage('Brak uprawnień do dodawania statusów.');
            App::getRouter()->redirectTo('manageCatalogs');
            return;
        }

        $statusName = ParamUtils::getFromRequest('status_name', true, 'Błąd: Brak nazwy statusu');

        if (!empty($statusName)) {
            App::getDB()->insert('event_statuses', ['status_name' => $statusName]);
           
            Utils::addInfoMessage("Status '$statusName' został dodany.");
        } else {
            Utils::addErrorMessage("Nazwa statusu nie może być pusta.");
        }

        App::getRouter()->redirectTo('manageCatalogs');
    }

    public function action_editStatus() {
        if (!RoleUtils::inRole("Admin")) {
            Utils::addErrorMessage('Brak uprawnień do edycji statusów.');
            App::getRouter()->redirectTo('manageCatalogs');
            return;
        }

        $statusId = ParamUtils::getFromCleanURL(1, true, 'Błąd: Brak ID statusu.');

        if (empty($statusId)) {
            Utils::addErrorMessage('Niepoprawne ID statusu.');
            App::getRouter()->redirectTo('manageCatalogs');
            return;
        }

        $status = App::getDB()->get('event_statuses', ['id_status', 'status_name'], ['id_status' => $statusId]);

        if ($status) {
            App::getSmarty()->assign('status', $status);
            App::getSmarty()->display('editStatus.tpl');
        } else {
            Utils::addErrorMessage('Nie znaleziono statusu do edycji.');
            App::getRouter()->redirectTo('manageCatalogs');
        }
    }

    public function action_updateStatus() {
        if (!RoleUtils::inRole("Admin")) {
            Utils::addErrorMessage('Brak uprawnień do edycji statusów.');
            App::getRouter()->redirectTo('manageCatalogs');
            return;
        }

        $statusId = ParamUtils::getFromRequest('id_status', true, 'Błąd: Brak ID statusu.');
        $statusName = ParamUtils::getFromRequest('status_name', true, 'Błąd: Brak nowej nazwy statusu.');

        if (empty($statusId) || empty($statusName)) {
            Utils::addErrorMessage('Niepoprawne dane.');
            App::getRouter()->redirectTo('manageCatalogs');
            return;
        }

        App::getDB()->update('event_statuses', [
            'status_name' => $statusName
        ], [
            'id_status' => $statusId
        ]);

        Utils::addInfoMessage("Status został zaktualizowany.");
        App::getRouter()->redirectTo('manageCatalogs');
    }

    public function action_deleteStatus() {
        if (!RoleUtils::inRole("Admin")) {
            Utils::addErrorMessage('Brak uprawnień do usunięcia statusu.');
            App::getRouter()->redirectTo('manageCatalogs');
            return;
        }

        $statusId = ParamUtils::getFromCleanURL(1, true, 'Błąd: Brak ID statusu.');

        if (!empty($statusId)) {
            $deleted = App::getDB()->delete('event_statuses', ['id_status' => $statusId]);

            if ($deleted) {
                Utils::addInfoMessage("Status został usunięty.");
            } else {
                Utils::addErrorMessage("Nie znaleziono statusu do usunięcia.");
            }
        } else {
            Utils::addErrorMessage("Niepoprawne ID statusu.");
        }

        App::getRouter()->redirectTo('manageCatalogs'); 
    }

    // ------------------- TYPY WYDARZEŃ -------------------

    public function action_addType() {
        if (!RoleUtils::inRole("Admin")) {
            Utils::addErrorMessage('Brak uprawnień do dodawania typów.');
            App::getRouter()->redirectTo('manageCatalogs');
            return;
        }

        $typeName = ParamUtils::getFromRequest('type_name', true, 'Błąd: Brak nazwy typu');

        if (!empty($typeName)) {
            App::getDB()->insert('event_types', ['type_name' => $typeName]);
            Utils::addInfoMessage("Typ wydarzenia '$typeName' został dodany.");
        } else {
            Utils::addErrorMessage("Nazwa typu wydarzenia nie może być pusta.");
        }

        App::getRouter()->redirectTo('manageCatalogs');
    }

    public function action_editType() {
        if (!RoleUtils::inRole("Admin")) {
            Utils::addErrorMessage('Brak uprawnień do edycji typów.');
            App::getRouter()->redirectTo('manageCatalogs');
            return;
        }

        $typeId = ParamUtils::getFromCleanURL(1, true, 'Błąd: Brak ID typu.');

        if (empty($typeId)) {
            Utils::addErrorMessage('Niepoprawne ID typu.');
            App::getRouter()->redirectTo('manageCatalogs');
            return;
        }

        $type = App::getDB()->get('event_types', ['id_type', 'type_name'], ['id_type' => $typeId]);

        if ($type) {
            App::getSmarty()->assign('type', $type);
            App::getSmarty()->display('editType.tpl');
        } else {
            Utils::addErrorMessage('Nie znaleziono typu do edycji.');
            App::getRouter()->redirectTo('manageCatalogs');
        }
    }

    public function action_updateType() {
        if (!RoleUtils::inRole("Admin")) {
            Utils::addErrorMessage('Brak uprawnień do edycji typów.');
            App::getRouter()->redirectTo('manageCatalogs');
            return;
        }

        $typeId = ParamUtils::getFromRequest('id_type', true, 'Błąd: Brak ID typu.');
        $typeName = ParamUtils::getFromRequest('type_name', true, 'Błąd: Brak nowej nazwy typu.');

        if (empty($typeId) || empty($typeName)) {
            Utils::addErrorMessage('Niepoprawne dane.');
            App::getRouter()->redirectTo('manageCatalogs');
            return;
        }

        App::getDB()->update('event_types', [
            'type_name' => $typeName
        ], [
            'id_type' => $typeId
        ]);

        Utils::addInfoMessage("Typ wydarzenia został zaktualizowany.");
        App::getRouter()->redirectTo('manageCatalogs');
    }

    public function action_deleteType() {
        if (!RoleUtils::inRole("Admin")) {
            Utils::addErrorMessage('Brak uprawnień do usunięcia typu.');
            App::getRouter()->redirectTo('manageCatalogs');
            return;
        }

        $typeId = ParamUtils::getFromCleanURL(1, true, 'Błąd: Brak ID typu.');

        if (!empty($typeId)) {
            App::getDB()->delete('event_types', ['id_type' => $typeId]);
            Utils::addInfoMessage("Typ wydarzenia został usunięty.");
        }

        App::getRouter()->redirectTo('manageCatalogs');
    }
    public function action_viewHistory() {
        if (!RoleUtils::inRole("Admin")) {
            Utils::addErrorMessage('Brak uprawnień do podglądu historii zmian.');
            App::getRouter()->redirectTo('main');
            return;
        }
    
        try {
            // Pobieranie historii zmian z bazy
            $history = App::getDB()->select('change_history', [
                '[>]users' => ['performed_by' => 'id_user']
            ], [
                'change_history.id_change',
                'change_history.action',
                'change_history.date_time',
                'users.login'
            ], [
                'ORDER' => ['change_history.date_time' => 'DESC']
            ]);
    
            if (empty($history)) {
                Utils::addInfoMessage('Brak zapisanych zmian w historii.');
            }
    
            // Przekazanie danych do widoku
            App::getSmarty()->assign('history', $history);
            App::getSmarty()->display('viewHistory.tpl');
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd podczas pobierania historii zmian.');
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            App::getRouter()->redirectTo('adminPanel');
        }
    }
   
    public function action_changePasswordek() {
        $adminId = SessionUtils::load('id_user', true);
    
        if (!$adminId) {
            Utils::addErrorMessage('Błąd: Brak danych administratora.', "password_error");
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo('login');
            return;
        }
    
        if (!RoleUtils::inRole("Admin")) {
            Utils::addErrorMessage('Brak uprawnień do zmiany haseł.', "password_error");
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo('adminPanel');
            return;
        }
    
        $v = new Validator();
    
        $userId = $v->validateFromRequest('id_user', [
            'required' => true,
            'numeric' => true,
            'min' => 1,
            'validator_message' => 'Błąd: Brak poprawnego ID użytkownika.'
        ]);
    
        $newPassword = $v->validateFromRequest('new_password', [
            'required' => true,
            'min_length' => 6,
            'max_length' => 64,
            'validator_message' => 'Hasło musi mieć od 6 do 64 znaków.'
        ]);
    
        $confirmPassword = $v->validateFromRequest('confirm_password', [
            'required' => true,
            'validator_message' => 'Musisz potwierdzić nowe hasło.'
        ]);
    
        // Jeśli walidacja nie powiodła się
        if (!$v->isLastOK()) {
            Utils::addErrorMessage("Wystąpił błąd w formularzu.", "password_error_{$userId}");
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo('adminPanel');
            return;
        }
    
        // Jeśli hasła są różne
        if ($newPassword !== $confirmPassword) {
            Utils::addErrorMessage("Hasła nie są identyczne.", "password_error_{$userId}");
            SessionUtils::storeMessages();
            App::getRouter()->redirectTo('adminPanel');
            return;
        }
    
        try {
            // Hashowanie nowego hasła
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
    
            // Aktualizacja hasła w bazie
            App::getDB()->update('users', [
                'password' => $hashedPassword,
                'modified_by' => $adminId,
                'modified_at' => date('Y-m-d H:i:s')
            ], [
                'id_user' => $userId
            ]);
    
            // Dodanie wpisu do historii zmian
            App::getDB()->insert('change_history', [
                'action' => "Administrator ID: {$adminId} zmienił hasło użytkownika ID: {$userId}",
                'performed_by' => $adminId
            ]);
    
            Utils::addInfoMessage("Hasło użytkownika ID: {$userId} zostało pomyślnie zmienione.", "password_success_{$userId}");
        } catch (\Exception $e) {
            Utils::addErrorMessage("Błąd podczas zmiany hasła.", "password_error_{$userId}");
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
        }
    
        SessionUtils::storeMessages();
        App::getRouter()->redirectTo('adminPanel');
    }
    public function action_showUsers() {
        if (!RoleUtils::inRole("Admin")) {
            Utils::addErrorMessage('Brak uprawnień do wyświetlania listy użytkowników.');
            App::getRouter()->redirectTo('main');
            return;
        }
    
        $page = ParamUtils::getFromGet('page', 1);
        $recordsPerPage = 7;
    
        $count = App::getDB()->count("users");
        $totalPages = ceil($count / $recordsPerPage);
    
        $page = max(1, min($totalPages, $page));
        $offset = ($page - 1) * $recordsPerPage;
    
        $users = App::getDB()->select("users", [
            'id_user',
            'login',
            'email',
            'created_at',
            'modified_at',
            'is_active'
        ], [
            "LIMIT" => [$offset, $recordsPerPage]
        ]);
    
        App::getSmarty()->assign('conf', App::getConf());
        App::getSmarty()->assign("users", $users);
        App::getSmarty()->assign("currentPage", $page);
        App::getSmarty()->assign("totalPages", $totalPages);
    
        App::getSmarty()->display("showUsers.tpl");
    }
    
}