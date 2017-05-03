<?php
$user = 'root';
$pass = "";
try {
$con = new PDO('mysql:host=localhost;dbname=gestion_stage', $user, $pass);;
} catch(Exeption $e) {
	die($e);
}
$nom_entreprise = $_POST['nom_entreprise'];
$ref_peda = $_POST['referent_pedagogique'];
$ref_pro = $_POST['referent_pro'];
$annee = $_POST['annee'];
$date_debut = $_POST['date_debut'];
$new_ref_peda = $_POST['nouveau_referent_peda'];
$new_ref_pro = $_POST['nouveau_referent_pro'];
$new_annee = $_POST['nouvelle_annee'];
$date_fin = $_POST['date_fin'];
$nom_etudiant = $_POST['nom_etudiant'];
$query00 = $con->query('SELECT Id_etudiant FROM etudiant WHERE nom_etudiant = "'.$nom_etudiant.'"');
		$donnees00 = $query00->fetch();
		$id_etudiant = $donnees00['Id_etudiant'];





if (empty($new_nom_entreprise) )
{
	if(empty($new_nom_entreprise) && empty($new_ref_peda))
	{
		if(empty($new_nom_entreprise)&&empty($new_ref_peda)&&empty($new_ref_pro))
		{
			if(empty($new_nom_entreprise)&&empty($new_ref_peda)&&empty($new_ref_pro)&&empty($new_annee))
			{
				$query01 = $con->query('SELECT Id_entreprise FROM entreprise WHERE nom_entreprise = "'.$nom_entreprise.'"');
				$donnees01 = $query01->fetch();
				$id_entreprise = $donnees01['Id_entreprise']; 
				$query02 = $con->query('SELECT Id_referent_peda FROM referent_pedagogique WHERE nom_referent_peda = "'.$ref_peda.'"');
				$donnees02 = $query02->fetch();
				$id_ref_peda = $donnees02['Id_referent_peda'];
				$query03 = $con->query('SELECT Id_referent_pro FROM referent_professionnel WHERE nom_referent_pro = "'.$ref_pro.'"');
				$donnees03 = $query03->fetch();
				$id_ref_pro = $donnees03['Id_referent_pro'];
				$query04 = $con->query('SELECT Id_annee FROM annee WHERE Annee = '.$annee.'');
				$donnees04 = $query04->fetch();
				$id_annee = $donnees04['Id_annee'];
				echo "test";
				$query05 = $con->prepare('INSERT INTO stage(date_debut_stage,date_fin_stage,Id_entreprise,Id_etudiant,Id_referent_peda,Id_referent_pro,Id_annee) VALUES("'.$date_debut.'","'.$date_fin.'", "'.$id_entreprise.'","'.$id_etudiant.'","'.$id_ref_peda.'","'.$id_ref_pro.'",'.$id_annee.')');
				$query05->execute();
			}
			else
			{
				$query01 = $con->query('SELECT Id_entreprise FROM entreprise WHERE nom_entreprise = "'.$nom_entreprise.'"');
				$donnees01 = $query01->fetch();
				$id_entreprise = $donnees01['Id_entreprise']; 
				$query02 = $con->query('SELECT Id_referent_peda FROM referent_pedagogique WHERE nom_referent_peda = "'.$ref_peda.'"');
				$donnees02 = $query02->fetch();
				$id_ref_peda = $donnees02['Id_referent_peda'];
				$query03 = $con->query('SELECT Id_referent_pro FROM referent_professionnel WHERE nom_referent_pro = "'.$ref_pro.'"');
				$donnees03 = $query03->fetch();
				$id_ref_pro = $donnees03['Id_referent_pro'];
				$query06 = $con->prepare('INSERT INTO annee(id_annee,Annee)VALUES('.$new_annee.','.$new_annee.')');
				$query06->execute();
				$query_new_year = $con->prepare('SELECT id_annee FROM annee WHERE Annee = '.$new_annee.'');
				$query_new_year->execute();
				$donnee_new_year = $query_new_year->fetch();
				$id_new_annee = $donnee_new_year['id_annee'];
				$query07 = $con->prepare('INSERT INTO stage(date_debut_stage,date_fin_stage,Id_entreprise,Id_etudiant,Id_referent_peda,Id_referent_pro,Id_annee) VALUES("'.$date_debut.'","'.$date_fin.'", "'.$id_entreprise.'","'.$id_etudiant.'","'.$id_ref_peda.'","'.$id_ref_pro.'",'.$id_new_annee.')');
					$query07->execute();
			}
		}
		else
		{
			$query01 = $con->query('SELECT Id_entreprise FROM entreprise WHERE nom_entreprise = "'.$nom_entreprise.'"');
			$donnees01 = $query01->fetch();
			$id_entreprise = $donnees01['Id_entreprise']; 
			$query02 = $con->query('SELECT Id_referent_peda FROM referent_pedagogique WHERE nom_referent_peda = "'.$ref_peda.'"');
			$donnees02 = $query02->fetch();
			$id_ref_peda = $donnees02['Id_referent_peda'];
			$query06 = $con->prepare('INSERT INTO annee(id_annee,Annee)VALUES('.$new_annee.','.$new_annee.')');
				$query06->execute();
				$query_new_year = $con->prepare('SELECT id_annee FROM annee WHERE Annee = '.$new_annee.'');
				$query_new_year->execute();
				$donnee_new_year = $query_new_year->fetch();
				$id_new_annee = $donnee_new_year['id_annee'];
			$query015 = $con->prepare('INSERT INTO referent_professionnel(nom_referent_pro,id_fonction)VALUES("'.$new_ref_pro.'",6)');
				$query015->execute();
				$query_new_ref_pro = $con->prepare('SELECT id_referent_pro FROM referent_professionnel WHERE nom_referent_pro = "'.$new_ref_pro.'"');
				$query_new_ref_pro->execute();
				$donnee_new_ref_pro = $query_new_ref_pro->fetch();
				$id_new_ref_pro = $donnee_new_ref_pro['id_referent_pro'];
			$query10 = $con->prepare('INSERT INTO stage(date_debut_stage,date_fin_stage,Id_entreprise,Id_etudiant,Id_referent_peda,Id_referent_pro,Id_annee) VALUES("'.$date_debut.'","'.$date_fin.'", "'.$id_entreprise.'","'.$id_etudiant.'","'.$id_ref_peda.'","'.$id_new_ref_pro.'",'.$id_new_annee.')');
				$query10->execute();
		}
	}
	else
	{
		$query01 = $con->query('SELECT Id_entreprise FROM entreprise WHERE nom_entreprise = "'.$nom_entreprise.'"');
			$donnees01 = $query01->fetch();
			$id_entreprise = $donnees01['Id_entreprise'];
			$query06 = $con->prepare('INSERT INTO annee(id_annee,Annee)VALUES('.$new_annee.','.$new_annee.')');
				$query06->execute();
				$query_new_year = $con->prepare('SELECT id_annee FROM annee WHERE Annee = '.$new_annee.'');
				$query_new_year->execute();
				$donnee_new_year = $query_new_year->fetch();
				$id_new_annee = $donnee_new_year['id_annee'];
			$query015 = $con->prepare('INSERT INTO referent_professionnel(nom_referent_pro,id_fonction)VALUES("'.$new_ref_pro.'",6)');
				$query015->execute();
				$query_new_ref_pro = $con->prepare('SELECT id_referent_pro FROM referent_professionnel WHERE nom_referent_pro = "'.$new_ref_pro.'"');
				$query_new_ref_pro->execute();
				$donnee_new_ref_pro = $query_new_ref_pro->fetch();
				$id_new_ref_pro = $donnee_new_ref_pro['id_referent_pro'];
				$query016 = $con->prepare('INSERT INTO referent_pedagogique(nom_referent_peda)VALUES("'.$new_ref_peda.'")');
				$query016->execute();
				$query_new_ref_peda = $con->prepare('SELECT id_referent_peda FROM referent_pedagogique WHERE nom_referent_peda = "'.$new_ref_peda.'"');
				$query_new_ref_peda->execute();
				$donnee_new_ref_peda = $query_new_ref_peda->fetch();
				$id_new_ref_peda = $donnee_new_ref_peda['id_referent_peda'];
			$query10 = $con->prepare('INSERT INTO stage(date_debut_stage,date_fin_stage,Id_entreprise,Id_etudiant,Id_referent_peda,Id_referent_pro,Id_annee) VALUES("'.$date_debut.'","'.$date_fin.'", "'.$id_entreprise.'","'.$id_etudiant.'","'.$id_new_ref_peda.'","'.$id_new_ref_pro.'",'.$id_new_annee.')');
				$query10->execute();
	}	
}
	echo '<body onLoad="alert(\'Le stage a bien été ajouté à la base de donnée\')">';
	echo '<meta http-equiv="refresh" content="0;URL=ensemble_stages.php">';



?>