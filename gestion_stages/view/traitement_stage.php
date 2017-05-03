<?php
$classe = $_POST['classe'];
$nom_etudiant = $_POST['etudiant'];
session_start();
$_SESSION["nom_etudiant"] = $nom_etudiant;
$_SESSION["classe_etudiant"] = $classe;
echo '<meta http-equiv="refresh" content="0;URL=ensemble_stages.php">';
?>