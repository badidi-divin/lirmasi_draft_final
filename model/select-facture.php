<?php
	require_once('../../bdd/connexion.php');
	// Selection client
	$requser=$pdo->prepare("SELECT * FROM souscription WHERE code_op=?");
	$requser->execute(array($_GET['id']));
	$infofacture=$requser->fetch();