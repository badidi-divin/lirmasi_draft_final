<?php 
	$mot1=isset($_GET['mot1'])?$_GET['mot1']:"";
	$mot2=isset($_GET['mot2'])?$_GET['mot2']:"";
	$mot3=isset($_GET['mot3'])?$_GET['mot3']:"";
	
	$requete="SELECT * FROM etudiant WHERE promotion_etudiant LIKE '%$mot1%' AND option_etudiant LIKE '%$mot2%' AND annee_scolaire LIKE '%$mot3%'";	
	$resultat=$pdo->query($requete);