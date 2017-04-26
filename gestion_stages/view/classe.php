<?php
$classe = $_GET['classe'];
var_dump($classe)
?>

<?php include 'includes/header.php' ?>
<div class="container_stage">
	<div class="box_menu_accordeon">
		<?php include 'includes/menu_gauche.php' ?>
	</div>
		<div class="contenue_stage_acc">
			<div id="titre_principal_classe">
			Classe <?php echo $classe ?>
			</div>
			<div class="btn_ajout">
			<form method="get" action="classe_nouvelle_annee.php">
			<input type="submit" value="   Ajouter une année   ">
			<input type="hidden" name="classe" value="<?php echo $classe ?>">
			</form>
			</div>
			<div id="titre_secondaire_classe">
			Historique des élèves par année
			</div>
			<div id="tableau_histo_stage">

				<?php $requete2=$con->prepare( 'SELECT Annee,Nom_classe FROM annee,appartient,classe WHERE annee.Id_annee = appartient.Id_annee and classe.Id_classe = appartient.Id_classe and Nom_classe= :classe GROUP BY Annee ');
					$requete2 -> bindParam(':classe',$classe);
					$requete2 ->execute();
				while($donnees2=$requete2->fetch()) {
				
				$requete= $con->prepare( 'SELECT Nom_etudiant,Prenom_etudiant,telephone_etudiant,annee_obtention_bac,Annee FROM etudiant,bac,classe,appartient,annee WHERE etudiant.Id_bac = Bac.Id_bac and etudiant.Id_etudiant = appartient.Id_etudiant and classe.Id_classe = appartient.Id_classe and annee.Id_annee = appartient.Id_annee and Nom_classe = :classe And Annee like "'.$donnees2['Annee'].'" '); 
				$requete -> bindParam(':classe',$classe);
				$requete ->execute();
				?>

			<TABLE BORDER CELLPADDING=10 CELLSPACING=0>
				<TR>
					<p><strong><?php echo($donnees2['Annee']); ?></strong></p>
					<TH>Nom</TH>
					<TH>Prénom</TH>
					<TH>N°téléphone</TH>
					<TH>Année obtention BAC</TH>
					<TH>Action</TH>
				</TR>
				<?php  while($donnees=$requete->fetch()) { ?>
				<TR>
						<TD><?php echo($donnees['Nom_etudiant']); ?></TD>
				    	<TD><?php echo($donnees['Prenom_etudiant']); ?></TD>
				    	<TD><?php echo($donnees['telephone_etudiant']); ?></TD>
				    	<TD><?php echo($donnees['annee_obtention_bac']); ?></TD>
				    	<TH><a href="#" class="lien_tableau">Voir détail</a></TH>
				</TR>
				<?php } ?>
			</TABLE>
			<?php } ?>
			<br>
			<br>
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