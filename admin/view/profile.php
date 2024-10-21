<?php
	session_start();
	require_once('../../bdd/connexion.php');
?>
<!DOCTYPE html>
<html>
	<?php require_once('head.php'); ?>
	<body>
		

		<?php require_once('head2.php');

		?>
		<?php require_once('theme.php'); ?>

		<?php  require_once('menu-sidebar.php'); ?>

		<div class="mobile-menu-overlay">
			
		</div>

		<div class="main-container">
			<div class="pd-ltr-20 xs-pd-20-10">
				<div class="min-height-200px">
					<div class="page-header">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="title">
								</div>
								<nav aria-label="breadcrumb" role="navigation">
									<ol class="breadcrumb">
										<li class="breadcrumb-item">
											
										</li>
										<li class="breadcrumb-item active" aria-current="page">
											Profile
										</li>
										
									</ol>
								</nav>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
							<div class="card-box height-100-p overflow-hidden">
								<div class="profile-tab height-100-p">
									<div class="tab height-100-p">
										
										<div class="tab-content">
											<!-- Timeline Tab start -->
												<div class="profile-setting">
													<?php
														if (!empty($errors)):
													?>
													<div class="alert alert-danger">
														<p></p>
															<ul>
																<?php foreach($errors as $error):?>
																	<li><?= $error; ?></li>
																<?php endforeach; ?>
															</ul>
														</div>

														<?php endif; ?>
													<?php
														if (!empty($success)):
													?>
													<div class="alert alert-success">
														<p></p>
															<ul>
																<?php foreach($success as $successs):?>
																	<li><?= $successs; ?></li>
																<?php endforeach; ?>
															</ul>
														</div>

														<?php endif; ?>
													<form method="post" action="../../model/profile-edit.php">
														<ul class="profile-edit-list row">
															<li class="weight-500 col-md-6">
																<h4 class="text-blue h5 mb-20">
																	Edition du Profile
																</h4>
																<div class="form-group">
																	<label>Nom d'utilisateur</label>
																	<input
																		class="form-control form-control-lg"
																		type="text" value="<?= $_SESSION['nom']; ?>" name="nom" required="required"
																	/>
																</div>
																<div class="form-group">
																	<label>Mot de passe</label>
																	<input
																		class="form-control form-control-lg"
																		type="password" value="<?= $_SESSION['password']; ?>" name="mdp" required="required"
																	/>
																</div>
																
																<div class="form-group mb-0">
																	<button type="submit" class="btn btn-primary btn btn-block btn-lg" name="save">Mettre à jour</button>
																</div>
															</li>
														</ul>
													</form>
												</div>
											</div>
											<!-- Setting Tab End -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-wrap pd-20 mb-20 card-box">
									
				</div>
			</div>
		</div>
		<!-- js -->
		<script src="vendors/scripts/core.js"></script>
		<script src="vendors/scripts/script.min.js"></script>
		<script src="vendors/scripts/process.js"></script>
		<script src="vendors/scripts/layout-settings.js"></script>
		<script src="src/plugins/cropperjs/dist/cropper.js"></script>
		<script>
			window.addEventListener("DOMContentLoaded", function () {
				var image = document.getElementById("image");
				var cropBoxData;
				var canvasData;
				var cropper;

				$("#modal")
					.on("shown.bs.modal", function () {
						cropper = new Cropper(image, {
							autoCropArea: 0.5,
							dragMode: "move",
							aspectRatio: 3 / 3,
							restore: false,
							guides: false,
							center: false,
							highlight: false,
							cropBoxMovable: false,
							cropBoxResizable: false,
							toggleDragModeOnDblclick: false,
							ready: function () {
								cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
							},
						});
					})
					.on("hidden.bs.modal", function () {
						cropBoxData = cropper.getCropBoxData();
						canvasData = cropper.getCanvasData();
						cropper.destroy();
					});
			});
		</script>
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>

