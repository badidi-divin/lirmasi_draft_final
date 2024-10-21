<?php

	if (isset($_POST['formconnect'])) {

		$nom=htmlspecialchars($_POST['nom']);

		$password=md5($_POST['password']);

		if (!empty($nom) AND !empty($password)) {

			// Vérification si l'utilisateur existe vraiment
			$requiser=$pdo->prepare("SELECT * FROM user WHERE username=? AND password=?");
			$requiser->execute(array($nom,$password));
			// rowCount permet de compter le nombre saisie par le user
			$userexist=$requiser->rowCount();
			if ($userexist==1) {
				$userinfo=$requiser->fetch();
				$_SESSION['id_user']=$userinfo['id'];
				$_SESSION['nom']=$userinfo['username'];
				$_SESSION['password']=$userinfo['password'];
				$_SESSION['role']=$userinfo['role'];
				header("Location: profile.php");		
			}
			else
			{
				$erreur="Mauvais Pseudo ou mauvais mot de passe! ";
			}
			
		}
		else
		{
			$erreur="Tous les champs doivent etre completés";
		}

	}