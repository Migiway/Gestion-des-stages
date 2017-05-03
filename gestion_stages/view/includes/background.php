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
	<link rel="stylesheet" href="../public/css/styles2.css">
</head>
<body>
<video autoplay loop poster="../public/img/bg.jpg" id="bgvid">
  <source src="../public/img/SVI_VDef.webm" type="video/webm">
  <source src="../public/img/SVI_VDef.mp4" type="video/mp4">
</video>


	