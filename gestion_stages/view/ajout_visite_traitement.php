<?php
$user = 'root';
$pass = "";
try {
$con = new PDO('mysql:host=localhost;dbname=gestion_stage', $user, $pass);;
} catch(Exeption $e) {
	die($e);
}

$date = $_POST['date_visite'];
$Observations = $_POST['Observations'];
$stage = $_POST['stage'];
$ref_peda = $_POST['ref_peda'];
var_dump($date);
var_dump($Observations);
$requete= $con->query('INSERT INTO visite (Date_visite,Observations_visite,Id_referent_peda,Id_stage)
 VALUES ("'.$date.'", "'.$Observations.'", "'.$ref_peda.'","'.$stage.'")');

?>