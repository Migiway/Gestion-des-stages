<?php include 'includes/header.php' ?>
<div class="container_stage">
	<div class="box_menu_accordeon">
		<?php include 'includes/menu_gauche.php' ?>
	</div>
	<div class="contenue_stage_acc">
		<div class="titre_principal">
			Entreprises
		</div>
		<div class="content">
			<div class="left_content_entreprise">
				<div class="titre_tertiaire">
				Rechercher une entreprise
				</div>
				<?php
					$query = $con->prepare('SELECT nom_entreprise FROM entreprise');
					$query->execute();
				?>
				<form method="get" action="informations_entreprise.php" class="form_entreprise">
				<label class="label_visite_form">Non de l'entreprise :</label>
				<select name="entreprise">
				    
				<?php while ( $results = $query->fetch()){ ?>
				<option value="<?php echo ($results['nom_entreprise']); ?>" >
					<?php echo($results ['nom_entreprise']); ?>
					<?php } $query->closeCursor(); ?>
				</option> 
				</select>
				<br>
				<br>
				<div class="submit"><input type="submit" value="Rechercher"></div>

				</form>
			</div>
			<div class="right_content">
				<div class="titre_tertiaire">
				Nouvelle entreprise
				</div>
				<form method="post" action="traitement_entreprise.php">
				<label class="label_visite_form">Non de l'entreprise :</label>
				<input type="text" name="nom_entreprise" class="input_visite_form">
				<br>
				<br>
				<label class="label_visite_form">chiffre d'affaire :</label>
				<input type="text" name="ca_entreprise" class="input_visite_form">
				<br>
				<br>
				<label class="label_visite_form">adresse postale :</label>
				<input type="text" name="adresse_entreprise" class="input_visite_form">
				<br>
				<br>
				<div class="submit"><input type="submit" value="Ajouter"></div>

				</form>
			</div>
		</div>
	</div>
</div>
<?php include 'includes/footer.php' ?>