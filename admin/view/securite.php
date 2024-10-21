<?php
	if (!isset($_SESSION['mdp']) || !isset($_SESSION['id'])) {
		header('location:../../index.php');
	}

