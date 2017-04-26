<?php 

include 'includes/background.php';

// Hachage du mot de passe
$pass_hache = sha1($_POST['mdp']);
 $pseudo = $_POST['login'];
// Vérification des identifiants
$req = $con->prepare('SELECT Id_utilisateur FROM utilisateur WHERE Email = :login AND Password = :mdp');
$req->execute(array(
    'login' => $pseudo,
    'mdp' => $pass_hache));

$resultat = $req->fetchall();

if (!$resultat)
{
    echo '<body onLoad="alert(\'Identifiant éronnés\')">';
	echo '<meta http-equiv="refresh" content="0;URL=connexion.php">';
}
else
{
    session_start();
    $_SESSION['Id_utilisateur'] = $resultat;
    $_SESSION['login'] = $pseudo;
    setcookie('login',$pseudo,time()+3600*24*31);
    echo '<body onLoad="alert(\'Vous êtes connecté !\')">';
	echo '<meta http-equiv="refresh" content="0;URL=accueil.php">';
}
?>