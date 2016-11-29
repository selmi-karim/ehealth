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
$ancienCIN = $_SESSION['cin'];
try {
  //$bdd = new PDO('mysql:host=sql2.olympe.in;dbname=3pcqjpfr', '3pcqjpfr', 'Selmi11895480');
  $bdd = new PDO('mysql:host=localhost;dbname=ehealth', 'root', '');
} catch (Exception $ex) {
    echo 'erreur';
}
$sql = "UPDATE patients SET nom = '$nom', prenom = '$prenom', tel ='$phone', cin='$cin', date_de_naissance = '$date', adresse='$adresse', autre_infos='$info', email_med='$email_med'   where cin ='$ancienCIN'"; 
$bdd->exec($sql);
header("Refresh:0;url=../mespatients.php");
?>
