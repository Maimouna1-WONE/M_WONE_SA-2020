<!doctype html>
<html lang="en">

<head>
    <title>Creer Question</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="../">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="STYLE/CSS/style_quizz.css<?php echo "?".rand();?>">
    <link rel="stylesheet" href="STYLE/CSS/styleCQ.css<?php echo "?".rand();?>">
</head>
<body>
<form method="post" action="./CONTROLLER/functionQuestion.php" id="question">
            
            <div class="quest ">
                <label for=" "><strong>Question</strong></label>
                <input type="text " name="libelleQ">
            </div>
            <div class="scr ">
                <label for=" "><strong>Score</strong></label>
                <input type="number" min="1" name="point">
            </div>
            <div class="slt " id="champ">
                <label><strong>Type de Reponse</strong></label>
                <select name="choix" class="type" id="type_rep">
                <option value=" ">Donnez le type de reponse</option>
                <option value="cm">Choix multiple</option>
                <option value="cs">Choix simple</option>
                <option value="ct">Choix texte</option>
              </select>
              <button type="button" style="width:38px;height:38px; border-radius:1px;border:none; margin-left:2px;" id="btn"><img style=" margin-top:-2px; margin-left:-7px;" src="./STYLE/icones/ic-ajout-reponse.png"/></button>
            </div>
            <div id="reponse"></div>
            <button class="btn_qst" name="saveQ">Save</button>
        </form>
        <script src="STYLE/JS/champ.js"></script>
    </body>

</html>