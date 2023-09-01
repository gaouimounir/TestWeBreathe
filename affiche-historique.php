<?php
include('historique.php');
$bdd = new PDO('mysql:dbname=testwebreathe;host=localhost', 'root', '');

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Affiche Historique</title>
</head>

<body>

    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="affiche-historique.php">Historique</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
    </ul>


    <?php
    $recupHistorique = $bdd->query('SELECT * FROM historiquemodule');
    while ($historique = $recupHistorique->fetch()) {
    ?>
        <div>
            <ul>
                <li>Time Value: <?= $historique['time_value']; ?></li>
                <li>Valeur mesurer: <?= $historique['valeur_mesurer']; ?></li>
                <li>Etat : <?= $historique['etat']; ?></li>
            </ul>
        </div>
    <?php
    }
    ?>
</body>

</html>