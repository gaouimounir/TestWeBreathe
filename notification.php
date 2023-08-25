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

    static function getNotificationById($id_notif){
        $bdd = new PDO('mysql:dbname=testwebreathe;host=localhost','root','');
        $query = $bdd->query('SELECT * FROM notification WHERE id_notif = ' . $id_notif);
        $uneNotification = $query->fetch();
        return new Notification($uneNotification['id_notif'], $uneNotification['contenu_notif'], $uneNotification['time_notif'], $uneNotification['id_module']);
    }

    static function updateNotification($notification){
        $bdd = new PDO('mysql:dbname=testwebreathe;host=localhost','root','');
        $query = $bdd->prepare('UPDATE notification SET contenu_notif = :contenu_notif, time_notif = :time_notif, id_module = :id_module WHERE id_notif = :id_notif');
        $query->execute(array('contenu_notif' =>$notification->getContenu_notif(), 'time_notif' =>$notification->getTime_notif(), 'id_module' =>$notification->getId_module));
    }

    }
