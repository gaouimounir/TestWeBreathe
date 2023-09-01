<?php
include('module.php');
$bdd = new PDO('mysql:dbname=testwebreathe;host=localhost', 'root', '');
if (isset($_GET['id_module'])) {
    $module = Module::getModuleById($_GET['id_module']);
    if ($module) {
        //Vérifie que le formulare a été soumis
        $module->deleteModule();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Suppression</title>
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


    <h1> Suppression de <?php echo $module->getNom(); ?> </h1>
    <a href="index.php">Retour à la liste des modules</a>


</body>

</html>