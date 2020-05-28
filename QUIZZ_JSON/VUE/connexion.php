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
	
	
	<footer>
		<div id="form">	
			<div id="formHaut">
				<label>
					<h2>Login form</h2>
				</label>
			</div>
			<div id="formBas">
				<form method="post" onsubmit="return Submit();" action="./index.php?action=connexion.php" id="connexion">
					<div id="formBas1">
						<input id="input1" class="text" type="text" placeholder="login" name="login"/>
					</div>
					<div id="formBas2">
						<input id ="input2" class="text" type="password" placeholder="password" name="pwd"/>
					</div>
					<div id="formBas3">
						<button id ="bouton" type="submit" name="valider">
							<h3>Connexion</h3>
						</button>
					<a id="clic" href="./index.php?lien=cJoueur">S'inscrire pour jouer ?</a>
					</div>
				</form>
			</div>	
		</div>
</footer>

</body>
</html>