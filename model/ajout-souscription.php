<?php
require_once('../bdd/connexion.php');

if (isset($_POST['formconnect'])) {
    //Lecture des données saisie par le user
    $code_abonne=htmlspecialchars($_POST['code_abonne']);
    $num_abon=htmlspecialchars($_POST['num_abon']);
	$date_fin=htmlspecialchars($_POST['date_fin']);
	
	// Recuperation du type d'abonnement
    $requser=$pdo->prepare("SELECT * FROM type_abonnement WHERE design_abon=?");
	$requser->execute(array($num_abon));
	$userinfo=$requser->fetch();
	// Fin*****************************************

	// Recuperation des données de l'abonnés
    $requser=$pdo->prepare("SELECT * FROM abonne WHERE code_abonne=?");
	$requser->execute(array($code_abonne));
	$userinfo2=$requser->fetch();
	// Fin*****************************************


	//Création de l'objet prepare et envoie de la requête
	$ps=$pdo->prepare("INSERT INTO souscription(code_abonne,nom,num_abon,montant,duree,date,date_fin)VALUES(?,?,?,?,?,?,?)");
	//Pour bien recupere les données on crée un table de parametre
	$params=array($code_abonne,$userinfo2['nom'],$userinfo['id'],$userinfo['prix'],$userinfo['duree'],date('Y-m-d'),$date_fin);
	//Execution de la requête par leur paramètre en ordre 
	$ps->execute($params);
	// Pour recuperer l'id du user
	?>
	<script type="text/javascript">
		alert('Enregistrement effectuée avec Succès!');
		
		window.open("https://api.whatsapp.com/send?phone=%2B<?= $userinfo2['telephone']; ?>&text=Bonjour Mr(Mdm) <?= $userinfo2['nom']." ".$userinfo2['postnom']; ?> votre abonnement s\'est effectuée avec succès&app_absent=0",'_self');
	</script>
	<?php				
		 exit();	
			}
			