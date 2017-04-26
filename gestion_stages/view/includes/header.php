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
			<img src="../public/img/logo_sv.png" alt="Logo Lycée Saint Vincent">
			</div>

			<div class="nav">
				<div class="txt">
					<strong class="banner_title">Plateforme de Gestion des Stages</strong>
				</div>

				<div class="nav_bar">
					<div class="menu">
						<ul class="main_menu">
							<li>
								<a href="#">Stages</a>
							</li>
							<li>
								<a href="#">Entreprises</a>
							</li>
							<li>
								<a href="#">Suivi scolarité</a>
							</li>
						</ul>
					</div>
					<div class="user">
						<ul class="user_menu">
							<li>
								<a href="#">Bienvenue <?php
									if (isset($_COOKIE['login']))
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