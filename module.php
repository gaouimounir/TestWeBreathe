<?php

use Module as GlobalModule;

class Module
{
    private $id_module;
    private $nom;
    private $type;
    private $mesure;
    private $unite;
    private $etat;

    function __construct($id_module, $nom, $type, $mesure, $unite, $etat)
    {
        $this->id_module = $id_module;
        $this->nom = $nom;
        $this->type = $type;
        $this->mesure = $mesure;
        $this->unite = $unite;
        $this->etat = $etat;
    }
    function getId_module()
    {
        return $this->id_module;
    }
    function getNom()
    {
        return $this->nom;
    }
    function setNom($nom)
    {
        $this->nom = $nom;
    }
    function getType()
    {
        return $this->type;
    }
    function setType($type)
    {
        $this->type = $type;
    }
    function getMesure()
    {
        return $this->mesure;
    }
    function setMesure($mesure)
    {
        $this->mesure = $mesure;
    }
    function getUnite()
    {
        return $this->unite;
    }
    function setUnite($unite)
    {
        $this->unite = $unite;
    }
    function getEtat()
    {
        return $this->etat;
    }
    function setEtat($etat)
    {
        $this->etat = $etat;
    }

    static function createModule($module)
    {
        $bdd = new PDO('mysql:dbname=testwebreathe;host=localhost', 'root', '');
        $query = $bdd->prepare('INSERT INTO module (nom, type, mesure, unite, etat) VALUES (:nom, :type, :mesure, :unite, :etat)');
        $query->execute(array('nom' => $module->getNom(), 'type' => $module->getType(), 'mesure' => $module->getMesure(), 'unite' => $module->getUnite(), 'etat' => $module->getEtat()));
        self::addToHistory($module->getId_module(), 'Ajout', 'Module créé');
    }

    static function getModuleById($id_module)
    {
        $bdd = new PDO('mysql:dbname=testwebreathe;host=localhost', 'root', '');
        $query = $bdd->query('SELECT * FROM module WHERE id_module = ' . $id_module);
        $unModule = $query->fetch();
        return new Module($unModule['id_module'], $unModule['nom'], $unModule['type'], $unModule['mesure'], $unModule['unite'], $unModule['etat']);
    }

    static function updateModule($module)
    {
        $bdd = new PDO('mysql:dbname=testwebreathe;host=localhost', 'root', '');
        $query = $bdd->prepare('UPDATE module SET nom = :nom, type = :type, mesure = :mesure, unite = :unite, etat = :etat WHERE id_module = :modif');
        $query->execute(array('modif' => $module->getId_module(), 'nom' => $module->getNom(), 'type' => $module->getType(), 'mesure' => $module->getMesure(), 'unite' => $module->getUnite(), 'etat' => $module->getEtat()));
    }

    function deleteModule()
    {
        $bdd = new PDO('mysql:dbname=testwebreathe;host=localhost', 'root', '');
        $query = $bdd->prepare('DELETE FROM module WHERE id_module=:supp');
        $query->execute(array('supp' => $this->getId_module()));
    }
}
