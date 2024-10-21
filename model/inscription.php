<?php
require_once('../bdd/connexion.php');

if (isset($_POST['formconnect'])) {
    //Lecture des données saisie par le user
    $nom=htmlspecialchars($_POST['nom']);
    $password=md5(htmlspecialchars($_POST['password']));
    $role=htmlspecialchars($_POST['role']);

	//Création de l'objet prepare et envoie de la requête
	$ps=$pdo->prepare("INSERT INTO user(username,password,role)VALUES(?,?,?)");
	//Pour bien recupere les données on crée un table de parametre
	$params=array($nom,$password,$role);
	//Execution de la requête par leur paramètre en ordre 
	$ps->execute($params);
	// Pour recuperer l'id du user
	?>
			<script type="text/javascript">
				alert('Votre Compte a été créé avec Succès!')
			</script>
			<script>
				window.open('./connexion.php','_self')
			</script>
			<?php

			exit();	
			}
			