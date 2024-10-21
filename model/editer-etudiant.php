<?php
	
		$requser=$pdo->prepare("SELECT * FROM etudiant WHERE matricule=?");
		$requser->execute(array($_GET['id']));
		$userinfo=$requser->fetch();
		
		// Uploader photo
	if (isset($_POST['formconnect'])) {

 	//Lecture des données saisie par le user
    $matricule=htmlspecialchars($_POST['matricule']);
    $nom_complet=htmlspecialchars($_POST['nom_complet']);
    $sexe=htmlspecialchars($_POST['sexe']);
    $telephone=htmlspecialchars($_POST['telephone']);
    $adresse=htmlspecialchars($_POST['adresse']);
    $option_etudiant=htmlspecialchars($_POST['option_etudiant']);
    $promotion_etudiant=htmlspecialchars($_POST['promotion_etudiant']);
    $annee_scolaire=htmlspecialchars($_POST['annee_scolaire']);
   
	//Création de l'objet prepare et envoie de la requête
	$ps=$pdo->prepare("UPDATE etudiant SET nom_complet=?,sexe=?,telephone=?,adresse=?,option_etudiant=?,promotion_etudiant=?,annee_scolaire=? WHERE matricule=?");
	//Pour bien recupere les données on crée un table de parametre
	$params=array($nom_complet,$sexe,$telephone,$adresse,$option_etudiant,$promotion_etudiant,$annee_scolaire,$matricule);
	//Execution de la requête par leur paramètre en ordre 
	$ps->execute($params);
	// Pour recuperer l'id du user
	?>
			<script type="text/javascript">
				alert('Vos données ont été bien modifiées!')
			</script>
			<script>
				window.open('./profile.php','_self')
			</script>
			<?php

			exit();	
	}	