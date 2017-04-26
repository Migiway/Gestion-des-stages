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
			<form method="post" action="#">
					<label class="label_visite_form">Non du référent :</label>
					<input type="text" name="nom_referent" class="input_visite_form">
					<br>
					<br>
					<label class="label_visite_form">Fonction :</label>
					<select name="fonction_referent">
					    <option value="chef_de_projet">Chef de projet</option>
					    <option value="developpeur_web">Développeur web</option>
					</select>
					<br>
					<br>
					<div class="submit"><input type="submit" value="   Valider   "></div>
			</form>
		</div>
	</div>
</div>
<?php include 'includes/footer.php' ?>