<?php
if(isset($_GET['etudiant'])&&(isset($_GET['classe']))) 
{
	$nom = $_GET['etudiant'];
    $classe = $_GET['classe'];
}
else 
{
	session_start();
	$nom = $_SESSION["nom_etudiant"];
	$classe = $_SESSION["classe_etudiant"];
}

?>
<?php include 'includes/header.php' ?>
<div class="container_stage">
	<div class="box_menu_accordeon">
		<?php include 'includes/menu_gauche.php' ?>
	</div>
		<div class="contenue_stage_acc">
			<div class="titre_principal">
			<?php echo $nom ?> - <?php echo $classe ?>
			</div>
			<div class="titre_secondaire">
			Historique des stages
			</div>
			<div class="btn_ajout">
			<form method="get" action="ajout_stage.php">
			<input type="hidden" name="etudiant" value="<?php echo $nom ?>">
			<input type="hidden" name="classe" value="<?php echo $classe ?>">
			<input type="submit" value="Ajouter un stage"/>
			</form>
			</div>
			<div class="tableau_histo_stage">
			<?php $requete= $con->query('SELECT Annee, Nom_entreprise, Nom_etudiant, Nom_referent_peda, Nom_referent_pro FROM etudiant AS f, annee AS a, entreprise AS b, referent_pedagogique AS c, referent_professionnel AS d, stage AS e where a.Id_annee = e.Id_annee and b.Id_entreprise = e.Id_entreprise and c.Id_referent_peda = e.Id_referent_peda and d.Id_referent_pro = e.Id_referent_pro and f.Id_etudiant = e.Id_etudiant and Nom_etudiant LIKE "'.$nom.'" ORDER BY Nom_etudiant');
			?>

			<TABLE BORDER CELLPADDING=10 CELLSPACING=0>
				<TR>
					<TH>Année</TH>
					<TH>Entreprise</TH>
					<TH>Référent<br>pédagogique</TH>
					<TH>Référent<br>professionnel</TH>
					<TH>Action</TH>
				</TR>
				<?php  while($donnees=$requete->fetch())
				 { ?>
				<TR>
						<form method="get" action="detail_stage.php">
						<TD><?php echo($donnees['Annee']); ?></TD>
				    	<TD><?php echo($donnees['Nom_entreprise']); ?></TD>
				    	<TD><?php echo($donnees['Nom_referent_peda']); ?></TD>
				    	<TH><?php echo($donnees['Nom_referent_pro']); ?></TH>
				    	<?php 
				    	$annee=($donnees['Annee']); 
						$Nom_entreprise=($donnees['Nom_entreprise']);
						$Nom_referent_peda=($donnees['Nom_referent_peda']);
						$Nom_referent_pro=($donnees['Nom_referent_pro']);
				    	?>
				    	<TH><?php echo '<a href="detail_stage.php?etudiant='.$nom.'&classe='.$classe.'&annee='.$annee.'&entreprise='.$Nom_entreprise.'&ref_peda='.$Nom_referent_peda.'&ref_pro='.$Nom_referent_pro.'" class="lien_tableau">Voir détail</a>'; ?></TH>
				    	</form>
				</TR>
				<?php } ?>
			</TABLE>
			</div>
		</div>			
</div>
<?php include 'includes/footer.php' ?>