<?php

class Historique{
    private $id_historique;
    private $time_value;
    private $valeur_mesurer;
    private $etat;
    private $id_module;

    function __construct($id_historique, $time_value, $valeur_mesurer, $etat, $id_module){
        $this->id_historique = $id_historique;
        $this->time_value = $time_value;
        $this->valeur_mesurer = $valeur_mesurer;
        $this->etat = $etat;
        $this->id_module = $id_module;
    }

    function getId_historique(){
        return $this->id_historique;
    }
    function getTime_value(){
        return $this->time_value;
    }
    function setTime_value($time_value){
        $this->time_value = $time_value;
    }
    function getValeur_mesurer(){
        return $this->valeur_mesurer;
    }
    function setValeur_mesurer($valeur_mesurer){
        $this->valeur_mesurer = $valeur_mesurer;
    }
    function getEtat(){
        return $this->etat;
    }
    function setEtat($etat){
        $this->etat = $etat;
    }
    function getId_module(){
        return $this->id_module;
    }


    }