<?php  
	$mc=isset($_GET['motcle'])?$_GET['motcle']:"";
		$requete="SELECT * FROM produit WHERE designation LIKE '%$mc%'";	

	
	$resultat=$pdo->query($requete);
