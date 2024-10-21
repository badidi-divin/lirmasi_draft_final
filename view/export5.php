<?php  
	require_once('../bdd/connexion.php');
    $id=1;
	$requete="SELECT * FROM bonus";	
	$resultat=$pdo->query($requete);

	// Pour Exporter
	header("Content-Type:application/vnd.ms-excel");
	header("Content-Disposition:attachment; Filename=MyData.xls");
?>
 <h2 align="center">GESTION DE BONUS</h2>
 <table border="1">
                                    <thead>
                                <tr>
                                    <th>ID</th><th>CODE-APRENANT</th><th>NOMBRE-INSCRIPTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($et=$resultat->fetch()){?>
                                <tr>
                                <td><?php  echo $id;?></td>
                                <td><?php  echo($et['code_apprenant'])?></td>
                                <td><?php  echo($et['nombre_inscript'])?></td>
                                            </tr>   
                                    <?php $id++; } ?>   
                            </tbody>
                                    </table>
    
      