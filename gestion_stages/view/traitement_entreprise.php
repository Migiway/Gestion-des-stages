<?php
$user = 'root';
$pass = "";
try {
$con = new PDO('mysql:host=localhost;dbname=gestion_stage', $user, $pass);;
} catch(Exeption $e) {
	die($e);
}

$nom_entreprise = $_POST['nom_entreprise'];
$ca_entreprise = $_POST['ca_entreprise'];
$adresse_entreprise = $_POST['adresse_entreprise'];
var_dump($nom_entreprise);
var_dump($ca_entreprise);
var_dump($adresse_entreprise);

if ( isset($nom_entreprise) && isset($ca_entreprise) && isset($adresse_entreprise) )
{

	$requete1= $con->query('INSERT INTO entreprise (Nom_entreprise,chiffre_affaires,adresse_entreprise)
 	VALUES ("'.$nom_entreprise.'", "'.$ca_entreprise.'", "'.$adresse_entreprise.'")');
	echo '<meta http-equiv="refresh" content="0;URL=entreprises.php">';
}
else
{
	echo '<body onLoad="alert(\'Le formulaire est incorrect, veuillez recommencer ! \')">';
	echo '<meta http-equiv="refresh" content="0;URL=entreprises.php">';
}