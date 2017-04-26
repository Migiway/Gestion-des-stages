<?php include 'includes/header.php' ?>

<div class="container_stage">
	<div class="box_menu_accordeon">
		<?php include 'includes/menu_gauche.php' ?>
	</div>
	<div class="contenue_stage_acc">
		<div class="titre_principal_type_bac">
			Suivi scolarité
		</div>
		<div class="left_content_eleve">
			<div class="titre_tertiaire">
				Liste des BAC
			</div>
			<div class="tableau_histo_stage">
			<?php $requete= $con->query('SELECT * FROM bac') ?>
				<TABLE BORDER CELLPADDING=10 CELLSPACING=0>
					<TR>
						<TH>Intitulé</TH>
						<TH>Action</TH>
					<?php  while($donnees=$requete->fetch()) { ?>
				 <form method="get" action="type_bac_traitement.php">
				<TR>
					<TD><?php echo($donnees['type_bac']); ?></TD>
				    <TH><?php echo '<a href="type_bac_traitement.php?submit='.$donnees['type_bac'].'" class="lien_tableau">Supprimer</a>'; ?></TH>
				</TR>
				<?php } ?>
				</form>
				</TABLE>
			</div>
		</div>
		<div class="right_content_eleve">
			<div id="ajouter_annees">
					<div id="titre_secondaire_classe">
						Ajouter un nouveau BAC
					</div>
					<div class="ajout_visite">
						<form method="post" action="type_bac_new_bac_traitement.php">
							<label>Intitulé :</label>
							<input type="text" name="bac">
							<div>
							<br>
								<input type="submit" value="   Valider   ">
							</div>
						</form>
					</div>
				</div>
		</div>
	</div>
</div>
<?php include 'includes/footer.php' ?>