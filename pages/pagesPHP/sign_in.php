<?php

$email = $_POST['email'];
$mdp = $_POST['mdp'];
try {
    //$bdd = new PDO('mysql:host=sql2.olympe.in;dbname=3pcqjpfr', '3pcqjpfr', 'Selmi11895480');
    $bdd = new PDO('mysql:host=localhost;dbname=ehealth', 'root', '');
} catch (Exception $ex) {
    echo 'erreur';
}
$reponse = $bdd->query('SELECT * FROM inscription WHERE email=\'' . $email . '\' and motdepasse=\'' . $mdp . '\'') or die(print_r($bdd->errorInfo()));
$donnee = $reponse->fetch();
if ($donnee == NULL) {
    header("Refresh:0;url=../index.php?error=1");
} else {
    session_start();
    $_SESSION['nom'] = $donnee['nom_prenom']; 
    $_SESSION['email'] = $email;
    $_SESSION['tel'] = $donnee['telephone'];
    $_SESSION['adresse'] = $donnee['adresse'];
    $_SESSION['specialite'] = $donnee['specialite'];
    header("Refresh:0;url=../mespatients.php");
}
$reponse->closeCursor();
?>

