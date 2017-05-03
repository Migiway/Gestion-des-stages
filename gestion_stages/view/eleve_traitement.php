<?php
$user = 'root';
$pass = "";
try {
$con = new PDO('mysql:host=localhost;dbname=gestion_stage', $user, $pass);;
} catch(Exeption $e) {
	die($e);
}
$nom =$_POST['nom'];
$telephone=$_POST['telephone'];
$adresse=$_POST['adresse'];
$prenom=$_POST['prenom'];
$email=$_POST['email'];
$annee_obtention_bac=$_POST['annee_obtention_bac'];
$bac=$_POST['bac'];
$Id_nom=$_POST['Id_etudiant'];


var_dump($nom);
var_dump($telephone);
var_dump($adresse);
var_dump($prenom);
var_dump($email);
var_dump($annee_obtention_bac);
var_dump($bac);
var_dump($Id_nom);

if(isset($nom) && isset($telephone) && isset($adresse)&& isset($prenom) && isset($email) && isset($annee_obtention_bac) && isset($bac) ) { 

	$requete0= $con->query('SELECT Id_bac FROM bac Where type_bac = "'.$bac.'"');
	$donnees0=$requete0->fetch();
	$type_bac=$donnees0['Id_bac'];
	var_dump($type_bac);


	$requete1= $con->query('UPDATE etudiant SET Nom_etudiant= "'.$nom.'", Prenom_etudiant= "'.$prenom.'", annee_obtention_bac= "'.$annee_obtention_bac.'", adresse_etudiant = "'.$adresse.'", email_etudiant= "'.$email.'", telephone_etudiant="'.$telephone.'", Id_bac= '.$type_bac.' WHERE Id_etudiant = '.$Id_nom.'');

	echo '<body onLoad="alert(\'Nice\')">';
	echo '<meta http-equiv="refresh" content="0;URL=suivi_scolarite.php">'; 
}
else {
	echo '<body onLoad="alert(\'Erreur\')">';
	echo '<meta http-equiv="refresh" content="0;URL=suivi_scolarite.php">'; 
} 
?>

