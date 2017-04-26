<?php include 'includes/header.php' ?>
<div class="container_stage">
	<div class="box_menu_accordeon">
	<?php include 'includes/menu_gauche.php' ?>
	</div>
	<div class="contenue_suivi_scolaire">
		<div class="titre_principal">
			Suivi de scolarité
		</div>
		<div class="titre_secondaire_visite">
			Rechercher une classe : 
		</div>
			<?php 
			$requete=$con->query( 'SELECT * FROM classe ORDER BY Nom_classe ASC ' ); ?>
			<form method="get" action="classe.php" class="form_eleve">
				<p>
					<label class="label_visite_form">Nom de la classe :</label>
				       <select name="classe">
				          	<?php  while($donnees=$requete->fetch()) { ?>
				           <option value="<?php echo ($donnees['Nom_classe']); ?>">
				           	<?php echo($donnees['Nom_classe']); ?>
				           </option>
				           <?php } ?>
				       </select>
			    </p>
			    <p>
			    	<div class="submit"><input type="submit" name="#" value="Rechercher"></div>
			    </p>
			    </form>
			    <div class="titre_secondaire_visite">
					Rechercher un élève : 
				</div>
			    <p>
			    	<?php 
						$requete= $con->query( 'SELECT Nom_etudiant FROM etudiant ORDER BY Nom_etudiant ASC ' );
					?>
					<form method="get" action="eleve.php" class="form_eleve">
					<label class="label_visite_form">Nom de l'élève :</label>
				       <select name="etudiant">
				          <?php  while($donnees2=$requete->fetch()) { ?>
				           <option value="<?php echo ($donnees2['Nom_etudiant']); ?>">

				           		<?php echo($donnees2['Nom_etudiant']); ?>
				           	
				           </option> <?php } ?>
				       </select>
			    </p>
			    <p>
			    	<div class="submit"><input type="submit" name="rechercher_eleve" value="Rechercher"></div>
			    </p>
			</form>
	</div>
	<div class=contenue_suivi_scolaire_2>
				<p>
					<br>
					<br>
					<br>

			    	<div class=""><a href="nouvelle_classe.php"><input type="submit" value="    Ajouter classe    "></a></div>
				</p>
				<p>
					<br>
					<br>
					<br>
					<br>
			    	<div class=""><a href="nouvel_eleve.php"><input type="submit" value="   Ajouter un élève   "></a></div>
				</p>
			</div>
</div>
<?php include 'includes/footer.php' ?>

<!-- version non définitive --> 
