<?php

use core\App;
use core\Utils;

// Ustawienie domyślnej akcji (np. strona główna)
App::getRouter()->setDefaultRoute('main');

// Ustawienie akcji logowania jako domyślnej dla użytkowników bez uprawnień
App::getRouter()->setLoginRoute('loginShow');

// Definicje tras
Utils::addRoute('main', 'MainCtrl');            // Strona główna
Utils::addRoute('eventList', 'MainCtrl');       // Lista wydarzeń
Utils::addRoute('about', 'MainCtrl');           // O nas
Utils::addRoute('contact', 'MainCtrl');         // Kontakt
Utils::addRoute('gallery', 'MainCtrl');         // Galeria

// Rejestracja
Utils::addRoute('registerShow', 'RegisterCtrl'); // Wyświetlanie formularza rejestracji
Utils::addRoute('register', 'RegisterCtrl');     // Obsługa rejestracji

// Logowanie
Utils::addRoute('loginShow', 'LoginCtrl');      // Wyświetlanie formularza logowania
Utils::addRoute('login', 'LoginCtrl');          // Obsługa logowania
Utils::addRoute('logout', 'LoginCtrl');         // Wylogowanie

// Zarządzanie wydarzeniami – Event Organizer
Utils::addRoute('eventList', 'EventCtrl');
Utils::addRoute('eventListAjax', 'EventCtrl');
Utils::addRoute('eventOrganizerPanel', 'EventCtrl', "Event Organizer");
Utils::addRoute('deleteEvent', 'EventCtrl', "Event Organizer");
Utils::addRoute('editEvent', 'EventCtrl', "Event Organizer");
Utils::addRoute('verifyEvent', 'EventCtrl', "Event Organizer");
Utils::addRoute('closeRegistrations', 'EventCtrl', "Event Organizer");
Utils::addRoute('viewParticipants', 'EventCtrl', "Event Organizer");

// Panel Administratora – Admin
Utils::addRoute('adminPanel', 'AdminCtrl', "Admin"); // Wyświetlanie panelu administratora
Utils::addRoute('manageCatalogs', 'AdminCtrl', "Admin"); // Zarządzanie katalogami
Utils::addRoute('viewHistory', 'AdminCtrl', "Admin"); // Historia zmian
Utils::addRoute('editStatus', 'AdminCtrl', "Admin"); // Edycja statusów wydarzeń
Utils::addRoute('updateStatus', 'AdminCtrl', "Admin"); // zmiana statusu
Utils::addRoute('editType', 'AdminCtrl', "Admin"); // Edycja typów wydarzeń
Utils::addRoute('addStatus', 'AdminCtrl', "Admin"); //dodanie statusu
Utils::addRoute('addType', 'AdminCtrl', "Admin"); // dodanie typu
Utils::addRoute('deleteStatus', 'AdminCtrl', "Admin"); //usunięcie statusu
Utils::addRoute('deleteType', 'AdminCtrl', "Admin"); // usunięcie typu
Utils::addRoute('updateType', 'AdminCtrl', "Admin"); // zmiana typu
Utils::addRoute('changePasswordek', 'AdminCtrl', "Admin"); // zmiana hasła
Utils::addRoute('showUsers', 'AdminCtrl', "Admin"); // listowanie użytkowników

// Panel Uczestnika – Participant
Utils::addRoute('participantPanel', 'ParticipantCtrl', "Participant");
Utils::addRoute('registerForEvent', 'ParticipantCtrl', "Participant");
Utils::addRoute('unregisterFromEvent', 'ParticipantCtrl', "Participant");
Utils::addRoute('myEvents', 'ParticipantCtrl', "Participant"); // Lista wydarzeń użytkownika
Utils::addRoute('showConfirmation', 'ParticipantCtrl', "Participant"); // Potwierdzenie 
Utils::addRoute('changePassword', 'ParticipantCtrl', "Participant"); 



