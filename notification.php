<?php

class Notification{
    private $id_notif;
    private $contenu_notif;
    private $time_notif;
    private $id_module;

    function __construct($id_notif, $contenu_notif, $time_notif, $id_module){
        $this->id_notif = $id_notif;
        $this->contenu_notif = $contenu_notif;
        $this->time_notif = $time_notif;
        $this->id_module = $id_module;
    }

    }
