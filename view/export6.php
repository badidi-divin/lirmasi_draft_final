<?php  
	require_once('../bdd/connexion.php');
    $id=1;
	$requete="SELECT * FROM souscription";	
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
 <h2 align="center">GESTION DE SOUSCRIPTION</h2>
 <table border="1">
 <thead>
								<tr>
									<th>NUMERO</th><th>CODE_ABONNE</th><th>NOM</th><th>TYPE_ABONNEMENT</th><th>MONTANT</th><th>DUREE</th><th>DATE_SOUSCRIPTION</th>
								</tr>
							</thead>
							<tbody>
								<?php while ($et=$resultat->fetch()){?>
								<tr>
								<td><?php  echo($et['code_op'])?></td>
								<td><?php  echo($et['code_abonne'])?></td>
								<td><?php  echo($et['nom'])?></td>
								<td><?php 
								 require_once('../bdd/connexion.php');
								 $requser=$pdo->prepare("SELECT * FROM type_abonnement WHERE id=?");
								 $requser->execute(array($et['num_abon']));
								 $userinfo=$requser->fetch();
								 echo($userinfo['design_abon']);?></td>
								<td><?php  echo($et['montant']."$");?></td>
								<td><?php  echo($et['duree']);?></td>
								<td><?php  echo($et['date'])?></td>
                                            </tr>   
                                    <?php ; } ?>   
                            </tbody>
                                    </table>
    </body>
</html>
      