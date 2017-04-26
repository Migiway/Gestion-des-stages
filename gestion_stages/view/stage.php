<?php include 'includes/header.php' ?>
<div class="container_stage">
	<div class="box_menu_accordeon">
	<?php include 'includes/menu_gauche.php' ?>
	</div>
	<div class="contenue_stage_acc">
		<div class="titre_principal">
			Gestion des stages
		</div>
		<div class="titre_secondaire_visite">
			Rechercher un élève
		</div>
			<?php 
			$requete= $con->query( 'SELECT * FROM classe ORDER BY Nom_classe ASC ' ); ?>
			<form method="get" action="ensemble_stages.php" class="form_eleve">
				<p>
					<label class="label_visite_form">Classe :</label>
				       <select id="classe" name="classe">
				       	<?php  while($donnees=$requete->fetch()) { ?>
				           <option value="<?php echo ($donnees['Nom_classe']); ?>">
				           	<?php echo($donnees['Nom_classe']); ?>
				           </option>
				           <?php } ?>
				       </select>
			    </p>
			    <p>
			    	<?php 
			$requete= $con->query( 'SELECT Nom_etudiant FROM etudiant ORDER BY Nom_etudiant ASC ' );?>
					<label class="label_visite_form">Elève :</label>
				       <select id="etudiant" name="etudiant">
				       <?php  while($donnees2=$requete->fetch()) { ?>
				           <option value="<?php echo ($donnees2['Nom_etudiant']); ?>">

				           <?php echo($donnees2['Nom_etudiant']); ?>
				           	
				           </option> <?php } ?>

				       </select>
			    </p>
			    <br>
			    <p>
			    	<div class="submit"><input type="submit" name="ensemble_stages" value="Rechercher"></div>
			    </p>
			</form>
	</div>
</div>
<?php include 'includes/footer.php' ?>

<!-- version non définitive --> 
