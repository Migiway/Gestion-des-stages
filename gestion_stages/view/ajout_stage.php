<?php include 'includes/header.php' ?>
<div class="container_stage">
	<div class="box_menu_accordeon">
		<?php include 'includes/menu_gauche.php' ?>
	</div>
	<div class="contenue_stage_acc">
		<div class="titre_principal">
			<?php// $nom_etudiant = $_GET['etudiant'];
					//$classe_etudiant = $_GET['classe'];
					//echo($nom_etudiant);
					//echo($classe_etudiant);
			?>
			Sugoi
		</div>
		<br>
		<br>
		<br>
		<div class="titre_secondaire">
			Informations de l'entreprise
		</div>
		<div class="form_entreprise_update">
			<form method="post" action="traitement_informations_entreprise.php">
				<div class="left_content_entreprise">
				<?php
						$query00 = $con->prepare('SELECT nom_entreprise FROM entreprise');
						$query00->execute();
				?>
				<label class="label_visite_form">Entreprise existante :</label>
				<select name="nom_entreprise">
						<?php while ( $results = $query00->fetch()){ ?>
						<option value="<?php echo ($results['nom_entreprise']); ?>" >
							<?php echo($results ['nom_entreprise']); ?>
							<?php } $query00->closeCursor(); ?>
						</option> 
				</select>
				<br>
				<br>
				<?php
						$query01 = $con->prepare('SELECT nom_referent_peda FROM referent_pedagogique');
						$query01->execute();
				?>
				<label class="label_visite_form">Référent pédagogique :</label>
				<select name="referent_pedagogique">
						<?php while ( $results = $query01->fetch()){ ?>
						<option value="<?php echo ($results['nom_referent_peda']); ?>" >
							<?php echo($results ['nom_referent_peda']); ?>
							<?php } $query01->closeCursor(); ?>
						</option> 
				</select>
				<br>
				<br>
				<?php
						$query02 = $con->prepare('SELECT nom_referent_peda FROM referent_pedagogique');
						$query02->execute();
				?>
				<label class="label_visite_form">Référent professionnel :</label>
				<select name="referent_pro">
						<?php while ( $results = $query02->fetch()){ ?>
						<option value="<?php echo ($results['nom_referent_peda']); ?>" >
							<?php echo($results ['nom_referent_peda']); ?>
							<?php } $query02->closeCursor(); ?>
						</option> 
				</select>
				<br>
				<br>
				<?php
						$query03 = $con->prepare('SELECT nom_techno FROM techno');
						$query03->execute();
				?>
				<label class="label_visite_form">Technologie utilisée :</label>
				<select name="techno">
						<?php while ( $results = $query03->fetch()){ ?>
						<option value="<?php echo ($results['nom_techno']); ?>" >
							<?php echo($results ['nom_techno']); ?>
							<?php } $query03->closeCursor(); ?>
						</option> 
				</select>
				<br>
				<br>
				<?php
						$query04 = $con->prepare('SELECT annee FROM annee');
						$query04->execute();
				?>
				<label class="label_visite_form">Année concernée :</label>
				<select name="annee">
						<?php while ( $results = $query04->fetch()){ ?>
						<option value="<?php echo ($results['annee']); ?>" >
							<?php echo($results ['annee']); ?>
							<?php } $query04->closeCursor(); ?>
						</option> 
				</select>
				<br>
				<br>
				<label class="label_visite_form">Date de début (JJ/MM/AAAA) :</label>
				<input type="text" name="tel_entreprise" class="input_visite_form">
				</div>
				<div class="right_content_entreprise">
					<label class="label_nouveau">Ou nouveau :</label>
					<input type="text" name="nouveau_type_entreprise" class="input_visite_form">
					<br>
					<br>
					<label class="label_nouveau">Ou nouveau :</label>
					<input type="text" name="nouveau_type_entreprise" class="input_visite_form">
					<br>
					<br>
					<label class="label_nouveau">Ou nouveau :</label>
					<input type="text" name="nouveau_type_entreprise" class="input_visite_form">
					<br>
					<br>
					<label class="label_nouveau">Ou nouveau :</label>
					<input type="text" name="nouveau_type_entreprise" class="input_visite_form">
					<br>
					<br>
					<br>
					<br>
					<label class="label_visite_form">Date de fin (JJ/MM/AAAA) :</label>
					<input type="text" name="tel_entreprise" class="input_visite_form">
				</div>
			</form>
		</div>
	</div>
</div>
<?php include 'includes/footer.php' ?>