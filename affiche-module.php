<?php
include('module.php');
$bdd = new PDO('mysql:dbname=testwebreathe;host=localhost','root','');

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