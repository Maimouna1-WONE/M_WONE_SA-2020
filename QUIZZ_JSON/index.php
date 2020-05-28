<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	<base href="./">
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="style/css/connexion.css<?php echo "?".rand();?>">
	<script type="text/javascript" src="style/JS/ScriptValidation.js"></script>
</head>
<body>
	<div id="conteneur">
		<div id="zoneG"></div>
		<div id="zoneD">
			<center>
				<label>
					<h1>Le plaisir de jouer</h1>
				</label>
			</center>
		</div>
	</div>
	
		<?php 
	if (isset($_GET['lien'])){
		if ( $_GET['lien'] == "joueur" ) {
			require_once ("./VUE/joueur.php");
		}
		else if ( $_GET['lien'] == "final" ) {
			require_once ("./VUE/fin.php");
			require_once ("./PHP/QUIZZ/JeuTerminer.php");
		}
		else if ( $_GET['lien'] == "cJoueur" ) {
				require_once ("./VUE/compteJoueur.php");
		}	
		else if ( $_GET['lien'] == "admin" ) {
				require_once ("./PHP/JOUEUR/FuncConnexion.php");
				require_once ("./VUE/menuAdmin.php");
		}
		else if ( $_GET['lien'] == "recap" ) {
			require_once ("./VUE/recap.php");
	}
	}
	else {
		if (isset($_GET['log']) && $_GET['log']=="off"){
			require_once ("./PHP/JOUEUR/FuncConnexion.php");
		require_once ("./VUE/connexion.php");
		}
		require_once ("./PHP/JOUEUR/FuncConnexion.php");
		require_once ("./VUE/connexion.php");
	}
		?>
</body>
</html
