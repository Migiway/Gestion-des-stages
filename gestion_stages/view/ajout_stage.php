<?php
if(isset($_GET['etudiant'])&&(isset($_GET['classe']))) 
{
	$nom = $_GET['etudiant'];
    $classe = $_GET['classe'];
}
else 
{
	session_start();
	$nom = $_SESSION["nom_etudiant"];
	$classe = $_SESSION["classe_etudiant"];
}

?>
<?php include 'includes/header.php' ?>
<div class="container_stage">
	<div class="box_menu_accordeon">
		<?php include 'includes/menu_gauche.php' ?>
	</div>
	<div class="contenue_stage_acc">
		<div class="titre_principal">
			<?php
					echo($nom); ?> - <?php
					echo($classe);
			?>
		</div>
		<br>
		<br>
		<br>
		<div class="titre_secondaire">
			Informations de l'entreprise
		</div>
		<div class="form_entreprise_update">
			<form method="post" action="traitement_ajout_stage.php">
			<input type="hidden" name="nom_etudiant" value="<?php echo $nom ?>">
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
				<option value="">Autre</option>
						<?php while ( $results = $query01->fetch()){ ?>
						<option value="<?php echo ($results['nom_referent_peda']); ?>" >
							<?php echo($results ['nom_referent_peda']); ?>
							<?php } $query01->closeCursor(); ?>
						</option> 
				</select>
				<br>
				<br>
				<?php
						$query02 = $con->prepare('SELECT nom_referent_pro FROM referent_professionnel');
						$query02->execute();
				?>
				<label class="label_visite_form">Référent professionnel :</label>
				<select name="referent_pro">
				<option value="">Autre</option>
						<?php while ( $results = $query02->fetch()){ ?>
						<option value="<?php echo ($results['nom_referent_pro']); ?>" >
							<?php echo($results ['nom_referent_pro']); ?>
							<?php } $query02->closeCursor(); ?>
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
				<option value="">Autre</option>
						<?php while ( $results = $query04->fetch()){ ?>
						<option value="<?php echo ($results['annee']); ?>" >
							<?php echo($results ['annee']); ?>
							<?php } $query04->closeCursor(); ?>
						</option> 
				</select>
				<br>
				<br>
				<label class="label_visite_form">Date début (JJ/MM/AAAA) :</label>
				<input type="date" name="date_debut" class="input_visite_form">
				<input type="hidden" name="nom_eleve" class="input_visite_form" value="$nom_etudiant">
				<br>
				<br>
				<div class="submit"><input type="submit" value="   Valider   "></div>
				</div>
				<div class="right_content_entreprise">
					
					<br>
					<br>
					<label class="label_nouveau">Ou nouveau :</label>
					<input type="text" name="nouveau_referent_peda" class="input_visite_form">
					<br>
					<br>
					<label class="label_nouveau">Ou nouveau :</label>
					<input type="text" name="nouveau_referent_pro" class="input_visite_form">
					<br>
					<br>
					<label class="label_nouveau">Ou nouvelle :</label>
					<input type="text" name="nouvelle_annee" class="input_visite_form">
					<br>
					<br>
					<label class="label_visite_form">Date de fin (JJ/MM/AAAA) :</label>
					<input type="date" name="date_fin" class="input_visite_form">
				</div>
			</form>
		</div>
	</div>
</div>
<?php include 'includes/footer.php' ?>