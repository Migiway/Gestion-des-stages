<?php
$user = 'root';
$pass = "";
try {
$con = new PDO('mysql:host=localhost;dbname=gestion_stage', $user, $pass);;
} catch(Exeption $e) {
	die($e);
}
$designation = $_POST['designation'];
$classe = $_POST['nom_classe'];

if(isset($classe) && isset($designation) ) {
	$requete0= $con->query('INSERT INTO classe (Nom_classe,designation_classe)
 VALUES ("'.$classe.'", "'.$designation.'")');
	echo '<body onLoad="alert(\'La nouvelle classe à bien été ajoutée !\')">';
	echo '<meta http-equiv="refresh" content="0;URL=suivi_scolarite.php">';
}
else {
	echo '<body onLoad="alert(\'Erreur\')">';
	echo '<meta http-equiv="refresh" content="0;URL=nouvelle_classe.php">';
}

/*
$requete2= $con->query('INSERT INTO annee (Id_annee,Annee)
 VALUES ("'.$annee.'", "'.$annee.'")')

$requete3= $con->query('INSERT INTO appartient (Id_classe,Id_annee)
 VALUES ("'.$Id_classe.'", "'.$annee.'")')
*/
?>