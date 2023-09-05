<?php
include('module.php');
class Historique
{
    private $id_historique;
    private $time_value;
    private $valeur_mesurer;
    private $etat;
    private $id_module;

    function __construct($id_historique, $time_value, $valeur_mesurer, $etat, $id_module)
    {
        $this->id_historique = $id_historique;
        $this->time_value = $time_value;
        $this->valeur_mesurer = $valeur_mesurer;
        $this->etat = $etat;
        $this->id_module = $id_module;
    }

    function getId_historique()
    {
        return $this->id_historique;
    }
    function getTime_value()
    {
        return $this->time_value;
    }
    function setTime_value($time_value)
    {
        $this->time_value = $time_value;
    }
    function getValeur_mesurer()
    {
        return $this->valeur_mesurer;
    }
    function setValeur_mesurer($valeur_mesurer)
    {
        $this->valeur_mesurer = $valeur_mesurer;
    }
    function getEtat()
    {
        return $this->etat;
    }
    function setEtat($etat)
    {
        $this->etat = $etat;
    }
    function getId_module()
    {
        return $this->id_module;
    }

    static function getHistoriqueById($id_historique)
    {
        $bdd = new PDO('mysql:dbname=testwebreathe;host=localhost', 'root', '');
        $query = $bdd->query('SELECT * FROM historiquemodule WHERE id_historique = ' . $id_historique);
        $unHistorique = $query->fetch();
        return new Historique($unHistorique['id_historique'], $unHistorique['time_value'], $unHistorique['valeur_mesurer'], $unHistorique['etat'], $unHistorique['id_module']);
    }

    static function updateHistorique($historique)
    {
        $bdd = new PDO('mysql:dbname=testwebreathe;host=localhost', 'root', '');
        $query = $bdd->prepare('UPDATE historiquemodule SET time_value = :time_value, valeur_mesurer = :valeur_mesurer, etat = :etat, id_module = :id_module WHERE id_historique = :id_historique');
        $query->execute(array('time_value' => $historique->getTime_value(), 'valeur_mesurer' => $historique->getValeur_mesurer(), 'etat' => $historique->getEtat(), 'id_module' => $historique->getId_module));
    }
}
