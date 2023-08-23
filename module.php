<?php

class Module{
    private $id_module;
    private $nom;
    private $type;
    private $date_ajout;
    private $etat;

    function __construct($id_module, $nom, $type, $date_ajout, $etat){
        $this->id_module = $id_module;
        $this->nom = $nom;
        $this->type = $type;
        $this->date_ajout = $date_ajout;
        $this->etat = $etat;
    }
    function getId_module(){
        return $this->id_module;
    }
    function getNom(){
        return $this->nom;
    }
    function setNom($nom){
        $this->nom = $nom;
    }
    function getType(){
        return $this->type;
    }
    function setType($type){
        $this->type = $type;
    }
    function getDate_ajout(){
        return $this->date_ajout;
    }
    function setDate_ajout($date_ajout){
        $this->date_ajout = $date_ajout;
    }
    function getEtat(){
        return $this->etat;
    }
    function setEtat($etat){
        $this->etat = $etat;
    }
    
}