<?php
require_once('../bdd/connexion.php');
	$requser=$pdo->prepare("SELECT * FROM inscription WHERE id=?");
	$requser->execute(array($_GET['id']));
	$userinfo=$requser->fetch();

if (isset($_POST['formconnect'])) {
    //Lecture des données saisie par le user
    $code_apprenant=htmlspecialchars($_POST['code_apprenant']);
    $formation=htmlspecialchars($_POST['formation']);
    $session=htmlspecialchars($_POST['session']);

    $requser=$pdo->prepare("SELECT * FROM formation WHERE designation=?");
	$requser->execute(array($formation));
	$userinfo=$requser->fetch();

	//Création de l'objet prepare et envoie de la requête
	$ps=$pdo->prepare("UPDATE inscription SET code_apprenant=?,formation=?,montant_a_payer=?,session=? WHERE id=?");
	//Pour bien recupere les données on crée un table de parametre
	$params=array($code_apprenant,$formation,$userinfo['montant'],$session,$_GET['id']);
	//Execution de la requête par leur paramètre en ordre 
	$ps->execute($params);
	// Pour recuperer l'id du user
	?>
			<script type="text/javascript">
				alert('Modification effectuée avec Succès!')
			</script>
			<script>
				window.open('./inscription-centre.php','_self')
			</script>
			<?php

			exit();	
			}
			