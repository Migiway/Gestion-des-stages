<?php include 'includes/header.php' ?>
<div class="container_stage">
	<div class="box_menu_accordeon">
		<?php include 'includes/menu_gauche.php' ?>
	</div>
		<div class="contenue_stage_acc">
			<div class="titre_principal">
			Suivi scolarité
			</div>
			<div class="titre_secondaire_visite">
			Ajouter une nouvelle classe
			</div>
			<div class="ajout_visite">
			<form method="post" action="nouvelle_classe_traitement.php">
				<label class="label_visite_form">Libellé :</label>
				<input type="text" name="nom_classe" class="input_visite_form">
				<br>
				<br>
				<label class="label_visite_form">Désignation :</label>
				<input type="text" name="designation" class="input_visite_form">
				<br>
				<br>
				<div class="submit"><input type="submit" value="   Valider   "></div>
			</form>
			</div>
		</div>
</div>
<?php include 'includes/footer.php' ?>