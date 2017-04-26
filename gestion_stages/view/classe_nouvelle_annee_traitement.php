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
$new = $_POST['new'];

var_dump($classe);
var_dump($annee);
var_dump($new);
$requete=$con->query('SELECT Id_classe from classe where Nom_classe = "'.$classe.'"');
$donnees=$requete->fetch();
$Id_classe = $donnees['Id_classe'];
var_dump($Id_classe);


if(empty($new) && isset($annee)) {
	$requete0= $con->query('INSERT INTO annee (Id_annee,Annee)
 VALUES ("'.$annee.'", "'.$annee.'")');

	$requete2= $con->query('INSERT INTO appartient (Id_classe, Id_annee)
 VALUES ("'.$Id_classe.'","'.$annee.'")');

}
elseif (empty($annee)&&isset($new)) {
	$requete3= $con->query('INSERT INTO annee (Id_annee,Annee)
 VALUES ("'.$new.'", "'.$new.'")');

	$requete4= $con->query('INSERT INTO appartient (Id_classe,Id_annee)
 VALUES ("'.$Id_classe.'", "'.$new.'")');

	echo '<body onLoad="alert(\'Nice\')">';
	echo '<meta http-equiv="refresh" content="0;URL=suivi_scolarite.php">';

}
else {
	echo '<body onLoad="alert(\'Erreur\')">';
	echo '<meta http-equiv="refresh" content="0;URL=suivi_scolarite.php">';
}

/*
$requete2= $con->query('INSERT INTO annee (Id_annee,Annee)
 VALUES ("'.$annee.'", "'.$annee.'")')

$requete3= $con->query('INSERT INTO appartient (Id_classe,Id_annee)
 VALUES ("'.$Id_classe.'", "'.$annee.'")')
*/
?>