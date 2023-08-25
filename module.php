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

    static function addModule($nom, $type, $etat) {
        $bdd = new PDO('mysql:dbname=testwebreathe;host=localhost','root','');
        $query = $bdd->prepare('INSERT INTO moduleit (nom, type, date_ajout, etat) VALUES (:nom, :type, :date_ajout, :etat)');
        $date_ajout = date('Y-m-d H:i:s');
        $query->execute(array('nom' => $nom, 'type' => $type, 'date_ajout' => $date_ajout, 'etat' => $etat));
    }

    static function getModuleById($id_module){
        $bdd = new PDO('mysql:dbname=testwebreathe;host=localhost','root','');
        $query = $bdd->query('SELECT * FROM moduleit WHERE id_module = ' . $id_module);
        $unModule = $query->fetch();
        return new Module($unModule['id_module'], $unModule['nom'], $unModule['type'], $unModule['date_ajout'], $unModule['etat']);
    }

    static function updateModule($module){
        $bdd = new PDO('mysql:dbname=testwebreathe;host=localhost','root','');
        $query = $bdd->prepare('UPDATE moduleit SET nom = :nom, type = :type, date_ajout = :date_ajout, etat = :etat WHERE id_module = :id_module');
        $query->execute(array('nom' =>$module->getNom(), 'type' =>$module->getType(), 'date_ajout' =>$module->getDate_ajout(), 'etat' =>$module->getEtat()));
    }
}

?>