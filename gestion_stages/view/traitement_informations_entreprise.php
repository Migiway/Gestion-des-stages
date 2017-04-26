<?php
$nom_entreprise = $_POST['nom_entreprise'];
$type_entreprise = $_POST['type_entreprise'];
$ca_entreprise = $_POST['ca_entreprise'];
$adresse_entreprise = $_POST['adresse_entreprise'];
$tel_entreprise = $_POST['tel_entreprise'];
$resp_technique = $_POST['resp_technique'];
$nouveau_type_entreprise = $_POST['nouveau_type_entreprise'];
$nouveau_resp_tech = $_POST['nouveau_resp_tech'];
$nom_originale =^$_POST['nom_originale'];

if ( isset($nouveau_type_entreprise))
{
	if ( isset($nouveau_type_entreprise) && isset($nouveau_resp_tech))
	{
		$requete00= $con->query('UPDATE entreprise SET type_entreprise = "'.$nouveau_type_entreprise.'", nom_entreprise = "'.$nom_entreprise.'", chiffre_affaires = "'.$ca_entreprise.'", adresse_entreprise = "'.$adresse_entreprise.'", telephone_entreprise = "'.$tel_entreprise.'", resp_tech = "'.$nouveau_resp_tech.'" WHERE nom_entreprise = "'.$nom_originale.'"  ');

	}
	else
	{
		$requete01= $con->query('UPDATE entreprise SET type_entreprise = "'.$nouveau_type_entreprise.'", nom_entreprise = "'.$nom_entreprise.'", chiffre_affaires = "'.$ca_entreprise.'", adresse_entreprise = "'.$adresse_entreprise.'", telephone_entreprise = "'.$tel_entreprise.'", resp_tech = "'.$resp_technique.'" WHERE nom_entreprise = "'.$nom_originale.'" ');
	}
}
else
{
	if ( isset($nouveau_resp_tech))
	{
		$requete02= $con->query('UPDATE entreprise SET type_entreprise = "'.$type_entreprise.'", nom_entreprise = "'.$nom_entreprise.'", chiffre_affaires = "'.$ca_entreprise.'", adresse_entreprise = "'.$adresse_entreprise.'", telephone_entreprise = "'.$tel_entreprise.'", resp_tech = "'.$nouveau_resp_tech.'" WHERE nom_entreprise = "'.$nom_originale.'" ');
	}
	else
	{
		$requete03= $con->query('UPDATE entreprise SET type_entreprise = "'.$type_entreprise.'", nom_entreprise = "'.$nom_entreprise.'", chiffre_affaires = "'.$ca_entreprise.'", adresse_entreprise = "'.$adresse_entreprise.'", telephone_entreprise = "'.$tel_entreprise.'", resp_tech = "'.$resp_technique.'" WHERE nom_entreprise = "'.$nom_originale.'" ');
	}
}
echo '<meta http-equiv="refresh" content="0;URL=informations_entreprise.php">';















?>