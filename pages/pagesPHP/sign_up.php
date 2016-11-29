<?php
$nom = $_POST['username'];
$email = $_POST['email'];
$adresse = $_POST['address'];
$phone = $_POST['phone'];
$specialty = $_POST['specialty'];
$password = $_POST['userpw'];
try {
  //$bdd = new PDO('mysql:host=sql2.olympe.in;dbname=3pcqjpfr', '3pcqjpfr', 'Selmi11895480');
  $bdd = new PDO('mysql:host=localhost;dbname=ehealth', 'root', '');
} catch (Exception $ex) {
    echo 'erreur';
}
$reponse = $bdd->query('SELECT * FROM inscription WHERE email=\'' . $email . '\'') or die(print_r($bdd->errorInfo()));
if ($reponse->fetch() == NULL) {
    $bdd->exec('insert into inscription values (\'' . $nom . '\',\'' . $email . '\',\'' . $adresse . '\',\'' . $phone . '\',\'' . $specialty . '\',\'' . $password . '\')') or die(print_r($bdd->errorInfo()));
    echo "<script> alert(\"Inscription enregistree avec succes\")</script>";
    session_start();
    $_SESSION['nom'] = $nom;
    $_SESSION['email'] = $email;
    $_SESSION['tel'] = $phone;
    $_SESSION['adresse'] = $adresse;
    $_SESSION['specialite'] = $specialty;
    header("Refresh:0;url=../mespatients.php");
} else {
    echo "<script> alert(\"ERREUR\")</script>";
    header("url=../index.html");
}
$reponse->closeCursor();
?>

