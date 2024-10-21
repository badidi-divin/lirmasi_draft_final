<?php
	session_start();
	// Connection datatabase
	require_once '../bdd/connexion.php';
	require_once '../model/edit-paie.php';
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width-device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../includes/css/bootstrap.css">
	<style type="text/css">
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
	<!-- Navigation -->
		<div class="navbar navbar-inverse navbar-fixed-top">
			<!--cette class utilisé c pour avoir une barre de navigation horizontal -->
			<?php require_once('menu.php') ?>
		</div>
	<!-- navigation end -->
<div class="contenair space col-md-6 col-xd-12 col-md-offset-3">
	<!-- panel default ce n'est que la couleur qui va changer -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="a">EDITION</h3>
		</div>
		<div class="panel-body">
			<form method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label class="control-label">
						Code Apprenant:
					</label>
					<select name="code_apprenant" class="form-control">
							<?php
								$ps=$pdo->prepare("SELECT * FROM inscription");
								$ps->execute();
								?>
								<option disabled="disabled">
									Choisissez une rubrique
								</option>
								<?php
									while ($s=$ps->fetch(PDO::FETCH_OBJ)) {
								?>
								<option value="<?php echo $s->code_apprenant; ?>">
									<?php echo $s->code_apprenant."(".$s->formation."-".$s->montant_a_payer." $)"; ?>
								</option>
									<?php
									}
								?>
						</select>
				</div>
			   <div class="form-group">
					<label class="control-label">
						Montant Payé:
					</label>
					<input type="text" name="montant_payer" required="required" class="form-control" placeholder="Montant" value="<?= $userinfo['montant_payer'] ?>">
			  </div>
				<div class="control-label a">
					<button type="submit" class="btn btn-primary" name="formconnect">Editer</button>
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
</body>
</html>
