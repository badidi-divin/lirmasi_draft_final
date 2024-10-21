<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php  
	require_once('../bdd/connexion.php');

	$requete="SELECT * FROM abonne";	
	$resultat=$pdo->query($requete);

	// Pour Exporter
	header("Content-Type:application/vnd.ms-excel");
	header("Content-Disposition:attachment; Filename=MyData.xls");
?>
 <h2 align="center">LISTE DES ABONNES</h2>
 <table border="1">
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
                                             
                                             </tr>
                                               <?php
                                               
                                            }
                                                ?>
                                        </tbody>
                                    </table>
                                    </body>
</html>
      