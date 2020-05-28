<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Creation compte admin</title>
	<base href="./">
	<script type="text/javascript" src="style/JS/ScriptUserPwd.js"></script>
	<script type="text/javascript" src="style/JS/ScriptImageAdmin.js"></script>
	<script type="text/javascript" src="style/JS/ScriptValidation.js"></script>
	<link rel="stylesheet" type="text/css" href="style/css/compteAdmin.css<?php echo "?".rand();?>">
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet"> 
	
</head>
<body>
	

					<div id="dG">
						<div id="dGH">
							<p>S'INSCRIRE</p>
							&nbsp;&nbsp;&nbsp;
							<center>
								<label id="pro">Pour proposer des quizz</label>
							</center>
						</div>
						<form method="post" onsubmit="return Submit();" action="./PHP/JOUEUR/js1.php" id="compte"  enctype="multipart/form-data">
							<div id="dGM">
								<div id="dGM1">
									&nbsp;&nbsp;
									<label id="p">Prenom</label></br>
									<input id="input1a" type="text" placeholder="Jooo" name="prenom" pattern="(^[A-Z][a-z]+$)" title="le prenom commence par une lettre majuscule"/>
								</div>
								<div id="dGM2">
									&nbsp;&nbsp;
									<label id="n">Nom</label></br>
									<input id="input2a" class="text" type="text" placeholder="MMMM" name="nom" pattern="([A-Z]+)" title="le nom est ecrit en lettre capitale"/>
								</div>
								<div id="dGM3">
									&nbsp;&nbsp;
									<label>Login</label></br>
									<input id="input3a" class="text" type="text" placeholder="jooo" name="login" pattern="([a-z]+)" title="le login est ecrit en lettre minuscule"/>
								</div>
								<div id="dGM4">
									&nbsp;&nbsp;
									<label>Password</label></br>
									<input id="pwd" class="text" type="password" placeholder="....." name="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Doit contenir au moins un chiffre et une lettre majuscule et minuscule, et contenir au moins 8 caractères" onkeyup="checkPass();"/>
								</div>
								<div id="dGM5">
									&nbsp;&nbsp;
									<label>Confirmer Password</label></br>
									<input id="pwd1"  class="text" type="password" placeholder="....." name="pwd1" onkeyup="checkPass();"/>
									<span id="confirm-message2" class="confirm-message"></span>
								</div>
								<div class="dGM6">
									&nbsp;&nbsp;
									<label>Avatar :</label>
									<img id="myimage1" src="" height="100" alt="img...">
									<button class="btn-upload">Choisir le fichier</button>
									<input type="file" name="upfile"  onchange="onFileSelected(event)"/>
								</div>
							</div>
							<div id="dGB">
								<button id ="bouton2" type="submit" name="valider1">
									<center>
										<h5>Creer compte</h5>
									</center>
								</button>
							</div>
						</form>
					</div>
				<img id="dD" src="" height="100" alt="img...">
				<label><h6>Avatar Admin</h6></label>
				</div>
			</div>	
		

</body>
</html>