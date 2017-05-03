<?php
$user = 'root';
$pass = "";

try {
$con = new PDO('mysql:host=localhost;dbname=gestion_stage', $user, $pass);;
} catch(Exeption $e) {
	die($e);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Gestion des stages</title>
	<link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
	<div class="banner">
			<div class="logo">
			<a href="../view/accueil.php"><img src="../public/img/logo_sv.png" alt="Logo Lycée Saint Vincent"></a>
			</div>

			<div class="nav">
				<div class="txt">
					<strong class="banner_title">Plateforme de Gestion des Stages</strong>
				</div>

				<div class="nav_bar">
					<div class="menu">
						<ul class="main_menu">
							<li>
								<a href="../view/stage.php">Stages</a>
							</li>
							<li>
								<a href="../view/Entreprises.php">Entreprises</a>
							</li>
							<li>
								<a href="../view/suivi_scolarite.php">Suivi scolarité</a>
							</li>
						</ul>
					</div>
					<div class="user">
						<ul class="user_menu">
							<li>
								<a href="#">Bienvenue <?php
									if(isset($_COOKIE['login']))
									{
										echo $_COOKIE['login'];
									}
									
									?>
     							</a>
							</li>
						</ul>
					</div>
				</div>
			</div>		
	</div>