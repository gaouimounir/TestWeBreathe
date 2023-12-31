<?php
include('module.php');
$bdd = new PDO('mysql:dbname=testwebreathe;host=localhost', 'root', '');
if (isset($_GET['id_module'])) {
    $module = Module::getModuleById($_GET['id_module']);
    if ($module) {
        //Vérifie que le formulare a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newNom = $_POST['nom'];
            $newType = $_POST['type'];
            $newMesure = $_POST['mesure'];
            $newUnite = $_POST['unite'];
            $newEtat = $_POST['etat'];
            Module::updateModule(new Module($_GET['id_module'], $newNom, $newType, $newMesure, $newUnite, $newEtat));
            header('Location: index.php');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <h1> Modification de <?php echo $module->getNom(); ?> </h1>

    <?php echo $module->getId_module(); ?>
    <?php echo $module->getNom(); ?>
    <?php echo $module->getType(); ?>
    <?php echo $module->getMesure(); ?>
    <?php echo $module->getUnite(); ?>
    <?php echo $module->getEtat(); ?>

    <form method="POST">
        <label for="nom">Nom : </label>
        <input type="text" id="nom" name="nom" value="<?php echo $module->getNom(); ?>">
        <br>


        <input type="submit" value="Modifier" id="modifier">


    </form>


</body>

</html>