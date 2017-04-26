<?php
$user = 'root';
$pass = "";
try {
$con = new PDO('mysql:host=localhost;dbname=gestion_stage', $user, $pass);;
} catch(Exeption $e) {
	die($e);
}
$bac=$_GET['submit'];
var_dump($bac);



if(isset($bac)) { 

	$requete1= $con->query('DELETE FROM bac where type_bac = "'.$bac.'"');

	echo '<body onLoad="alert(\'Nice\')">';
	echo '<meta http-equiv="refresh" content="0;URL=type_bac.php">';
}
else {
	echo '<body onLoad="alert(\'Erreur\')">';
	echo '<meta http-equiv="refresh" content="0;URL=type_bac.php">';
} 
?>