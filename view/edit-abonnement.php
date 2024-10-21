<?php
	session_start();
	// Connection datatabase
	require_once '../bdd/connexion.php';
	require_once '../model/edit-abonnement.php';
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
	<div class="contenair space col-md-6 col-xd-12 col-md-offset-3">
	<!-- panel default ce n'est que la couleur qui va changer -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="a">EDITION ABONNEMENT</h3>
		</div>
		<div class="panel-body">
			<form method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label class="control-label">
						Designation:
					</label>
					<input type="text" name="designation" required="required" class="form-control" placeholder="Entrer la designation" value="<?= $userinfo['design_abon'] ?>">
				</div>
			  <div class="form-group">
					<label class="control-label">
						Prix($):
					</label>
					<input type="number" name="prix" required="required" class="form-control" placeholder="Entrer le Prix"  value="<?= $userinfo['prix'] ?>">
			  </div>
              <div class="form-group">
					<label class="control-label">
						Durée:
					</label>
					<input type="text" name="duree" required="required" class="form-control"   value="<?= $userinfo['duree'] ?>">
			  </div>
			   <div class="form-group">
					<label class="control-label">
						Catégorie:
					</label>
					<select name="categorie" class="form-control">
							<?php
								$ps=$pdo->prepare("SELECT * FROM categorie");
								$ps->execute();
								?>
								<option disabled="disabled">
									Choisissez une rubrique
								</option>
								<?php
									while ($s=$ps->fetch(PDO::FETCH_OBJ)) {
								?>
								<option value="<?php echo $s->num_categ; ?>">
									<?php echo $s->designation; ?>
								</option>
									<?php
									}
								?>
						</select>
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
