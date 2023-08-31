<?php 
include ('module.php');
$bdd = new PDO('mysql:dbname=testwebreathe;host=localhost','root','');
if(isset($_GET['id'])){
    $module = Module::getModuleById($_GET['id_module']);
    if($module){
        //Vérifie que le formulare a été soumis
        $module->deleteModule();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression</title>
</head>
<body>
    <h1> Suppression de <?php echo $module->getNom(); ?> </h1>
    <a href="affiche-module.php">Retour à la liste des modules</a>


</body>
</html>