<?php
$user = 'root';
$pass = "";
try {
$con = new PDO('mysql:host=localhost;dbname=gestion_stage', $user, $pass);;
} catch(Exeption $e) {
	die($e);
}
$classe = $_POST['classe'];
$annee = $_POST['Annee'];
$etudiant = $_POST['etudiant'];

var_dump($classe);
var_dump($annee);
var_dump($etudiant);

if(isset($classe) && isset($annee) && isset($etudiant) ) { 
	$requete0=$con->query('SELECT Id_etudiant FROM etudiant where Nom_etudiant = "'.$etudiant.'"');
	$donnees0=$requete0->fetch();
	$Id_etudiant=$donnees0['Id_etudiant'];
	var_dump($Id_etudiant);

	$requete1= $con->query('SELECT Id_classe FROM classe where Nom_classe = "'.$classe.'"');
	$donnees1=$requete1->fetch();
	$Id_classe=$donnees1['Id_classe'];
	var_dump($Id_classe);

	$requete2= $con->query('INSERT INTO appartient (Id_etudiant,Id_classe,Id_annee)
 VALUES ("'.$Id_etudiant.'", "'.$Id_classe.'", "'.$annee.'")');

	echo '<body onLoad="alert(\'Nice\')">';
	echo '<meta http-equiv="refresh" content="0;URL=suivi_scolarite.php">';
}
else {
	echo '<body onLoad="alert(\'Erreur\')">';
	echo '<meta http-equiv="refresh" content="0;URL=suivi_scolarite.php">';
} 
?>