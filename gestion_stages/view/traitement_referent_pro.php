<?php
$user = 'root';
$pass = "";
try {
$con = new PDO('mysql:host=localhost;dbname=gestion_stage', $user, $pass);;
} catch(Exeption $e) {
	die($e);
}

$nom_referent = $_POST['nom_referent'];
$fonction_referent = $_POST['fonction_referent_professionnel'];



if (empty($nom_referent))
{
	$message = "Erreur de saisie du formulaire, veuillez recommencer.";
	echo '<body onLoad=\'alert("'.$message.'")\'>';
	echo '<meta http-equiv="refresh" content="0;URL=referents_professionnels.php">';
}
else
{
	if ( isset($nom_referent) && isset($fonction_referent) )
	{
		$query00 = $con->query('SELECT Id_fonction FROM fonction_ref_pro Where nom_fonction = "'.$fonction_referent.'"');
		$result0 = $query00->fetch();
		$Id_fonction= $result0['Id_fonction'];
		
		$query01 = $con->prepare('INSERT INTO referent_professionnel(Nom_referent_pro,Id_fonction) VALUES("'.$nom_referent.'",'.$Id_fonction.')');
		$result = $query01->execute();
		echo '<body onLoad="alert(\'Le nouveau référent professionnel à bien été ajouté\')">';
		echo '<meta http-equiv="refresh" content="0;URL=referents_professionnels.php">'; 
	}
	
}























?>