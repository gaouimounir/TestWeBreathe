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

    function getId_notif(){
        return $this->id_notif;
    }
    function getContenu_notif(){
        return $this->contenu_notif;
    }
    function setContenu_notif($contenu_notif){
        $this->contenu_notif = $contenu_notif;
    }
    function getTime_notif(){
        return $this->time_notif;
    }
    function setTime_notif($time_notif){
        $this->time_notif = $time_notif;
    }
    function getId_module(){
        return $this->id_module;
    }

    }
