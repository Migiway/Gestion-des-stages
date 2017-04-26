<?php
$user = 'root';
$pass = "";
try {
$con = new PDO('mysql:host=localhost;dbname=gestion_stage', $user, $pass);;
} catch(Exeption $e) {
	die($e);
}
$annee=$_GET['submit'];
var_dump($annee);



if(isset($annee)) { 

	$requete1= $con->query('DELETE FROM annee where Annee = "'.$annee.'"');

	echo '<body onLoad="alert(\'Nice\')">';
	echo '<meta http-equiv="refresh" content="0;URL=annees_scolaires.php">';
}
else {
	echo '<body onLoad="alert(\'Erreur\')">';
	echo '<meta http-equiv="refresh" content="0;URL=annees_scolaires.php">';
} 
?>