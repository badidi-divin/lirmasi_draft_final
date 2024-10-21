<?php
	session_start();
	// Connection datatabase
	require_once '../../bdd/connexion.php';
	require_once '../../model/authentification.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<!-- Basic Page Info -->
		<?php require_once('header.php'); ?>
	</head>
	<body class="login-page">
			<div class="contenair-fluid col-md-offset-3" style="margin-top:50px">
						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">AUTHENTIFICATION</h2>
							</div>
							<form method="post" action="">
								<div class="input-group custom">
									<input
										type="text"
										class="form-control form-control-lg"
										placeholder="Nom d'utilisateur" name="nom"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="icon-copy dw dw-user1"></i
										></span>
									</div>
								</div>
								<div class="input-group custom">
									<input
										type="password"
										class="form-control form-control-lg"
										placeholder="Mot de passe" name="password"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="dw dw-padlock1"></i
										></span>
									</div>
								</div>
								<div class="row pb-30">
									<div class="col-6">
										
									</div>
								
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">

											<button type="submit" class="btn btn-primary btn btn-block btn-lg" name="formconnect">Se Connecter</button>
										</div>
									
									</div>
								</div>
							</form>
							<?php
								if (isset($erreur)) {
									echo "<font color='red'>".$erreur."</font>";
									}
							?>
						</div>
					</div>
				</div>

		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<!-- Google Tag Manager (noscript) -->
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>
