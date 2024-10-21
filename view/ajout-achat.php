<?php
	session_start();
	// Connection datatabase
	require_once '../bdd/connexion.php';
	require_once '../model/ajout-commande.php';
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width-device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../includes/css/bootstrap.css">
	<link rel="stylesheet" href="../Vendor/auto-completion/style-n.css">
    <link rel="stylesheet" href="../Vendor/auto-completion/jquery-ui.css">
    <link rel="stylesheet" href="../Vendor/auto-completion/jquery-ui.min.css">
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
			<h3 class="a">AJOUT</h3>
		</div>
		<div class="panel-body">
			<form method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label class="control-label">
						CODE ABONNE:
					</label>
					<input type="text" name="code_abonne" id="abonne_name" class="form-control">
				</div>
				<div class="form-group">
					<label class="control-label">
						PRODUIT:
					</label>
					<select name="code_produit" class="form-control">
							<?php
								$ps=$pdo->prepare("SELECT * FROM produit");
								$ps->execute();
								?>
								<option disabled="disabled">
									Choisissez une rubrique
								</option>
								<?php
									while ($s=$ps->fetch(PDO::FETCH_OBJ)) {
								?>
								<option value="<?php echo $s->code_pro; ?>">
									<?php echo $s->designation."- Prix: ".$s->prix."$"."- Qte-Stock: ".$s->qte_stock; ?>
								</option>
									<?php
									}
								?>
						</select>
				</div>
			   <div class="form-group">
					<label class="control-label">
						QTE COM:
					</label>
					<input type="number" name="qte_com" class="form-control">
					
			  </div>
				<div class="control-label a">
					<button type="submit" class="btn btn-primary" name="formconnect">Enregistrer</button>
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
	<script src="../Vendor/auto-completion/jquery.min.js"></script>
    <script src="../Vendor/auto-completion/jquery-3.2.1.min.js"></script>
    <script src="../Vendor/auto-completion/jquery-ui.min.js"></script>
    <script src="../Vendor/auto-completion/script.js"></script>
    <script src="../Vendor/auto-completion-2/script.js"></script>
</body>
</html>
