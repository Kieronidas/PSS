<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;
use core\Validator;
use app\forms\ParticipantForm;

class ParticipantCtrl {

    private $form;
    private $events;

    public function __construct() {
        $this->form = new ParticipantForm();
    }

    /**
     * Wyświetla panel uczestnika z listą wydarzeń
     */
    public function action_participantPanel() {
        $user_id = SessionUtils::load('id_user', true);
        
        try {
            $this->events = App::getDB()->select("events", [
                "id_event", "name", "location", "date", "time", "capacity", "registered"
            ], [
                "status_id" => 1, 
                "ORDER" => "date"
            ]);
    
            $my_events = App::getDB()->select("events", [
                "[>]participants" => ["id_event" => "id_event"]
            ], [
                "events.id_event",
                "events.name",
                "events.location",
                "events.date",
                "events.time",
                "events.capacity",
                "events.registered"
            ], [
                "participants.id_user" => $user_id,
                "ORDER" => ["events.date" => "ASC"]
            ]);
    
            App::getSmarty()->assign('events', $this->events);
            App::getSmarty()->assign('my_events', $my_events);
            App::getSmarty()->display('ParticipantPanel.tpl');
    
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd podczas pobierania wydarzeń.');
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
        }
    }
    

    /**
     * Rejestracja użytkownika na wydarzenie
     */
    public function action_registerForEvent() {
        $this->form->event_id = ParamUtils::getFromRequest('id_event', true, 'Nie wybrano wydarzenia.');
        $user_id = \core\SessionUtils::load("id_user", true);
    
        if (App::getMessages()->isError()) return;
    
      
        try {
            App::getDB()->action(function($db) use ($user_id) {
                $event = $db->get("events", ["capacity", "registered"], ["id_event" => $this->form->event_id]);
    
                if (!$event) {
                    Utils::addErrorMessage("Wydarzenie nie istnieje.");
                    return;
                }
          
    
             $exist=   App::getDB()->has("participants", [
                   "id_event" => $this->form->event_id,
                    "id_user" => $user_id
                ]);
        if ($exist){  Utils::addInfoMessage("Jesteś już zapisany!");
               App::getRouter()->redirectTo("participantPanel");

}



                if ($event['registered'] < $event['capacity']) {
                  
                    $db->insert("participants", [
                        "id_event" => $this->form->event_id,
                        "id_user" => $user_id
                    ]);
                 
    
                    $db->update("events", ["registered[+]" => 1], ["id_event" => $this->form->event_id]);
                   
                    Utils::addInfoMessage("Zarejestrowano na wydarzenie!");
                } else {
                    Utils::addErrorMessage("Brak miejsc na to wydarzenie.");
                }
            });
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd podczas rejestracji.');
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
        }
    
        App::getRouter()->redirectTo("participantPanel");
    }
    /**
     * Rezygnacja z udziału w wydarzeniu
     */
    public function action_unregisterFromEvent() {
        $this->form->event_id = ParamUtils::getFromRequest('id_event', true, 'Nie wybrano wydarzenia.');
        $user_id = \core\SessionUtils::load("id_user", true);
    
        if (App::getMessages()->isError()) return;
    
        try {
            App::getDB()->action(function($db) use ($user_id) {
                // Sprawdzenie, czy użytkownik jest zapisany
                $exist = $db->has("participants", [
                    "id_event" => $this->form->event_id,
                    "id_user" => $user_id
                ]);
    
                if (!$exist) {
                    Utils::addErrorMessage("Nie jesteś zapisany na to wydarzenie.");
                    return;
                }
    
                // Usunięcie użytkownika z listy uczestników
                $db->delete("participants", [
                    "id_event" => $this->form->event_id,
                    "id_user" => $user_id
                ]);
    
                // Zmniejszenie liczby zapisanych
                $db->update("events", ["registered[-]" => 1], ["id_event" => $this->form->event_id]);
    
                Utils::addInfoMessage("Zrezygnowano z wydarzenia.");
            });
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd podczas rezygnacji.');
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
        }
    
        App::getRouter()->redirectTo("participantPanel");
    }
    
    /**
     * Pobiera listę powiadomień dla uczestnika
     */
    public function action_notifications() {
        $user_id = SessionUtils::load('id_user', true);

        try {
            $notifications = App::getDB()->select("notifications", "message", ["id_user" => $user_id]);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd podczas pobierania powiadomień.');
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
        }

        App::getSmarty()->assign('notifications', $notifications);
        App::getSmarty()->display('Notifications.tpl');
    }
    public function action_showConfirmation() {
        $event_id = ParamUtils::getFromCleanURL(1, true, 'Nie wybrano wydarzenia.');
        $user_id = \core\SessionUtils::load("id_user", true);
    
        if (App::getMessages()->isError()) {
            App::getRouter()->redirectTo("participantPanel");
            return;
        }
    
        try {
            // Pobieramy szczegóły wydarzenia
            $event = App::getDB()->get("events", ["id_event", "name", "date", "time", "location"], ["id_event" => $event_id]);
    
            // Sprawdzamy, czy użytkownik jest zapisany na wydarzenie
            $isRegistered = App::getDB()->has("participants", [
                "id_event" => $event_id,
                "id_user" => $user_id
            ]);
    
            if (!$event) {
                Utils::addErrorMessage("Wydarzenie nie istnieje.");
                App::getRouter()->redirectTo("participantPanel");
                return;
            }
    
            if (!$isRegistered) {
                Utils::addErrorMessage("Nie jesteś zapisany na to wydarzenie.");
                App::getRouter()->redirectTo("participantPanel");
                return;
            }
    
            // Przekazujemy dane do widoku
            App::getSmarty()->assign('event', $event);
            App::getSmarty()->assign('user_id', $user_id);
            App::getSmarty()->display('Confirmation.tpl');
    
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd podczas pobierania potwierdzenia.');
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
        }
    }
    public function action_myEvents() {
        $user_id = \core\SessionUtils::load("id_user", true);
    
        if (!$user_id) {
            Utils::addErrorMessage("Musisz być zalogowany, aby zobaczyć swoje wydarzenia.");
            App::getRouter()->redirectTo("participantPanel");
            return;
        }
    
        try {
            $this->events = App::getDB()->select("events", [
                "[>]participants" => ["id_event" => "id_event"]
            ], [
                "events.id_event",
                "events.name",
                "events.location",
                "events.date",
                "events.time",
                "events.capacity",
                "events.registered"
            ], [
                "participants.id_user" => $user_id,
                "ORDER" => ["events.date" => "ASC"]
            ]);
    
            App::getSmarty()->assign('my_events', $this->events);
            App::getSmarty()->display('ParticipantPanel.tpl');
    
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd podczas pobierania zapisanych wydarzeń.');
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
        }
    }



    public function action_changePassword() {
        $user_id = SessionUtils::load('id_user', true);
    
        if (!$user_id) {
            Utils::addErrorMessage("Musisz być zalogowany, aby zmienić hasło.");
            App::getRouter()->redirectTo("participantPanel");
            return;
        }
    
        try {
            $oldPassword = ParamUtils::getFromRequest('old_password', true, 'Musisz podać obecne hasło.');
            $newPassword = ParamUtils::getFromRequest('new_password', true, 'Musisz podać nowe hasło.');
            $confirmPassword = ParamUtils::getFromRequest('confirm_password', true, 'Musisz potwierdzić nowe hasło.');
    
            // Sprawdzenie poprawności danych
            if (!$oldPassword || !$newPassword || !$confirmPassword) {
                Utils::addErrorMessage("Wypełnij wszystkie pola.");
                App::getRouter()->redirectTo("participantPanel");
                return;
            }
    
            if ($newPassword !== $confirmPassword) {
                Utils::addErrorMessage("Nowe hasła nie są identyczne.");
                App::getRouter()->redirectTo("participantPanel");
                return;
            }
    
            if (strlen($newPassword) < 6) {
                Utils::addErrorMessage("Nowe hasło musi mieć co najmniej 6 znaków.");
                App::getRouter()->redirectTo("participantPanel");
                return;
            }
    
            // Pobranie aktualnego hasła użytkownika
            $user = App::getDB()->get("users", ["password"], ["id_user" => $user_id]);
    
            if (!$user || !password_verify($oldPassword, $user['password'])) {
                Utils::addErrorMessage("Obecne hasło jest nieprawidłowe.");
                App::getRouter()->redirectTo("participantPanel");
                return;
            }
    
            // Hashowanie nowego hasła
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
    
            // Aktualizacja hasła w bazie
            App::getDB()->update('users', [
                'password' => $hashedPassword,
                'modified_by' => $user_id,
                'modified_at' => date('Y-m-d H:i:s')
            ], [
                'id_user' => $user_id
            ]);
    
            // Dodanie wpisu do historii zmian
            App::getDB()->insert('change_history', [
                'action' => "Zmiana hasła przez użytkownika ID: {$user_id}",
                'performed_by' => $user_id
            ]);
    
            Utils::addInfoMessage("Hasło zostało pomyślnie zmienione.");
        } catch (\Exception $e) {
            Utils::addErrorMessage("Błąd podczas zmiany hasła.");
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
        }
    
        App::getRouter()->redirectTo("participantPanel");
    }
}