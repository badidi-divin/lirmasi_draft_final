<?php  
	require_once('../bdd/connexion.php');
    $id=1;
	$requete="SELECT * FROM achat";	
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
 <h2 align="center">GESTION DE COMMANDES</h2>
 <table border="1">
 <thead>
								<tr>
									<th>CODE_OP</th><th>PRODUIT</th><th>CODE_ABONNE</th><th>NOM</th><th>PRIX</th><th>QTE_COM</th><th>PT</th><th>DATE_ACHAT</th>
								</tr>
							</thead>
							<tbody>
								<?php while ($et=$resultat->fetch()){?>
								<tr>
								<td><?php  echo($et['num_achat'])?></td>
								<td><?php  
								require_once('../bdd/connexion.php');
								$requser=$pdo->prepare("SELECT * FROM produit WHERE code_pro=?");
								$requser->execute(array($et['code_produit']));
								$userinfo=$requser->fetch();
								echo $userinfo['designation'];?></td>
								<td><?php  echo($et['code_abonne'])?></td>
								<td><?php  echo($et['nom'])?></td>
								<td><?php  echo($et['prix'])?> $</td>
								<td><?php  echo($et['qte_com'])?> </td>
								<td><?php  echo($et['pt'])?></td>
								<td><?php  echo($et['date_achat'])?></td>
                                            </tr>   
                                    <?php ; } ?>   
                            </tbody>
                                    </table>
    </body>
</html>
      