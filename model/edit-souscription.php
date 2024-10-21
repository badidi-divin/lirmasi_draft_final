<?php
    require_once('../bdd/connexion.php');
    $requser=$pdo->prepare("SELECT * FROM souscription WHERE code_op=?");
    $requser->execute(array($_GET['id']));
    $userinfoss=$requser->fetch();


if (isset($_POST['formconnect'])) {
    //Lecture des données saisie par le user
    $code_abonne=htmlspecialchars($_POST['code_abonne']);
    $num_abon=htmlspecialchars($_POST['num_abon']);
	$date_fin=htmlspecialchars($_POST['date_fin']);
	
	// Recuperation du type d'abonnement
    $requser=$pdo->prepare("SELECT * FROM type_abonnement WHERE id=?");
	$requser->execute(array($num_abon));
	$userinfo=$requser->fetch();
	// Fin*****************************************

	// Recuperation des données de l'abonnés
    $requser=$pdo->prepare("SELECT * FROM abonne WHERE code_abonne=?");
	$requser->execute(array($code_abonne));
	$userinfo2=$requser->fetch();
	// Fin*****************************************


	//Création de l'objet prepare et envoie de la requête
	$ps=$pdo->prepare("UPDATE souscription SET code_abonne=?,nom=?,num_abon=?,montant=?,duree=?,date_fin=? WHERE code_op=?");
	//Pour bien recupere les données on crée un table de parametre
	$params=array($code_abonne,$userinfo2['nom'],$num_abon,$userinfo['prix'],$userinfo['duree'],$date_fin,$_GET['id']);
	//Execution de la requête par leur paramètre en ordre 
	$ps->execute($params);
	// Pour recuperer l'id du user
	?>
	<script type="text/javascript">
		alert('Modification effectuée avec Succès!');
		window.open("https://api.whatsapp.com/send?phone=+<?= $userinfo2['telephone']; ?>&text=Bonjour Mr(Mdm) <?= $userinfo2['nom']." ".$userinfo2['postnom']; ?> votre abonnement a été modifié avec succès&source=&data=",'_self');
	</script>
	<?php				
		 exit();	
			}
			