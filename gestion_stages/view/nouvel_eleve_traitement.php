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
$annee_obtention_bac=$_POST['annee_obtension_bac'];
$bac=$_POST['bac'];


var_dump($nom);
var_dump($telephone);
var_dump($adresse);
var_dump($prenom);
var_dump($email);
var_dump($annee_obtention_bac);
var_dump($bac);

if(isset($nom) && isset($telephone) && isset($adresse)&& isset($prenom) && isset($email) && isset($annee_obtention_bac) && isset($bac) ) { 

	$requete0= $con->query('SELECT Id_bac FROM bac Where type_bac = "'.$bac.'"');
	$donnees0=$requete0->fetch();
	$type_bac=$donnees0['Id_bac'];
	var_dump($type_bac);

	$requete1= $con->query('INSERT INTO etudiant (Nom_etudiant,Prenom_etudiant,annee_obtention_bac,adresse_etudiant,email_etudiant,telephone_etudiant,Id_bac)
 VALUES ("'.$nom.'", "'.$prenom.'", "'.$annee_obtention_bac.'", "'.$adresse.'", "'.$email.'", "'.$telephone.'", "'.$type_bac.'")');

	echo '<body onLoad="alert(\'Nice\')">';
	echo '<meta http-equiv="refresh" content="0;URL=suivi_scolarite.php">';
}
else {
	echo '<body onLoad="alert(\'Erreur\')">';
	echo '<meta http-equiv="refresh" content="0;URL=nouvelle_classe_eleve.php">';
} 
?>