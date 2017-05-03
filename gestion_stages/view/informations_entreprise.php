<?php include 'includes/header.php' ?>
<div class="container_stage">
	<div class="box_menu_accordeon">
		<?php include 'includes/menu_gauche.php' ?>
	</div>
	<div class="contenue_stage_acc">
		<div class="titre_principal">
			<?php $nom_entreprise = $_GET['entreprise'];
			 echo($nom_entreprise); ?>
		</div>
		<?php $query0 = $con->prepare('SELECT Id_entreprise FROM entreprise WHERE Nom_entreprise = "'.$nom_entreprise.'"');
				$query0->execute();
				$results = $query0->fetch();
				$id_entreprise = $results['Id_entreprise']; ?>
		<br>
		<br>
		<br>
		<p>
			Cette société totalise <?php $query00 = $con->prepare('SELECT COUNT(Id_entreprise) as nb FROM `stage` WHERE Id_entreprise = "'.$id_entreprise.'" ');
				$query00->execute();
				$results = $query00->fetch();
				$nb_stage = $results['nb'];
				echo $nb_stage;
				/* SELECT Id_entreprise FROM `entreprise` WHERE Nom_entreprise = "'.$Nom_entreprise.'"
				SELECT COUNT(Id_entreprise)as nb_stage FROM `stage` WHERE Id_entreprise = "'.$id_entreprise.'" */
			?> stages à son actif. 
			
		</p>
		<br>
		<br>
		<div class="titre_secondaire">
			Informations de l'entreprise
		</div>
		<div class="form_entreprise_update">
			<form method="post" action="traitement_informations_entreprise.php">
				<input type="hidden" name="id_entreprise" value="<?php echo $id_entreprise ?>">
				<div class="left_content_entreprise">
					<?php $query01 = $con->prepare('SELECT chiffre_affaires,adresse_entreprise,telephone_entreprise,type_entreprise,Nom_ref_pro FROM entreprise WHERE Nom_entreprise = "'.$nom_entreprise.'"');
						$query01->execute();
						$results = $query01->fetch();
						$ca_entreprise = $results['chiffre_affaires'];
						$addr_entreprise = $results['adresse_entreprise'];
						$tel_entreprise = $results['telephone_entreprise'];
						$type_entreprise = $results['type_entreprise'];
						$resp_technique = $results['Nom_ref_pro'];
					?>
					<label class="label_visite_form">Nom de l'entreprise :</label>
					<input type="text" name="nom_entreprise" class="input_visite_form" value="<?php echo $nom_entreprise ?>">
					<br>
					<br>
					<?php
						$query = $con->prepare('SELECT type_entreprise FROM entreprise Group by type_entreprise');
						$query->execute();
					?>
					<label class="label_visite_form">Type d'entreprise :</label>
					<select name="type_entreprise">
						<option value="">Autre</option>
						<?php while ( $results = $query->fetch()){ ?>
						<option value="<?php echo ($results['type_entreprise']); ?>" >
							<?php echo($results ['type_entreprise']); ?>
							<?php } $query->closeCursor(); ?>
						</option> 
					</select>
					<br>
					<br>
					<label class="label_visite_form">Chiffre d'affaires :</label>
					<input type="text" name="ca_entreprise" class="input_visite_form" value="<?php echo $ca_entreprise ?>">
					<br>
					<br>
					<label class="label_visite_form">Adresse postale :</label>
					<input type="text" name="adresse_entreprise" class="input_visite_form" value="<?php echo $addr_entreprise ?>">
					<br>
					<br>
					<label class="label_visite_form">Téléphone :</label>
					<input type="text" name="tel_entreprise" class="input_visite_form" value="<?php echo $tel_entreprise?>">
					<br>
					<br>
					<label class="label_visite_form">Resp. technique :</label>
					<?php $query01 = $con->prepare('SELECT Nom_referent_pro FROM referent_professionnel');
						$query01->execute(); ?>
					<select name="resp_technique">
						<option value=''>Autre</option>
						<?php while ( $results = $query01->fetch()){ ?>
						<option value="<?php echo ($results['Nom_referent_pro']); ?>" >
							<?php echo ($results['Nom_referent_pro']); ?>
							<?php } $query->closeCursor(); ?>
						</option> 
					</select>
					<br>
					<br>
					<div class="submit"><input type="submit" value="   Mettre a jour   "></div>
				</div>
				<div class="right_content_entreprise">
					<br>
					<br>
					<label class="label_nouveau">Ou nouveau :</label>
					<input type="text" name="nouveau_type_entreprise" class="input_visite_form">
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<label class="label_nouveau">Ou nouveau :</label>
					<input type="text" name="nouveau_resp_tech" class="input_visite_form">
				</div>
			</form>
		</div>
		<div class="titre_secondaire">
			Historique des stages
		</div>
		<br>
		<br>
		<div class="tableau_histo_stage">
			<?php $requete= $con->query('SELECT Annee, Nom_etudiant,Nom_entreprise, Nom_referent_peda, Nom_referent_pro FROM etudiant AS f, annee AS a, entreprise AS b, referent_pedagogique AS c, referent_professionnel AS d, stage AS e where a.Id_annee = e.Id_annee and b.Id_entreprise = e.Id_entreprise and c.Id_referent_peda = e.Id_referent_peda and d.Id_referent_pro = e.Id_referent_pro and f.Id_etudiant = e.Id_etudiant and Nom_entreprise ="'.$nom_entreprise.'" ORDER BY Nom_entreprise') ?>
			<TABLE BORDER CELLPADDING=10 CELLSPACING=0>
				<TR>
					<TH>Année</TH>
					<TH>Elève</TH>
					<TH>Référent<br>pédagogique</TH>
					<TH>Référent<br>professionnel</TH>
				</TR>
				<?php  while($donnees=$requete->fetch())
				 { ?>
				<TR>
						<TD><?php echo($donnees['Annee']); ?></TD>
				    	<TD><?php echo($donnees['Nom_etudiant']); ?></TD>
				    	<TD><?php echo($donnees['Nom_referent_peda']); ?></TD>
				    	<TH><?php echo($donnees['Nom_referent_pro']); ?></TH>
				</TR>
				<?php } ?>
			</TABLE>
		</div>
	</div>
</div>
<?php include 'includes/footer.php' ?>