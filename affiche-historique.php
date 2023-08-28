<?php

$bdd = new PDO('mysql:dbname=testwebreathe;host=localhost','root','');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiche Historique</title>
</head>
<body>
    <?php
    $recupHistorique = $bdd->query('SELECT * FROM historique');
    while ($historique = $recupHistorique->fetch()){
    ?>
        <div>
            <ul>
                <li>Time Value: <?= $historique['time_value'];?></li>
                <li>Valeur mesurer: <?= $historique['valeur_mesurer'];?></li>
                <li>Etat : <?= $historique['etat'];?></li>
            </ul>
        </div>
    <?php
    }
    ?>
</body>
</html>