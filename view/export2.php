<?php  
	require_once('../bdd/connexion.php');

	$requete="SELECT * FROM type_abonnement";	
	$resultat=$pdo->query($requete);

	// Pour Exporter
	header("Content-Type:application/vnd.ms-excel");
	header("Content-Disposition:attachment; Filename=MyData.xls");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <h2 align="center">LISTE DES TYPE DES ABONNEMENTS</h2>
 <table border="1">
 <thead>
								<tr>
								<th>CODE</th><th>DESIGNATION</th><th>PRIX</th><th>CATEGORIE</th>
								</tr>
							</thead>
							<tbody>
								<?php while ($et=$resultat->fetch()){?>
								<tr>
								<td><?php  echo $et['id'];?></td>
								<td><?php  echo($et['design_abon'])?></td>
								<td><?php  echo($et['prix'])?> $</td>
								<td><?php  
								require_once('../bdd/connexion.php');
								$requser=$pdo->prepare("SELECT * FROM categorie WHERE num_categ=?");
								$requser->execute(array($et['num_categ']));
								$userinfo=$requser->fetch();
								echo($userinfo['designation']);
								?></td>
                                             
                                             </tr>
                                               <?php
                                               
                                            }
                                                ?>
                                        </tbody>
                                    </table>
    </body>
</html>
    
      