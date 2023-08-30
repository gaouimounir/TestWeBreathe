<?php
include('module.php');

$bdd = new PDO('mysql:dbname=testwebreathe;host=localhost','root','');
$queryExec = $bdd->query("SELECT * FROM module");
$lesModules = $queryExec->fetchAll();

    $tableauModule= array();

    foreach ($lesModules as $module) {

        $monModule= new Module ($module['id_module'],$module['nom'],$module['type'],$module['mesure'],$module['unite'],$module['etat']);
        
        array_push($tableauModule,$monModule);
    }

    //Vérifie que le formulare a été soumis

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom= $_POST['nom'];
    $type= $_POST['type'];
    $mesure = $_POST['mesure'];
    $unite = $_POST['unite'];
    $etat = $_POST['etat'];
    Module::addModule(new Module(null, $nom, $type, $mesure, $unite, $etat));
    header('Location: affiche-module.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Affiche Module</title>
</head>
<body>


<form method="post">
    <label for="nom">Nom : </label>
    <input type="text" id="nom" name="nom">
    <label for="type">Type : </label>
    <input type="text" id="type" name="type">
    <label for="mesure">Mesure : </label>
    <input type="text" id="mesure" name="mesure">
    <label for="unite">Unite : </label>
    <input type="text" id="unite" name="unite">
    <label for="etat">Etat : </label>
    <input type="text" id="etat" name="etat">
    <input type="submit" value="Inserer" id="inserer" >
</form>

    <?php
    $recupModule = $bdd->query('SELECT * FROM module');
    while ($module = $recupModule->fetch()){
    ?>
        <div class="module-liste">
            <ul>
                <li>Nom: <?= $module['nom'];?></li>
                <li>Type: <?= $module['type'];?></li>
                <li>Mesure : <?= $module['mesure'];?></li>
                <li>Unite : <?= $module['unite'];?></li>
                <li>Etat : <?= $module['etat'];?></li>
            </ul>
        </div>

      
    <?php
    }
    ?>
</body>
</html>