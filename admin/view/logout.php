<?php
	session_start();
	setcookie('username','',time()-3600);
	setcookie('mdp','',time()-3600);
	session_destroy();

	header('location:login.php');

