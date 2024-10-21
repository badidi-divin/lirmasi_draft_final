<?php
	require_once('../bdd/connexion.php');
	$requser=$pdo->prepare("SELECT * FROM apprenant WHERE code=?");
	$requser->execute(array($_GET['id']));
	$userinfo=$requser->fetch();

	// End Generation
if (isset($_POST['formconnect'])) {
    //Lecture des données saisie par le user
    $nom=htmlspecialchars($_POST['nom']);
    $postnom=htmlspecialchars($_POST['postnom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $sexe=htmlspecialchars($_POST['sexe']);
    $phone=htmlspecialchars($_POST['phone']);
    $tel=htmlspecialchars($_POST['tel']);
    $email=htmlspecialchars($_POST['email']);
    $adresse=htmlspecialchars($_POST['adresse']);

    	//Création de l'objet prepare et envoie de la requête
	$ps=$pdo->prepare("UPDATE apprenant SET nom=?,postnom=?,prenom=?,sexe=?,phone=?,tel=?,email=?,adresses=? WHERE code=?");
	//Pour bien recupere les données on crée un table de parametre
	$params=array($nom,$postnom,$prenom,$sexe,$phone,$tel,$email,$adresse,$_GET['id']);
	//Execution de la requête par leur paramètre en ordre 
	$ps->execute($params);
	// Pour recuperer l'id du user
	?>
						<script type="text/javascript">
							alert('Modification Effectuée avec Succès!')
						</script>
						<script>
							window.open('Client.php','_self')
						</script>
					<?php
					
						exit();

	}
  
	