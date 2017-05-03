<?php include 'includes/header.php' ?>
<div class="container_stage">
	<div class="box_menu_accordeon">
		<?php include 'includes/menu_gauche.php' ?>
	</div>
	<div class="contenue_stage_acc">
		<div class="titre_principal">
			Entreprises
		</div>
		<div class="titre_secondaire">
			Ajouter un référent professionnel :
		</div>
		<div class="form_entreprise_update">
			<form method="post" action="traitement_referent_pro.php">
					<label class="label_visite_form">Nom du référent :</label>
					<input type="text" name="nom_referent" class="input_visite_form">
					<br>
					<br>
					<?php
							$query01 = $con->prepare('SELECT nom_fonction FROM fonction_ref_pro');
							$query01->execute();
					?>
					<label class="label_visite_form">Fonction :</label>
					<select name="fonction_referent_professionnel">
							<?php while ( $results = $query01->fetch()){ ?>
							<option value="<?php echo ($results['nom_fonction']); ?>" >
								<?php echo($results ['nom_fonction']); ?>
								<?php } $query01->closeCursor(); ?>
							</option> 
					</select>
					<br>
					<br>
					<div class="submit"><input type="submit" value="   Valider   "></div>
			</form>
		</div>
	</div>
</div>
<?php include 'includes/footer.php' ?>