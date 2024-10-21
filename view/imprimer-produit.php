<?php
	session_start();
	require_once '../bdd/connexion.php';
	require_once('../model/imprimer-formation.php');
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
			<h2>LISTE DE PRODUITS</h2>
		</div>
		<div class="col-md-12 col-xs-12 spacer">
				<!--un div encadrer ayant pusierus categorie dont n a utiliser info  -->
				<div class="panel panel-info spacer">
					<!-- titre dans bootstrap -->
					
					<!-- Le corps du tableau où l'on mettra le contenu -->
						<table class="table table-striped" border="1">
						<thead>
								<tr style="background-color: black;color: white;">
								<th>CODE</th><th>DESIGNATION</th><th>PRIX</th><th>QTE_STOCK</th><th>CATEGORIE</th>
								</tr>
							</thead>
							<tbody>
								<?php while ($et=$resultat->fetch()){?>
								<tr>
								<td><?php  echo $et['code_pro'];?></td>
								<td><?php  echo($et['designation'])?></td>
								<td><?php  echo($et['prix'])?> $</td>
								<td><?php  echo($et['qte_stock'])?></td>
								<td><?php  
								require_once('../bdd/connexion.php');
								$requser=$pdo->prepare("SELECT * FROM categorie WHERE num_categ=?");
								$requser->execute(array($et['categorie']));
								$userinfo=$requser->fetch();
								echo($userinfo['designation']);
								?></td>
								<!--liens -->
											</tr>	
									<?php $id++; } ?>	
							</tbody>
						</table>
						
			</div>
			<div class="text-center">
							<a onclick="window.print();">clic</a>
						</div>	
		
</body>
</html>
