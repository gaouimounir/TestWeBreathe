<?php
include('module.php');

$bdd = new PDO('mysql:dbname=testwebreathe;host=localhost', 'root', '');
$queryRecupModule = $bdd->query("SELECT * FROM module");
$lesModules = $queryRecupModule->fetchAll();

$tableauModule = array();

foreach ($lesModules as $module) {
    $monModule = new Module($module['id_module'], $module['nom'], $module['type'], $module['mesure'], $module['unite'], $module['etat']);
    array_push($tableauModule, $monModule);
}

//Vérifie que le formulare a été soumis

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $type = $_POST['type'];
    $mesure = $_POST['mesure'];
    $unite = $_POST['unite'];
    $etat = $_POST['etat'];
    Module::createModule(new Module(null, $nom, $type, $mesure, $unite, $etat));
    $nouveauModule = end($tableauModule);
    header('Location: index.php');
    exit;
}
?>




<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Affiche Module</title>
</head>

<body>


    <ul class="nav justify-content-end">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Active</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
    </ul>


    <table class="module-liste">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Type</th>
                <th scope="col">Mesure</th>
                <th scope="col">Unité</th>
                <th scope="col">Etat</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($lesModules as $module) : ?>
                <?php $monModule = new Module($module['id_module'], $module['nom'], $module['type'], $module['mesure'], $module['unite'], $module['etat']); ?>
                <tr>
                    <td scope="row"><?php echo $monModule->getId_module(); ?></td>
                    <td><?php echo $monModule->getNom(); ?></td>
                    <td><?php echo $monModule->getType(); ?></td>
                    <td><?php echo $monModule->getMesure(); ?></td>
                    <td><?php echo $monModule->getUnite(); ?></td>
                    <td><?php echo $monModule->getEtat(); ?></td>


                    <td><a href="modifier.php?id_module=<?php echo $monModule->getId_module(); ?>">
                            <i class="bi bi-pencil-square"></i> Modifier</a>
                    </td>

                    <td>
                        <a href="supprimer-module.php?id_module=<?php echo $monModule->getId_module(); ?>">
                            <i class="bi bi-pencil-square"></i> Supprimer</a>
                    </td>

                </tr>



            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">

            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Ajouter un Module
                </button>
            </h2>

            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <form method="post">

                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="type">Type :</label>
                        <input type="text" id="type" name="type" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="mesure">Mesure :</label>
                        <input type="text" id="mesure" name="mesure" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="unite">Unité :</label>
                        <select name="unite" id="unite-select" class="form-select">
                            <option value="" selected>--Please choose an option--</option>
                            <option value="celsius">Degres celsius</option>
                            <option value="farhenheit">Degres farhenheit</option>
                            <option value="km/h">Vitesse en Km/h</option>
                            <option value="miles/h">Vitesse en Miles/h</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="etat">État :</label>
                        <input type="text" id="etat" name="etat" class="form-control">
                    </div>

                    <input type="submit" value="Insérer" class="btn btn-primary">

                </form>

            </div>
        </div>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</html>