		<!--include-->
 <?php
$etudiant = $_GET['etudiant'];
var_dump($etudiant)
?>
<?php include 'includes/header.php' ?>
<div class="container_stage">
	<div class="box_menu_accordeon">
		<?php include 'includes/menu_gauche.php' ?>
	</div>

		<!--Info-->

		<div class="titre_principal">
			<?php echo $etudiant ?> - classe de l'eleve
		</div>
		<?php 
		$requete2= $con->query('SELECT Id_etudiant FROM etudiant Where Nom_etudiant = "'.$etudiant.'"');
		$donnees2=$requete2->fetch();
		$Id_nom=$donnees2['Id_etudiant'];
		var_dump($Id_nom);
		?>
		<!--bouton association classe-->
		<br>
		<div class="btn_association_classe">
		<form method="post" action="nouvelle_classe_eleve.php">
			<input type="hidden" name="etudiant" value="<?php echo $etudiant ?>"/>
			<input type="submit" value="Associer à une nouvelle classe"/>
		</form>
		</div>

		<!--formulaire-->

		<div class="titre_secondaire">
			Information
		</div>
		<div class="form_eleve">


			<form method="post" action="eleve_traitement">
					<input type="hidden" name="Id_etudiant" value="<?php echo $Id_nom ?>"/>
				<!--form gauche-->

				<div class="left_content_eleve">


					<label class="label_eleve_form">Nom :</label>
					<input type="text" name="nom" class="input_eleve_form" value="<?php echo $etudiant ?>">
					<br>
					<br>
					<?php 
						$requete0=$con->query( 'SELECT telephone_etudiant FROM etudiant where Nom_etudiant = "'.$etudiant.'" '); 
						$donnees0=$requete0->fetch();
						$telephone_etudiant=$donnees0['telephone_etudiant'];?>
					<label class="label_eleve_form">Téléphone :</label>
					<input type="number" name="telephone" class="input_eleve_form" value="<?php echo $telephone_etudiant ?>">
					<br>
					<br>
					<?php 
						$requete0=$con->query( 'SELECT adresse_etudiant FROM etudiant where Nom_etudiant = "'.$etudiant.'" '); 
						$donnees0=$requete0->fetch();
						$adresse_etudiant=$donnees0['adresse_etudiant'];?>

					<label class="label_eleve_form">Adresse postale :</label>
					<input type="textarea" name="adresse" rows="8" cols="50" class="input_eleve_form_adresse" value="<?php echo $adresse_etudiant ?>">
					<br>
					<br>
					<div class="submit">
						<input type="submit" value="   Mettre a jour   ">
					</div>
				</div>

				<!--form droite-->
		
				<div class="right_content_eleve">
					<?php 
						$requete=$con->query( 'SELECT Prenom_etudiant FROM etudiant where Nom_etudiant = "'.$etudiant.'" '); 
						$donnees=$requete->fetch();
						$prenom_etudiant=$donnees['Prenom_etudiant'];?>

					<label class="label_visite_form">Prénom :</label>
					<input type="text" name="prenom" class="input_eleve_form" value="<?php echo $prenom_etudiant ?>">
					<br>
					<br>
					<?php 
						$requete=$con->query( 'SELECT email_etudiant FROM etudiant where Nom_etudiant = "'.$etudiant.'" '); 
						$donnees=$requete->fetch();
						$email_etudiant=$donnees['email_etudiant'];?>

					<label class="label_visite_form">Email :</label>
					<input type="email" name="email" class="input_eleve_form" value="<?php echo $email_etudiant ?>">
					<br>
					<br>
					<?php 
						$requete=$con->query( 'SELECT annee_obtention_bac FROM etudiant where Nom_etudiant = "'.$etudiant.'" '); 
						$donnees=$requete->fetch();
						$annee_bac=$donnees['annee_obtention_bac'];?>
					<label class="label_visite_form">Année obtention BAC :</label>
					<input type="number" maxlength="4" name="annee_obtention_bac" class="input_eleve_form" value="<?php echo $annee_bac ?>">
					<br>
					<br>
						<?php 
						$requete=$con->query( 'SELECT type_bac FROM etudiant,bac where etudiant.Id_bac = bac.Id_bac and Nom_etudiant = "'.$etudiant.'"'); 
						$donnees=$requete->fetch();
						$type_bac=$donnees['type_bac'];

						$requete1=$con->query( 'SELECT * FROM bac ORDER BY type_bac ASC ' ); ?>
						<label class="label_visite_form">Type de BAC :</label>
					    <select name="bac">
					        <option value='<?php echo $type_bac?>'><?php echo $type_bac ?></option>
					        <option>---</option>
							<?php  while($donnees1=$requete1->fetch()) { ?>
				           <option value="<?php echo ($donnees['type_bac']); ?>">
				           	<?php echo($donnees1['type_bac']); ?>
				           </option>
				           <?php } ?>
					    </select>
				</div>
					

			</form>
		</div>
		
		<!--tableau-->



		<div class="titre_secondaire">
			Historique des classes
		</div>
		<br>
		<?php 
		$requete=$con->prepare( 'SELECT Nom_etudiant,Id_annee,Nom_classe FROM etudiant,appartient,classe WHERE etudiant.Id_etudiant = appartient.Id_etudiant and classe.Id_classe = appartient.Id_classe and Nom_etudiant = :etudiant'); 
				$requete -> bindParam(':etudiant',$etudiant);
				$requete ->execute();
		?>
		<div class="tableau_histo_stage">
			<TABLE BORDER CELLPADDING=10 CELLSPACING=0>
				<TR>
					<TH>Année</TH>
					<TH>Classe</TH>
					<TH>Action</TH>
				</TR>
				<?php  while($donnees=$requete->fetch()) { ?>
				<TR>
					<TD><?php echo($donnees['Id_annee']); ?></TD>
				   	<TD><?php echo($donnees['Nom_classe']); ?></TD>
				    <TH><a href="#" class="lien_tableau">Voir les stages</a></TH>
				</TR>
				<?php } ?>
			</TABLE>
		</div>
</div>
<?php include 'includes/footer.php' ?>