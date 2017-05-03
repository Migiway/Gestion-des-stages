			<!--include-->
 
<?php include 'includes/header.php' ?>
<div class="container_stage">
	<div class="box_menu_accordeon">
		<?php include 'includes/menu_gauche.php' ?>
	</div>

		<!--Info-->

		<div class="titre_principal">
			Suivi scolarité
		</div>

		<!--bouton association classe-->
		<br>

		<!--formulaire-->

		<div class="titre_secondaire">
			Ajouter un élève
		</div>
		<div class="form_eleve">
			<form method="post" action="nouvel_eleve_traitement.php">

				<!--form gauche-->

				<div class="left_content_eleve">
					<label class="label_eleve_form">Nom :</label>
					<input type="text" name="nom" class="input_eleve_form">
					<br>
					<br>
					<label class="label_eleve_form">Téléphone :</label>
					<input type="text" name="telephone" class="input_eleve_form">
					<br>
					<br>
					<label class="label_eleve_form">Adresse :</label>
					<input type="textarea" name='adresse' rows="8" cols="50" class="input_eleve_form_adresse">
				</div>

				<!--form droite-->
		
				<div class="right_content_eleve">
					<label class="label_visite_form">Prénom :</label>
					<input type="text" name="prenom" class="input_eleve_form">
					<br>
					<br>
					<label class="label_visite_form">Email :</label>
					<input type="email" name="email" class="input_eleve_form">
					<br>
					<br>
					<label class="label_visite_form">Année obtention BAC :</label>
					<input type="number" maxlength="4" name="annee_obtension_bac" class="input_eleve_form">
					<br>
					<br>
					<?php 
						$requete=$con->query( 'SELECT * FROM bac ORDER BY type_bac ASC ' ); ?>
						<label class="label_visite_form">Type de BAC :</label>
					    <select name="bac">
					        <option value=''>---</option>
							<?php  while($donnees=$requete->fetch()) { ?>
				           <option value="<?php echo ($donnees['type_bac']); ?>">
				           	<?php echo($donnees['type_bac']); ?>
				           </option>
				           <?php } ?>
					    </select>
				</div>
					<div class="submit">
						<input type="submit" value="   Ajouter   ">
					</div>

			</form>
		</div>
</div>
<?php include 'includes/footer.php' ?>
