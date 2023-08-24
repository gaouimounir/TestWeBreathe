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


    }