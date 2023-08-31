<?php
include('module.php');

$bdd = new PDO('mysql:dbname=testwebreathe;host=localhost','root','');
$queryRecupModule = $bdd->query("SELECT * FROM module");
$lesModules = $queryRecupModule->fetchAll();

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
            <?php foreach ($lesModules as $unModule) : ?>
                <?php $mod = new Module($unModule['id_module'], $unModule['nom'], $unModule['type'], $unModule['mesure'],$unModule['unite'],$unModule['etat']); ?>
                <tr>
                    <td scope="row"><?php echo $mod->getId_module(); ?></td>
                    <td><?php echo $mod->getNom(); ?></td>
                    <td><?php echo $mod->getType(); ?></td>
                    <td><?php echo $mod->getMesure(); ?></td>
                    <td><?php echo $mod->getUnite(); ?></td>
                    <td><?php echo $mod->getEtat(); ?></td>

                    <td><a href="modifier-module.php?id_module=<?php echo $mod->getId_module(); ?>">
                        <i class="bi bi-pencil-square"></i> Modifier</a>
                    </td>

                    <td>
                        <a href="supprimer-module.php?id=<?php echo $mod->getId_module(); ?>">
                        <i class="bi bi-pencil-square"></i> Supprimer</a>
                    </td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>