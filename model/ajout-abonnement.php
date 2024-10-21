<?php
require_once('../bdd/connexion.php');

if (isset($_POST['formconnect'])) {
    //Lecture des données saisie par le user
    $designation=htmlspecialchars($_POST['designation']);
    $prix=htmlspecialchars($_POST['prix']);
	$categorie=htmlspecialchars($_POST['categorie']); 
    $duree=htmlspecialchars($_POST['duree']);

	//Création de l'objet prepare et envoie de la requête
	$ps=$pdo->prepare("INSERT INTO type_abonnement(design_abon,duree,prix,num_categ)VALUES(?,?,?,?)");
	//Pour bien recupere les données on crée un table de parametre
	$params=array($designation,$duree,$prix,$categorie);
	//Execution de la requête par leur paramètre en ordre 
	$ps->execute($params);
	// Pour recuperer l'id du user
	?>
			<script type="text/javascript">
				alert('Enregistrement effectuée avec Succès!')
			</script>
			<script>
				window.open('../admin/view/abonnement.php','_self')
			</script>
			<?php

			exit();	
			}
			