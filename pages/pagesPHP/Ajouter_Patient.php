<?php
session_start();
$nom=$_POST['username'];
$prenom=$_POST['prenom'];
$phone=$_POST['phone'];
$cin=$_POST['CIN'];
$dateArray = explode('/', $_POST['dateNaissance']);
$date = $dateArray[2].'-'.$dateArray[1].'-'.$dateArray[0];
$adresse=$_POST['address'];
$info = $_POST['info'];
$email_med = $_SESSION['email'];
try {
  //$bdd = new PDO('mysql:host=sql2.olympe.in;dbname=3pcqjpfr', '3pcqjpfr', 'Selmi11895480');
  $bdd = new PDO('mysql:host=localhost;dbname=ehealth', 'root', '');
} catch (Exception $ex) {
    echo 'erreur';
}
$reponse = $bdd->query('SELECT * FROM patients WHERE cin=\'' . $cin . '\'') or die(print_r($bdd->errorInfo()));
if ($reponse->fetch() == NULL) {
    $bdd->exec('insert into patients  values (\'' . $nom . '\',\'' . $prenom . '\',\'' . $phone . '\',\'' . $cin . '\',\'' . $date . '\',\'' . $adresse . '\',\'' . $info . '\',\'' . $email_med . '\')') or die(print_r($bdd->errorInfo()));
    echo "<script> alert(\"Inscription enregistree avec succes\")</script>";
    header("Refresh:0;url=../mespatients.php");
} else {
    echo "<script> alert(\"ERREUR\")</script>";
    header("Refresh:0;url=../mespatients.php");
}
$reponse->closeCursor();
?>

