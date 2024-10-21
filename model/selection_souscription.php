<?php  
	$mc=isset($_GET['motcle'])?$_GET['motcle']:"";
	$requete="SELECT * FROM souscription WHERE code_op LIKE '%$mc%'";	

	
	$resultat=$pdo->query($requete);
