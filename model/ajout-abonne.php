<?php
require_once('../bdd/connexion.php');
// Generation Matricule
	$code=strtoupper(substr(md5(uniqid(rand())), 0, 3)).date('d-m-y');;
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
	$ps=$pdo->prepare("INSERT INTO abonne(code_abonne,nom,postnom,prenom,sexe,telephone,email,adresse,type_abonne)VALUES(?,?,?,?,?,?,?,?,?)");
	//Pour bien recupere les données on crée un table de parametre
	$params=array($code,$nom,$postnom,$prenom,$sexe,$tel,$email,$adresse,$type_abonne);
	//Execution de la requête par leur paramètre en ordre 
	$ps->execute($params);
	// Pour recuperer l'id du user
	?>
						<script type="text/javascript">
							alert('Enregistrement Effectué avec Succès!')
						</script>
						<script>
							window.open('../admin/view/abonne.php','_self')
						</script>
					<?php
					
						exit();

	}
  
	