<?php
	require_once('../bdd/connexion.php');
	$requser=$pdo->prepare("SELECT * FROM produit WHERE code_pro=?");
	$requser->execute(array($_GET['id']));
	$userinfo=$requser->fetch();

if (isset($_POST['formconnect'])) {
     //Lecture des données saisie par le user
	 $designation=htmlspecialchars($_POST['designation']);
	 $prix=htmlspecialchars($_POST['prix']);
	 $qte_stock=htmlspecialchars($_POST['qte_stock']);
	 $categorie=htmlspecialchars($_POST['categorie']);
 
 
	 //Création de l'objet prepare et envoie de la requête
	 $ps=$pdo->prepare("UPDATE produit SET designation=?,prix=?,qte_stock=?,categorie=? WHERE code_pro=?");
	 //Pour bien recupere les données on crée un table de parametre
	 $params=array($designation,$prix,$qte_stock,$categorie,$_GET['id']);
	 //Execution de la requête par leur paramètre en ordre 
	 $ps->execute($params);
	 // Pour recuperer l'id du user
	 ?>
			 <script type="text/javascript">
				 alert('Modification effectuée avec Succès!')
			 </script>
			 <script>
				 window.open('../admin/view/produit.php','_self')
			 </script>
			 <?php
 
			 exit();	
			 }
			 