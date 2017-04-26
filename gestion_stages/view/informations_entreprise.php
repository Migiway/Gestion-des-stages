<?php include 'includes/header.php' ?>
<div class="container_stage">
	<div class="box_menu_accordeon">
		<?php include 'includes/menu_gauche.php' ?>
	</div>
	<div class="contenue_stage_acc">
		<div class="titre_principal">
			<?php $nom_entreprise_original = $_GET['entreprise'];
			 echo($nom_entreprise_original); ?>
		</div>
		<br>
		<br>
		<br>
		<p class="tamer">
			Cette société totalise <?php $query00 = $con->prepare('SELECT nb_stages_entreprise FROM entreprise WHERE Nom_entreprise = "'.$nom_entreprise_original.'"');
				$query00->execute();
				$results = $query00->fetch();
				$nb_stage = $results['nb_stages_entreprise'];
				echo $nb_stage;
			?> stages à son actif.
			
		</p>
		<br>
		<br>
		<div class="titre_secondaire">
			Informations de l'entreprise
		</div>
		<div class="form_entreprise_update">
			<form method="post" action="traitement_informations_entreprise.php">
				<div class="left_content_entreprise">
					<input type="hidden" name="nom_originale" value="<?php echo $nom_entreprise_original?>">
					<?php $query01 = $con->prepare('SELECT chiffre_affaires,adresse_entreprise,telephone_entreprise,type_entreprise FROM entreprise WHERE Nom_entreprise = "'.$nom_entreprise.'"');
						$query01->execute();
						$results = $query01->fetch();
						$ca_entreprise = $results['chiffre_affaires'];
						$addr_entreprise = $results['adresse_entreprise'];
						$tel_entreprise = $results['telephone_entreprise'];
						$type_entreprise = $results['type_entreprise'];
					?>
					<label class="label_visite_form">Non de l'entreprise :</label>
					<input type="text" name="nom_entreprise" class="input_visite_form" value="<?php echo $nom_entreprise ?>">
					<br>
					<br>
					<?php
						$query = $con->prepare('SELECT type_entreprise FROM entreprise');
						$query->execute();
					?>
					<label class="label_visite_form">Type d'entreprise :</label>
					<select name="type_entreprise">
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
					<?php
						$query = $con->prepare('SELECT resp_technique FROM entreprise');
						$query->execute();
					?>
					<label class="label_visite_form">Resp. technique :</label>
					<select name="resp_technique">
					<option><?php echo $resp_technique ?></option>
						<?php while ( $results = $query->fetch()){ ?>
						<option value="<?php echo ($results['resp_technique']); ?>" >
							<?php echo($results ['resp_technique']); ?>
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
			<TABLE BORDER CELLPADDING=10 CELLSPACING=0>
				<TR>
					<TH>Année</TH>
					<TH>Elève</TH>
					<TH>Référent<br>pédagogique</TH>
					<TH>Référent<br>professionnel</TH>
					<TH>Action</TH>
				</TR>
				<TR>
					<TD>2016/2017</TD>
				    	<TD>Dupont Adrien</TD>
				    	<TD>M.Ammar</TD>
				    	<TH>M.Salesse</TH>
				    	<TH><a href="#" class="lien_tableau">Voir détail</a></TH>
				</TR>
				<TR>
					<TD>2015/2016</TD>
				    	<TD>Dupuis Bernars</TD>
				    	<TD>M.Ammar</TD>
				    	<TH>M.Ammar</TH>
				    	<TH><a href="#" class="lien_tableau">Voir détail</a></TH>
				</TR>
			</TABLE>
		</div>
		<div class="page_select">
			<ul class="page_selector">
				<li>
					<a href="#">1</a>
				</li>
				<li>
					<a href="#">2</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<?php include 'includes/footer.php' ?>