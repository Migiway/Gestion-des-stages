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

if(isset($date)&&isset($Observations)&&isset($stage)&&isset($ref_peda)) { 

$requete= $con->query('SELECT Id_referent_peda from referent_pedagogique where Nom_referent_peda = "'.$ref_peda.'" ');
$donnees=$requete->fetch();
$Id_referent_peda=$donnees['Id_referent_peda'];


$requete= $con->query('INSERT INTO visite (Date_visite,Observations_visite,Id_referent_peda,Id_stage)
 VALUES ("'.$date.'", "'.$Observations.'", "'.$Id_referent_peda.'","'.$stage.'")');

	echo '<body onLoad="alert(\'La nouvelle viste à bien été ajoutée au stage !\')">';
	echo '<meta http-equiv="refresh" content="0;URL=stage.php">';
}
else {
	echo '<body onLoad="alert(\'Erreur\')">';
	echo '<meta http-equiv="refresh" content="0;URL=stage.php">';
} 
?>
