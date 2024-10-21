<?php
require_once('../bdd/connexion.php');
// Generation Matricule
	$code=strtoupper(substr(md5(uniqid(rand())), 0, 6)).date('m/y');;
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
    $nom_complet=$code." ".$nom." ".$postnom." ".$prenom;

    //Création de l'objet prepare et envoie de la requête
	$ps=$pdo->prepare("INSERT INTO apprenant(code,nom,postnom,prenom,sexe,phone,tel,email,adresses,nom_complet)VALUES(?,?,?,?,?,?,?,?,?,?)");
	//Pour bien recupere les données on crée un table de parametre
	$params=array($code,$nom,$postnom,$prenom,$sexe,$phone,$tel,$email,$adresse,$nom_complet);
	//Execution de la requête par leur paramètre en ordre 
	$ps->execute($params);
	// Pour recuperer l'id du user
	?>
						<script type="text/javascript">
							alert('Enregistrement Effectué avec Succès!')
						</script>
						<script>
							window.open('apprenant.php','_self')
						</script>
					<?php
					
						exit();

	}
  
	