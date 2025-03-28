<?php

namespace app\controllers;

use core\App;

class MainCtrl {
    public function action_main() {
        App::getSmarty()->assign('conf', App::getConf());
        App::getSmarty()->display('main.tpl');
    }

    public function action_eventList() {
        $events = App::getDB()->select('events', '*');
        App::getSmarty()->assign('events', $events);
        App::getSmarty()->display('eventList.tpl');
    }

    public function action_about() {
        App::getSmarty()->assign('conf', App::getConf());
        App::getSmarty()->display('about.tpl');
    }

    public function action_contact() {
        App::getSmarty()->assign('conf', App::getConf());
        App::getSmarty()->display('contact.tpl');
    }

    public function action_gallery() {
        App::getSmarty()->assign('conf', App::getConf());
        App::getSmarty()->display('gallery.tpl');
    }
    
}
