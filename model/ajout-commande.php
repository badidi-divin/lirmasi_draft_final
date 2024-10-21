<?php
require_once('../bdd/connexion.php');

if (isset($_POST['formconnect'])) {
    //Lecture des données saisie par le user
    $code_abonne=htmlspecialchars($_POST['code_abonne']);
    $code_produit=htmlspecialchars($_POST['code_produit']);
	$qte_com=htmlspecialchars($_POST['qte_com']);
	
	// Recuperation du type d'abonnement
    $requser=$pdo->prepare("SELECT * FROM produit WHERE code_pro=?");
	$requser->execute(array($code_produit));
	$userinfo=$requser->fetch();
	// Fin*****************************************

	// Recuperation des données de l'abonnés
    $requser=$pdo->prepare("SELECT * FROM abonne WHERE code_abonne=?");
	$requser->execute(array($code_abonne));
	$userinfo2=$requser->fetch();
	// Fin*****************************************
    if ($userinfo['qte_stock']>$qte_com) {
        $pt=$userinfo['prix']*$qte_com;

	//Création de l'objet prepare et envoie de la requête
	$ps=$pdo->prepare("INSERT INTO achat(code_produit,designation,code_abonne,nom,prix,qte_com,pt)VALUES(?,?,?,?,?,?,?)");
	//Pour bien recupere les données on crée un table de parametre
	$params=array($code_produit,$userinfo['designation'],$code_abonne,$userinfo2['nom'],$userinfo['prix'],$qte_com,$pt);
	//Execution de la requête par leur paramètre en ordre 
	$ps->execute($params);
	// Pour recuperer l'id du user
    // decrementation
    $qte_restant=$userinfo['qte_stock']-$qte_com;
    //Création de l'objet prepare et envoie de la requête
	$ps=$pdo->prepare("UPDATE produit SET qte_stock=? WHERE code_pro=?");
	//Pour bien recupere les données on crée un table de parametre
	$params=array($qte_restant,$code_produit);
	//Execution de la requête par leur paramètre en ordre 
	$ps->execute($params);

	?>
	<script type="text/javascript">
		alert('Enregistrement effectuée avec Succès!');
		window.open("paiement.php",'_self');
	</script>
	<?php				
		 exit();    
    }else{
        ?>
        <script type="text/javascript">
		alert('la quantité acheté doit être inferieur à la quantité commandée!');
		window.open("ajout-achat.php",'_self');
	</script>
    <?php
    }
    	
			}
			