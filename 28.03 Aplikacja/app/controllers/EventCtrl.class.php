<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\RoleUtils;
use core\SessionUtils;
use core\Validator;
class EventCtrl {

    /**
     * Wyświetlenie listy wydarzeń z opcjonalnym filtrowaniem
     */

     public function action_eventList() {
        $v = new Validator();
    
        // 1. Pobieramy parametry filtrów z GET
        $filters = [
            'name'        => $v->validateFromRequest('name', ['trim' => true]),
            'description' => $v->validateFromRequest('description', ['trim' => true]),
            'date_from'   => $v->validateFromRequest('date_from', ['date_format' => 'Y-m-d']),
            'date_to'     => $v->validateFromRequest('date_to', ['date_format' => 'Y-m-d']),
            'time_from'   => $v->validateFromRequest('time_from'),
            'time_to'     => $v->validateFromRequest('time_to'),
            'status'      => $v->validateFromRequest('status'),
            'type'        => $v->validateFromRequest('type'),
            'location'    => $v->validateFromRequest('location', ['trim' => true])
        ];
    
        
        if ($filters['date_from'] instanceof \DateTime) {
            $filters['date_from'] = $filters['date_from']->format('Y-m-d');
        }
        if ($filters['date_to'] instanceof \DateTime) {
            $filters['date_to'] = $filters['date_to']->format('Y-m-d');
        }
    
        
        $sort = ParamUtils::getFromRequest('sort', false, 'date');   
        $order = ParamUtils::getFromRequest('order', false, 'ASC');
    
        $allowedSortColumns = ['name', 'date', 'time', 'capacity', 'location'];
        $allowedOrders = ['ASC', 'DESC', 'asc', 'desc'];
    
        if (!in_array($sort, $allowedSortColumns)) {
            $sort = 'date';
        }
        if (!in_array(strtoupper($order), $allowedOrders)) {
            $order = 'ASC';
        }
    
       
        $conditions = [];
    
        if (!empty($filters['name'])) {
            $conditions["name[~]"] = $filters['name'];
        }
        if (!empty($filters['description'])) {
            $conditions["description[~]"] = $filters['description'];
        }
        if (!empty($filters['date_from'])) {
            $conditions["date[>=]"] = $filters['date_from'];
        }
        if (!empty($filters['date_to'])) {
            $conditions["date[<=]"] = $filters['date_to'];
        }
    
     
        if (!empty($filters['time_from'])) {
            $conditions["time[>=]"] = $filters['time_from'];
        }
        if (!empty($filters['time_to'])) {
            $conditions["time[<=]"] = $filters['time_to'];
        }
    
        if (!empty($filters['status'])) {
            $conditions["is_verified"] = $filters['status'] == 'verified' ? 1 : 0;
        }
        if (!empty($filters['type'])) {
            $conditions["type_id"] = $filters['type'];
        }
        if (!empty($filters['location'])) {
            $conditions["location[~]"] = $filters['location'];
        }
    
       
        $conditions["ORDER"] = [$sort => $order];
    
       
        $events = App::getDB()->select('events', '*', $conditions);
    
       
        App::getSmarty()->assign('conf', App::getConf());
        App::getSmarty()->assign('events', $events);
        App::getSmarty()->assign('filters', $filters);
        App::getSmarty()->assign('currentSort', $sort);
        App::getSmarty()->assign('currentOrder', $order);
    
      
        App::getSmarty()->display('eventList.tpl');
    }

    public function action_eventOrganizerPanel() 
{
    
    if (!RoleUtils::inRole("Event Organizer")) {
        Utils::addErrorMessage('Brak uprawnień do panelu organizatora.');
        App::getRouter()->redirectTo('main');
        return;
    }

   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        try {
            $v = new Validator();

            $name = $v->validateFromRequest('name', [
                'trim' => true, 'required' => true,
                'required_message' => 'Nazwa wydarzenia jest wymagana.',
                'min_length' => 3, 'max_length' => 100,
                'validator_message' => 'Nazwa musi mieć od 3 do 100 znaków.'
            ]);

            $location = $v->validateFromRequest('location', [
                'trim' => true, 'required' => true,
                'required_message' => 'Lokalizacja jest wymagana.'
            ]);

            $description = $v->validateFromRequest('description', [
                'trim' => true, 'required' => true,
                'required_message' => 'Opis wydarzenia jest wymagany.'
            ]);

            $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING);
            if (!$date || !\DateTime::createFromFormat('Y-m-d', $date)) {
                Utils::addErrorMessage('Nieprawidłowy format daty (wymagany YYYY-MM-DD).');
            }

            $time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_STRING);
            if (!$time || !preg_match('/^([01]\d|2[0-3]):([0-5]\d)$/', $time)) {
                Utils::addErrorMessage('Nieprawidłowy format godziny (wymagany HH:MM).');
            }

            $capacity = $v->validateFromRequest('capacity', [
                'int' => true, 'required' => true, 'min' => 1,
                'required_message' => 'Pojemność jest wymagana.',
                'validator_message' => 'Pojemność musi być liczbą całkowitą większą od 0.'
            ]);

            $status_id = filter_input(INPUT_POST, 'status_id', FILTER_VALIDATE_INT);
            if (!$status_id) {
                Utils::addErrorMessage('Status wydarzenia jest wymagany.');
            }

            $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
            if (!$type_id) {
                Utils::addErrorMessage('Typ wydarzenia jest wymagany.');
            }

           
            if (App::getMessages()->isError()) {
                throw new \Exception('Wystąpiły błędy w formularzu.');
            }

            
            $existingEvent = App::getDB()->has('events', ['name' => $name]);
            if ($existingEvent) {
                Utils::addErrorMessage('Taki event o tej nazwie już istnieje.');
            } else {
                
                App::getDB()->insert('events', [
                    'name'        => $name,
                    'description' => $description,
                    'location'    => $location,
                    'date'        => $date,
                    'time'        => $time,
                    'capacity'    => $capacity,
                    'status_id'   => $status_id,
                    'type_id'     => $type_id,
                    'created_by'  => $_SESSION['user']['id_user']
                ]);

                Utils::addInfoMessage('Wydarzenie zostało pomyślnie utworzone.');
            }

        } catch (\Exception $e) {
            Utils::addErrorMessage('Wystąpił błąd: ' . $e->getMessage());
        }
    }

  
    $events = App::getDB()->select('events', '*');
    $statuses = App::getDB()->select('event_statuses', ['id_status', 'status_name']);
    $types = App::getDB()->select('event_types', ['id_type', 'type_name']);

   
    App::getSmarty()->assign('events',     $events);
    App::getSmarty()->assign('statuses',   $statuses);
    App::getSmarty()->assign('types',      $types);
    App::getSmarty()->assign('name',       $_POST['name'] ?? '');
    App::getSmarty()->assign('description',$_POST['description'] ?? '');
    App::getSmarty()->assign('location',   $_POST['location'] ?? '');
    App::getSmarty()->assign('date',       $_POST['date'] ?? '');
    App::getSmarty()->assign('time',       $_POST['time'] ?? '');
    App::getSmarty()->assign('capacity',   $_POST['capacity'] ?? 300);
    App::getSmarty()->assign('status_id',  $_POST['status_id'] ?? '');
    App::getSmarty()->assign('type_id',    $_POST['type_id'] ?? '');

    
    App::getSmarty()->display('eventOrganizerPanel.tpl');
}

public function action_closeRegistrations() {
  
    if (!RoleUtils::inRole("Event Organizer")) {
        Utils::addErrorMessage('Brak uprawnień do zamknięcia zapisów.');
        App::getRouter()->redirectTo('main');
        return;
    }

   
    $eventId = ParamUtils::getFromPost('event_id', true, 'Błędne wywołanie akcji. Brak ID wydarzenia.');

    if (!$eventId) {
        Utils::addErrorMessage('Nieprawidłowe ID wydarzenia.');
        App::getRouter()->redirectTo('eventOrganizerPanel');
        return;
    }

    try {
       
        $event = App::getDB()->get('events', '*', [
            'id_event' => $eventId
        ]);

        if (!$event) {
            Utils::addErrorMessage('Nie znaleziono wydarzenia o podanym ID.');
            App::getRouter()->redirectTo('eventOrganizerPanel');
            return;
        }

      
        App::getDB()->update('events', [
            'capacity' => 0
        ], [
            'id_event' => $eventId
        ]);

        App::getDB()->insert('change_history', [
            'action'       => 'Zamknięcie zapisów na wydarzenie: ' . $event['name'] . ' (' . $eventId . ')',
            'performed_by' => $_SESSION['user']['id_user']
           
        ]);

       
        Utils::addInfoMessage('Zapisy na wydarzenie zostały zamknięte.');
    } catch (\PDOException $e) {
        Utils::addErrorMessage('Błąd bazy danych: ' . $e->getMessage());
    }

    App::getRouter()->redirectTo('eventOrganizerPanel');
}




       
        
    

    public function action_generateReport() {
        if (!RoleUtils::inRole("Event Organizer")) {
            Utils::addErrorMessage('Brak uprawnień do generowania raportów.');
            App::getRouter()->redirectTo('main');
            return;
        }
        
        $eventId = ParamUtils::getFromGet('event_id', true);
        $report = App::getDB()->select('participants', '*', ['id_event' => $eventId]);
        
        App::getSmarty()->assign('report', $report);
        App::getSmarty()->display('eventReport.tpl');
    }

    public function action_notifyParticipants() {
        if (!RoleUtils::inRole("Event Organizer")) {
            Utils::addErrorMessage('Brak uprawnień do wysyłania powiadomień.');
            App::getRouter()->redirectTo('main');
            return;
        }
        
        $eventId = ParamUtils::getFromPost('event_id', true);
        $message = ParamUtils::getFromPost('message', true);
        
        $participants = App::getDB()->select('participants', ['id_user'], ['id_event' => $eventId]);
        foreach ($participants as $participant) {
            App::getDB()->insert('notifications', [
                'id_user' => $participant['id_user'],
                'message' => $message,
                'event_id' => $eventId
            ]);
        }
        
        Utils::addInfoMessage('Powiadomienia zostały wysłane.');
        App::getRouter()->redirectTo('eventOrganizerPanel');
    }
    public function action_deleteEvent() {
       
        if (!RoleUtils::inRole("Event Organizer")) {
            Utils::addErrorMessage('Brak uprawnień do usuwania wydarzenia.');
            App::getRouter()->redirectTo('main');
            return;
        }
    
       
        $eventId = ParamUtils::getFromRequest('event_id', true, 'Brak ID wydarzenia.');
        $organizerId = SessionUtils::load('id_user', true);
    
        if (!$eventId) {
            Utils::addErrorMessage('Nie podano ID wydarzenia.');
            App::getRouter()->redirectTo('eventOrganizerPanel');
            return;
        }
    
        try {
          
            $event = App::getDB()->get('events', [
                'id_event', 'created_by', 'is_verified'
            ], [
                'id_event' => $eventId
            ]);
    
            if (!$event) {
                Utils::addErrorMessage('Wydarzenie nie istnieje.');
                App::getRouter()->redirectTo('eventOrganizerPanel');
                return;
            }
    
          
            if ($event['created_by'] != $organizerId && $event['is_verified'] != 1) {
                Utils::addErrorMessage('Nie masz uprawnień do usunięcia tego wydarzenia.');
                App::getRouter()->redirectTo('eventOrganizerPanel');
                return;
            }
    
           
            App::getDB()->delete('participants', ['id_event' => $eventId]);
            App::getDB()->delete('notifications', ['event_id' => $eventId]);
    
          
            App::getDB()->delete('events', ['id_event' => $eventId]);
    
            Utils::addInfoMessage('Wydarzenie zostało usunięte.');
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd podczas usuwania wydarzenia.');
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
        }
    
        App::getRouter()->redirectTo('eventOrganizerPanel');
    }
    public function action_verifyEvent() {
        if (!RoleUtils::inRole("Event Organizer")) {
            Utils::addErrorMessage('Brak uprawnień do zatwierdzania wydarzenia.');
            App::getRouter()->redirectTo('main');
            return;
        }
    
        $eventId = ParamUtils::getFromPost('event_id', true, 'Brak ID wydarzenia.');
        $organizerId = SessionUtils::load('id_user', true);
    
        if (!$eventId) {
            Utils::addErrorMessage('Nie podano ID wydarzenia.');
            App::getRouter()->redirectTo('eventOrganizerPanel');
            return;
        }
    
        try {
         
            $eventExists = App::getDB()->has('events', [
                'id_event' => $eventId,
                'created_by' => $organizerId
            ]);
    
            if (!$eventExists) {
                Utils::addErrorMessage('Nie masz uprawnień do zatwierdzenia tego wydarzenia.');
                App::getRouter()->redirectTo('eventOrganizerPanel');
                return;
            }
    
          
            App::getDB()->update('events', ['is_verified' => 1], ['id_event' => $eventId]);
    
            Utils::addInfoMessage('Wydarzenie zostało zatwierdzone.');
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd podczas zatwierdzania wydarzenia.');
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
        }
    
        App::getRouter()->redirectTo('eventOrganizerPanel');
    }
    public function action_editEvent() {
        if (!RoleUtils::inRole("Event Organizer")) {
            Utils::addErrorMessage('Brak uprawnień do edycji wydarzenia.');
            App::getRouter()->redirectTo('main');
            return;
        }
    
        $eventId = ParamUtils::getFromRequest('event_id', true);
    
        if (!$eventId) {
            Utils::addErrorMessage('Brak ID wydarzenia.');
            App::getRouter()->redirectTo('eventOrganizerPanel');
            return;
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $updatedData = [
                'name' => ParamUtils::getFromPost('name', true, 'Podaj nazwę wydarzenia.'),
                'description' => ParamUtils::getFromPost('description', true, 'Podaj opis wydarzenia.'),
                'location' => ParamUtils::getFromPost('location', true, 'Podaj lokalizację wydarzenia.'),
                'date' => ParamUtils::getFromPost('date', true, 'Podaj datę wydarzenia.'),
                'time' => ParamUtils::getFromPost('time', true, 'Podaj godzinę wydarzenia.'),
                'capacity' => ParamUtils::getFromPost('capacity', true, 'Podaj maksymalną liczbę uczestników.'),
                'is_verified' => ParamUtils::getFromPost('is_verified', false) ? 1 : 0, // Konwersja na int (1 = zatwierdzone, 0 = niezatwierdzone)
                'modified_by' => SessionUtils::load('id_user', true),
                'modified_at' => date('Y-m-d H:i:s')
            ];
    
            if (App::getMessages()->isError()) {
                App::getRouter()->redirectTo('eventOrganizerPanel');
                return;
            }
    
            try {
             
                $oldEvent = App::getDB()->get('events', '*', ['id_event' => $eventId]);
    
               
                App::getDB()->update('events', $updatedData, ['id_event' => $eventId]);
    
               
                App::getDB()->insert('change_history', [
                    'action' => "Edycja wydarzenia: {$oldEvent['name']} ({$eventId})",
                    'performed_by' => $updatedData['modified_by'],
                    'date_time' => $updatedData['modified_at']
                ]);
    
                Utils::addInfoMessage('Wydarzenie zostało zaktualizowane.');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Błąd podczas edycji wydarzenia.');
                if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            }
    
            App::getRouter()->redirectTo('eventOrganizerPanel');
        } else {
            try {
                $event = App::getDB()->get('events', '*', ['id_event' => $eventId]);
    
                if (!$event) {
                    Utils::addErrorMessage('Nie znaleziono wydarzenia.');
                    App::getRouter()->redirectTo('eventOrganizerPanel');
                    return;
                }
    
                App::getSmarty()->assign('event', $event);
                App::getSmarty()->display('editEvent.tpl');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Błąd podczas pobierania danych wydarzenia.');
                if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
                App::getRouter()->redirectTo('eventOrganizerPanel');
            }
        }
    }

    public function action_viewParticipants() {
        if (!RoleUtils::inRole("Event Organizer")) {
            Utils::addErrorMessage('Brak uprawnień do podglądu uczestników.');
            App::getRouter()->redirectTo('main');
            return;
        }
    
        $eventId = ParamUtils::getFromGet('event_id', true, 'Brak ID wydarzenia.');
    
        if (!$eventId) {
            Utils::addErrorMessage('Nie podano ID wydarzenia.');
            App::getRouter()->redirectTo('eventOrganizerPanel');
            return;
        }
    
        try {
           
            $event = App::getDB()->get('events', '*', ['id_event' => $eventId]);
    
            if (!$event) {
                Utils::addErrorMessage('Wydarzenie nie istnieje.');
                App::getRouter()->redirectTo('eventOrganizerPanel');
                return;
            }
    
           
            $participants = App::getDB()->select('participants', '*', ['id_event' => $eventId]);
    
            if (empty($participants)) {
                Utils::addErrorMessage('Brak zapisanych uczestników.');
            }
    
          
            App::getSmarty()->assign('event', $event);
            App::getSmarty()->assign('participants', $participants);
            App::getSmarty()->display('viewParticipants.tpl');
    
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Błąd podczas pobierania listy uczestników.');
            if (App::getConf()->debug) Utils::addErrorMessage($e->getMessage());
            App::getRouter()->redirectTo('eventOrganizerPanel');
        }
    }
}