<?php
	require_once('../../bdd/connexion.php');
	// Selection client
	$code=$_GET['id'];
	$nom=$_GET['nom'];
	$dates=$_GET['dates'];

	$requete2=$pdo->prepare("SELECT * FROM achat WHERE code_abonne=?");
	$requete2->execute(array($code));
	