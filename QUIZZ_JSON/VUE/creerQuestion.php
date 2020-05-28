<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Creer question</title>
  <base href="./">
  <link rel="stylesheet" type="text/css" href="style/css/creerQuestion.css<?php echo "?".rand();?>">
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet"> 
  <script type="text/javascript" src="style/JS/champ.js"></script>
  <script type="text/javascript" src="style/JS/ScriptValidationQ.js"></script>
  <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
</head>
<body>

		
          <div id="dH">
            <label id="pq"><b id="qu"></br>PARAMETRER VOTRE QUESTION</b></label>
          </div>
					<div id="dM">
            <form method="post" onsubmit="return Submit1();" action="./PHP/QUIZZ/question.php" id="question">
            <div id="dM1">
              &nbsp;&nbsp;</br></br>
              <label id="qs">Question</label>
              <input id="input1q" class="text" type="text" name="question"/>
            </div>
            <div id="dM2">
              <label>Nbre de points</label>
              <input id="input2q" class="text" type="number" min="1" name="nbre"/>
            </div>
            <div id="dM3">
              <label>Type de Reponse</label>
              <select name="choise" id="type" class="text">
                <option value="">Donnez le type de reponse</option>
                <option value="cm" >Choix multiple</option>
                <option value="cs" >Choix simple</option>
                <option value="ct" >Choix texte</option>
              </select>
              <span id="ligne[1]"></br></span> 
              <span id="leschamps[2]"><button type=submit style="width:38px;height:38px; border-radius:1px;border:none; margin-left:2px;" onclick="create_champ(2);"><img style=" margin-top:-2px; margin-left:-7px;" src="./style/icone/ic-ajout-reponse.png"/></button></span>
            </div>
            <div id="dM4"></div>
            <div id="dM5">
              <button id ="bouton2" type="submit" name="valider1">
                <h3>Enregistrer</h3>
              </button>
            </div> 
            </form>
			    </div>
        </div>
		  </div>
    
  

</body> 
</html> 