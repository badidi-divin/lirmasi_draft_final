<?php  
	$mc=isset($_GET['motcle'])?$_GET['motcle']:"";
	$requete="SELECT * FROM type_abonnement WHERE design_abon LIKE '%$mc%'";	
	
	$resultat=$pdo->query($requete);
