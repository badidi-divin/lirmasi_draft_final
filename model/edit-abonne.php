<?php
// Generation Matricule
    require_once('../bdd/connexion.php');
    $requser=$pdo->prepare("SELECT * FROM abonne WHERE code_abonne=?");
    $requser->execute(array($_GET['id']));
    $userinfo=$requser->fetch();

	// End Generation
if (isset($_POST['formconnect'])) {
    //Lecture des données saisie par le user

    $nom=htmlspecialchars($_POST['nom']);
    $postnom=htmlspecialchars($_POST['postnom']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $sexe=htmlspecialchars($_POST['sexe']);
    $tel=htmlspecialchars($_POST['tel']);
    $email=htmlspecialchars($_POST['email']);
    $adresse=htmlspecialchars($_POST['adresse']);
    $type_abonne=htmlspecialchars($_POST['type_abonne']);

    //Création de l'objet prepare et envoie de la requête
	$ps=$pdo->prepare("UPDATE abonne SET nom=?,postnom=?,prenom=?,sexe=?,telephone=?,email=?,adresse=?,type_abonne=? WHERE code_abonne=?");
	//Pour bien recupere les données on crée un table de parametre
	$params=array($nom,$postnom,$prenom,$sexe,$tel,$email,$adresse,$type_abonne,$_GET['id']);
	//Execution de la requête par leur paramètre en ordre 
	$ps->execute($params);
	// Pour recuperer l'id du user
	?>
						<script type="text/javascript">
							alert('Modification Effectuée avec Succès!')
						</script>
						<script>
							window.open('../admin/view/abonne.php','_self')
						</script>
					<?php
					
						exit();

	}
  
	