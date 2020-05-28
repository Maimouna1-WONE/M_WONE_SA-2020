<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Compte joueur</title>
  <base href="./">
  <script type="text/javascript" src="style/JS/ScriptUserPwd.js"></script>
  <script type="text/javascript" src="style/JS/ScriptImageJoueur.js"></script>
  <script type="text/javascript" src="style/JS/ScriptValidation.js"></script>
  <link rel="stylesheet" type="text/css" href="style/css/compteJoueur.css<?php echo "?".rand();?>">
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet"> 
	
</head>
<body>
  <footer>
		<div id="form">
      <div id=gauche>
        <div id="GH">
          </br>&nbsp;&nbsp;
          <label>
            <b>S'INSCRIRE</b>
          </label>
          </br>&nbsp;&nbsp;
          <label>Pour tester votre niveau de culture generale</label>
        </div>
        <form method="POST" action="./PHP/JOUEUR/js2.php" onsubmit="return Submit();" id="compte" enctype="multipart/form-data">
        <div id="GM">
          <div id="GM1">
            &nbsp;&nbsp;
            <label>Prenom</label></br>
            <input id="input1j"  class="text" type="text" placeholder="Jooo" name="prenom" pattern="(^[A-Z][a-z]+$)" title="le prenom commence par une lettre majuscule"/>
          </div>
          <div id="GM2">
            &nbsp;&nbsp;
            <label>Nom</label></br>
            <input id="input1j"  class="text" type="text" placeholder="MMMM" name="nom" pattern="([A-Z]+)" title="le nom est ecrit en lettre capitale"/>
          </div>
          <div id="GM3">
            &nbsp;&nbsp;
            <label>Login</label></br>
            <input id="input1j"  class="text" type="text" placeholder="jooo" name="login" pattern="([a-z]+)" title="le login est ecrit en lettre minuscule"/>
          </div>
          <div id="GM4">
            &nbsp;&nbsp;
            <label>Password</label></br>
            <input id="pwd"  class="text" type="password" placeholder="....." name="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Doit contenir au moins un chiffre et une lettre majuscule et minuscule, et contenir au moins 8 caractères" onkeyup="checkPass();"/>
          </div>
          <div id="GM5">
            &nbsp;&nbsp;
            <label>Confirmer Password</label></br>
            <input id="pwd1"  class="text" type="password" placeholder="....." name="pwd1" onkeyup="checkPass();"/>
            <span id="confirm-message2" class="confirm-message"></span>
          </div>
          <div class="GM6">
            <label>Avatar :</label>
            <img id="myimage1" src="" width="100" height="300" alt="img...">
            <button class="btn-upload">Choisir le fichier</button>
            <input type="file" name="upfile"  onchange="onFileSelected(event)"/>
          </div>
        </div>
        <div id="GB">
          <button id ="bouton2" type="submit" name="valider1">
            <center>
              <h5>Creer compte</h5>
            </center>
          </button>
        </div> 
        </form>
      </div>
		  <div id="droite">
        <img id="top" src="" height="100" alt="img...">
        <label>
          <h6>Avatar du joueur</h6>
        </label>
      </div>
    </div>
</footer>


</body>
</html>