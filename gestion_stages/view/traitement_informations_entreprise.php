<?php
$user = 'root';
$pass = "";
try {
$con = new PDO('mysql:host=localhost;dbname=gestion_stage', $user, $pass);;
} catch(Exeption $e) {
	die($e);
}

$nom_entreprise = $_POST['nom_entreprise'];
$type_entreprise = $_POST['type_entreprise'];
$ca_entreprise = $_POST['ca_entreprise'];
$adresse_entreprise = $_POST['adresse_entreprise'];
$tel_entreprise = $_POST['tel_entreprise'];
$resp_technique = $_POST['resp_technique'];
$nouveau_type_entreprise = $_POST['nouveau_type_entreprise'];
$nouveau_resp_tech = $_POST['nouveau_resp_tech'];
$Id_entreprise = $_POST['id_entreprise'];



if ( empty($type_entreprise))
{

	if ( empty($type_entreprise) && empty($resp_technique))
	{
		$requete00= $con->query('UPDATE entreprise SET type_entreprise = "'.$nouveau_type_entreprise.'", Nom_entreprise = "'.$nom_entreprise.'", chiffre_affaires = "'.$ca_entreprise.'", adresse_entreprise = "'.$adresse_entreprise.'", telephone_entreprise = "'.$tel_entreprise.'", Nom_ref_pro = "'.$nouveau_resp_tech.'" WHERE Id_entreprise= "'.$Id_entreprise.'"');

	}
	else
	{
		$requete01= $con->query('UPDATE entreprise SET type_entreprise = "'.$nouveau_type_entreprise.'", Nom_entreprise = "'.$nom_entreprise.'", chiffre_affaires = "'.$ca_entreprise.'", adresse_entreprise = "'.$adresse_entreprise.'", telephone_entreprise = "'.$tel_entreprise.'", Nom_ref_pro = "'.$resp_technique.'" WHERE Id_entreprise= "'.$Id_entreprise.'"  ');
	}
}
else
{
	if ( empty($resp_technique))
	{
		$requete02= $con->query('UPDATE entreprise SET type_entreprise = "'.$type_entreprise.'", Nom_entreprise = "'.$nom_entreprise.'", chiffre_affaires = "'.$ca_entreprise.'", adresse_entreprise = "'.$adresse_entreprise.'", telephone_entreprise = "'.$tel_entreprise.'", Nom_ref_pro = "'.$nouveau_resp_tech.'" WHERE Id_entreprise= "'.$Id_entreprise.'"  ');
	}
	else
	{
		$requete03= $con->query('UPDATE entreprise SET type_entreprise = "'.$type_entreprise.'", Nom_entreprise = "'.$nom_entreprise.'", chiffre_affaires = "'.$ca_entreprise.'", adresse_entreprise = "'.$adresse_entreprise.'", telephone_entreprise = "'.$tel_entreprise.'", Nom_ref_pro = "'.$resp_technique.'" WHERE Id_entreprise= "'.$Id_entreprise.'" ');
	}
}
echo '<meta http-equiv="refresh" content="0;URL=entreprises.php">';














?>