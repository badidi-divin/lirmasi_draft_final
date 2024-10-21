<?php  
	$mc=isset($_GET['motcle'])?$_GET['motcle']:"";
	$requete="SELECT * FROM abonne WHERE nom LIKE '%$mc%'";	
	
	$resultat=$pdo->query($requete);
