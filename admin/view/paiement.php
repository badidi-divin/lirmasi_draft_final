<?php
	session_start();
	require_once("../../bdd/connexion.php");
	require_once('../../model/selection_paie.php');
	$id=1;
?>
<!DOCTYPE html>
<html>
	<?php require_once('head.php'); ?>
	<body>
		<div class="header">
			<div class="header-left">
				<div class="menu-icon bi bi-list"></div>
				<div
					class="search-toggle-icon bi bi-search"
					data-toggle="header_search"
				></div>
				<div class="header-search">
					<form method="get" action="">
						<div class="form-group mb-0">
							<i class="dw dw-search2 search-icon"></i>
							<input
								name="motcle" value="<?php echo $mc ?>"
								type="text"
								class="form-control search-input"
								placeholder="Rechercher ..."
							/>
					</div>
				</form>
				</div>
					
			</div>
			<div class="header-right">
				<div class="dashboard-setting user-notification">
					<div class="dropdown">
						<a
							class="dropdown-toggle no-arrow"
							href="javascript:;"
							data-toggle="right-sidebar"
						>
							<i class="dw dw-settings2"></i>
						</a>
					</div>

				</div>
				
				<div class="user-info-dropdown">
					<div class="dropdown">
						<a
							class="dropdown-toggle"
							href="#"
							role="button"
							data-toggle="dropdown"
						>
							
							<span class="user-name"><?php echo $_SESSION['nom'] ?></span>
						</a>
						<div
							class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
						>
							<a class="dropdown-item" href="profile.php"
								><i class="dw dw-user1"></i> Profile</a
							>
							<a class="dropdown-item" href="logout.php"
								><i class="dw dw-logout"></i> Se Déconecter</a
							>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php  require_once('theme.php');

		?>

		<?php require_once('menu-sidebar.php'); ?>

		<div class="mobile-menu-overlay"></div>

		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
				
					<!-- Checkbox select Datatable End -->
					<!-- Export Datatable start -->
					<div class="card-box mb-30">
						<div class="pd-20">
							<h4 class="text-blue h4">LISTE DES PRODUITS ACHETES: (<?php
									$nbcontact=$pdo->prepare('SELECT * FROM achat');
									$nbcontact->execute();
									$nbcontact=$nbcontact->fetchAll();
									echo count($nbcontact); 
								?>)</h4> <a href="../../view/ajout-achat.php" class="btn btn-primary">Ajouter</a>
								&nbsp;&nbsp;
						  <a href="../../view/export8.php" class="btn btn-success" title="Exporter vers Excel" name="export1">Excel</a>
						</div>
						<div class="pb-20">
							<div class="table-responsive table--no-card m-b-30">
								<table class="table hover multiple-select-row data-table-export nowrap">
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
								require_once('../../bdd/connexion.php');
								$requser=$pdo->prepare("SELECT * FROM produit WHERE code_pro=?");
								$requser->execute(array($et['code_produit']));
								$userinfo=$requser->fetch();
								echo $userinfo['designation'];?></td>
								<td><?php  echo($et['code_abonne'])?></td>
								<td><?php  echo($et['nom'])?></td>
								<td><?php  echo($et['prix'])?> $</td>
								<td><?php  echo($et['qte_com'])?> </td>
								<td><?php  echo($et['pt'])?>$</td>
								<td><?php  echo($et['date_achat'])?></td>
								<!--liens -->
								<td><a onclick="return confirm('Etes-vous sûre...?');" href="../../model/supprimer-paiement.php?id=<?php echo($et['num_achat'])?>" class="btn btn-danger">Supprimer</a></td>
								<td><a href="facture-paiement.php?id=<?php echo($et['code_abonne'])?>&nom=<?php echo($et['nom'])?>&dates=<?php echo($et['date_achat'])?>" class="btn btn-success">Facture</a></td>
											</tr>	
									<?php } ?>	
							</tbody>
								</table>
						</div>
					</div>
					</div>
				</div>

				</div>
					<!-- Export Datatable End -->
				</div>

				<div class="footer-wrap pd-20 mb-20 card-box">
					

				</div>

		<!-- welcome modal end -->
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
		<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
		<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
		<!-- buttons for Export datatable -->
		<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
		<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
		<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
		<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
		<!-- Datatable Setting js -->
		<script src="vendors/scripts/datatable-setting.js"></script>
		<!-- Google Tag Manager (noscript) -->
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>

