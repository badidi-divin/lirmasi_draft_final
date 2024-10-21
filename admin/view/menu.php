<?php
	require_once('../../bdd/connexion.php');
?>
<div class="menu-block customscroll">
				<div class="sidebar-menu">
					<ul id="accordion-menu">
						
						<li class="dropdown">
							<a href="profile.php" class="dropdown-toggle">
								<span class="micon bi bi-house"></span
								>Profile
							</a>
		
						</li>
							<li class="dropdown">
								<a href="javascript:;" class="dropdown-toggle" title="Gérer l'apparence du site web">
									<span class="micon bi bi-textarea-resize"></span
									><span class="mtext">Gérer</span>
								</a>
								<ul class="submenu">	
									<?php if ($_SESSION['role']=='admin') {
										?>
										<li><a href="produit.php" >Produit(<?php
						                $nblmd=$pdo->prepare('SELECT * FROM produit');
						                $nblmd->execute();
						                $nblmd=$nblmd->fetchAll();
						                echo count($nblmd);
						                ?>)
						                </a>
						            </li>
									<li><a href="abonnement.php">Abonnement (<?php
							                $nblmd=$pdo->prepare('SELECT * FROM type_abonnement');
							                $nblmd->execute();
							                $nblmd=$nblmd->fetchAll();
							                echo count($nblmd);
                                	?>)</a></li>
									<?php }
									 ?>
									
									<li><a href="abonne.php">Abonnés(<?php
						                $nblmd=$pdo->prepare('SELECT * FROM abonne');
						                $nblmd->execute();
						                $nblmd=$nblmd->fetchAll();
						                                    echo count($nblmd);
						                                ?>)</a></li>
						            <li><a href="souscription.php">Souscription(<?php
                						$nblmd=$pdo->prepare('SELECT * FROM souscription');
                						$nblmd->execute();
                						$nblmd=$nblmd->fetchAll();
                                    	echo count($nblmd);
                                		?>)</a></li>
                                	<li><a href="paiement.php">Achat Produit(<?php
					                $nblmd=$pdo->prepare('SELECT * FROM achat');
					                $nblmd->execute();
					                $nblmd=$nblmd->fetchAll();
					                                    echo count($nblmd);
					                                ?>)</a>
					            </li>	
						</ul>
				</div>
			</div>