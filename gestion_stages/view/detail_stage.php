<?php
$nom = $_GET['etudiant'];
$classe = $_GET['classe'];
$annee = $_GET['annee'];
$entreprise = $_GET['entreprise'];
$ref_pro = $_GET['ref_pro'];
$ref_peda = $_GET['ref_peda'];
?>
<?php include 'includes/header.php' ?>
<?php $requete= $con->query('SELECT Id_stage FROM stage,entreprise,etudiant,referent_pedagogique,referent_professionnel,annee where stage.Id_annee = annee.Id_annee and stage.Id_entreprise = entreprise.Id_entreprise and stage.Id_referent_pro = referent_professionnel.Id_referent_pro and stage.Id_referent_peda = referent_pedagogique.Id_referent_peda and Nom_etudiant= "'.$nom.'" and Nom_entreprise = "'.$entreprise.'" and Annee = "'.$annee.'" and Nom_referent_peda = "'.$ref_peda.'" and Nom_referent_pro = "'.$ref_pro.'"');
	$donnees=$requete->fetch();
	$stage=$donnees['Id_stage'];
	?>

<div class="container_stage">
	<div class="box_menu_accordeon">
		<?php include 'includes/menu_gauche.php' ?>
	</div>
	<div class="contenue_stage_acc">
			<div class="titre_principal">
			<?php echo $nom ?> - <?php echo $classe ?>
			</div>
			<div id=resume>
				<div id=resume0>
					<p>Entreprise</p>
					<p>Resp.technique</p>
					<p>Resp.pédagogique</p>
					<p>Année concernée</p>
				</div>
				<div id=resume1>
					<p><?php echo $entreprise ?></p>
					<p><?php echo $ref_pro ?></p>
					<p><?php echo $ref_peda ?></p>
					<p><?php echo $annee ?></p>
				</div>
			</div>
			<div class="titre_secondaire">
			Vistes liées au stage
			</div>
			<div class="btn_ajout">
			<form method="get" action="ajout_visite.php">
			<input type="submit" value="Nouvelle visite"/>
			<input type="hidden" name="etudiant" value="<?php echo $nom ?>">
			<input type="hidden" name="classe" value="<?php echo $classe ?>">
			<input type="hidden" name="stage" value="<?php echo $stage ?>">
			<input type="hidden" name="ref_peda" value="<?php echo $ref_peda ?>">
			</form>
			</div>
			<div class="visites">
			<?php 
			$requete= $con->query( 'SELECT Date_visite, Observations_visite, Nom_etudiant FROM visite, stage, etudiant, referent_pedagogique where visite.Id_stage = stage.Id_stage and etudiant.Id_etudiant = stage.Id_etudiant and referent_pedagogique.Id_referent_peda = visite.Id_referent_peda and stage.Id_stage = "'.$stage.'"'); ?>
			<?php  while($donnees=$requete->fetch()) { ?>
			Date de la visite <?php echo ($donnees['Date_visite']); ?>
			<br>
			<br>
			Observations:
			<p>
			<?php echo ($donnees['Observations_visite']); ?>
			</p>
			<br>
			<br>
			<?php } ?>
			</div>
	</div>
</div>
<?php include 'includes/footer.php' ?>