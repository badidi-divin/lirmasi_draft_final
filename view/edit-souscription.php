<?php
	session_start();
	// Connection datatabase
	require_once '../bdd/connexion.php';
	require_once '../model/edit-souscription.php';
	
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
						CODE ABONNE:
					</label>
					<select name="code_abonne" class="form-control">
							<?php
								$ps=$pdo->prepare("SELECT * FROM abonne ORDER BY nom DESC");
								$ps->execute();
								?>
								<option disabled="disabled">
									Choisissez une rubrique
								</option>
								<?php
									while ($s=$ps->fetch(PDO::FETCH_OBJ)) {
								?>
								<option value="<?php echo $s->code_abonne; ?>">
									<?php echo $s->code_abonne."-".$s->nom."-".$s->prenom; ?>
								</option>
									<?php
									}
								?>
						</select>
				</div>
				<div class="form-group">
					<label class="control-label">
						TYPE ABONNEMENT:
					</label>
					<select name="num_abon" class="form-control">
							<?php
								$ps=$pdo->prepare("SELECT * FROM type_abonnement");
								$ps->execute();
								?>
								<option disabled="disabled">
									Choisissez une rubrique
								</option>
								<?php
									while ($s=$ps->fetch(PDO::FETCH_OBJ)) {
								?>
								<option value="<?php echo $s->id; ?>">
									<?php echo $s->design_abon."-durée:".$s->duree."- Prix: ".$s->prix."$"; ?>
								</option>
									<?php
									}
								?>
						</select>
				</div>
			   <div class="form-group">
					<label class="control-label">
						DATE FIN:
					</label>
					<input type="date" name="date_fin" class="form-control" value="<?= $userinfoss['date_fin'];  ?>">
					
			  </div>
				<div class="control-label a">
					<button type="submit" class="btn btn-primary" name="formconnect">Edition</button>
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
