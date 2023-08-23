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
}