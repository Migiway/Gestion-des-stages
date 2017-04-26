 <?php
$etudiant = $_POST['etudiant'];
var_dump($etudiant)
?>
<?php include 'includes/header.php' ?>
<div class="container_stage">
	<div class="box_menu_accordeon">
		<?php include 'includes/menu_gauche.php' ?>
	</div>
		<div class="contenue_stage_acc">
			<div class="titre_principal">
			<?php echo $etudiant ?>
			</div>
			<div class="titre_secondaire_visite">
			Associer l'élève a une nouvelle classe
			</div>
			<?php 
			$requete=$con->query( 'SELECT * FROM classe ORDER BY Nom_classe ASC ' ); ?>
			<?php 
			$requete2=$con->query( 'SELECT * FROM annee ORDER BY Annee ASC ' ); ?>
			<div class="ajout_visite">
			<form method="post" action="nouvelle_classe_eleve_traitement.php">
				<label class="label_visite_form">Classe :</label>
				<select name="classe">
							<option value=''>---</option>
							<?php  while($donnees=$requete->fetch()) { ?>
				           <option value="<?php echo ($donnees['Nom_classe']); ?>">
				           	<?php echo($donnees['Nom_classe']); ?>
				           </option>
				           <?php } ?>
				</select>
				<br>
				<br>

				<label class="label_visite_form">Année :</label>
				<select name="Annee">
							<option value=''>---</option>
							<?php  while($donnees2=$requete2->fetch()) { ?>
				           <option value="<?php echo ($donnees2['Annee']); ?>">
				           	<?php echo($donnees2['Annee']); ?>
				           </option>
				           <?php } ?>
				</select>
				<br>
				<br>
				<input type="hidden" name="etudiant" value="<?php echo $etudiant?>">
				<div class="submit"><input type="submit" value="   Valider   "></div>
			</form>
			</div>
		</div>
</div>
<?php include 'includes/footer.php' ?>