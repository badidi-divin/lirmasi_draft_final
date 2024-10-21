<?php
	session_start();
	require_once '../bdd/connexion.php';
	require_once('../model/imprimer-abonne.php');
	$id=1;
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tableau de Bord</title>
	<link rel="stylesheet" href="../includes/css/bootstrap.css">
	<style type="text/css">
		@page
		{
			size:A4;
			margin:0; 

		}
		#print-btn{
			display: none;
			visibility: none;
		}
		.margetop{
			margin-top: 60px;
		}
		.spacer{
			margin-top: 10px;
		}
		.space{
			margin-top: 70px;
		}
		.spac{
			margin-top: 80px;
		}
		.a{
			text-align:center;
			text-decoration: blink;
		}
	</style>
</head>
<body>
	<!--************************ Header ***********************************-->
	<!-- Navigation -->
		<div align="center">
			<h2>LISTE DES ABONNES</h2>
		</div>
		<div class="col-md-12 col-xs-12 spacer">
				<!--un div encadrer ayant pusierus categorie dont n a utiliser info  -->
				<div class="panel panel-info spacer">
					<!-- titre dans bootstrap -->
					
					<!-- Le corps du tableau où l'on mettra le contenu -->
						<table class="table table-striped" border="1">
						<thead>
								<tr>
									<th>CODE</th><th>NOM</th><th>POST-NOM</th><th>PRENOM</th><th>SEXE</th><th>TELEPHONE</th><th>EMAIL</th><th>ADRESSE</th><th>TYPE_ABONNE</th>
								</tr>
							</thead>
							<tbody>
								<?php while ($et=$resultat->fetch()){?>
								<tr>
								<td><?php  echo($et['code_abonne'])?></td>
								<td><?php  echo($et['nom'])?></td>
								<td><?php  echo($et['postnom'])?></td>
								<td><?php  echo($et['prenom'])?></td>
								<td><?php  echo($et['sexe'])?></td>
								<td>+<a href="https://api.whatsapp.com/send?phone=%2B<?= $et['telephone']; ?>&text=Bonjour&app_absent=0"><?php  echo($et['telephone'])?></a></td>
								<td><a href="mailto:<?php  echo($et['email'])?>"><?php  echo($et['email'])?></a> </td>
								<td><?php  echo($et['adresse'])?></td>
								<td><?php 
                                require_once('../bdd/connexion.php');
								$requser=$pdo->prepare("SELECT * FROM type WHERE id=?");
								$requser->execute(array($et['type_abonne']));
								$userinfo=$requser->fetch();
								echo($userinfo['designation']);
                                ?></td>
								<!--liens -->
											</tr>	
									<?php  } ?>	
							</tbody>
						</table>
						
			</div>
			<div class="text-center">
							<a onclick="window.print();">clic</a>
						</div>	
		
</body>
</html>
