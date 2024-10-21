<?php
	session_start();
	require_once('../bdd/connexion.php');
if (isset($_POST['save'])) {
    //Lecture des données saisie par le user
    $nom=$_POST['nom'];
    $mdp=md5($_POST['mdp']);
    //Création de l'objet prepare et envoie de la requête
	$ps=$pdo->prepare("UPDATE user SET username=?,password=? WHERE id=?");
	//Pour bien recupere les données on crée un table de parametre
	$params=array($nom,$mdp,$_SESSION['id_user']);
	//Execution de la requête par leur paramètre en ordre 
	$ps->execute($params);
	// Pour recuperer l'id du user
	?>
						<script type="text/javascript">
							alert('Modification Effectuée avec Succès!')
						</script>
						<script>
							window.open('../admin/view/profile.php','_self')
						</script>
					<?php
					
						exit();

	}
  
	