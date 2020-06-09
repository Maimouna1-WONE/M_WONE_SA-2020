<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php
require_once ("./CONTROLLER/functionUser.php");
is_connect();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Partie Jeu</title>
    <base href="../">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="STYLE/CSS/style_quizz.css<?php echo "?".rand();?>">
    <link rel="stylesheet" href="STYLE/CSS/stylePJ.css<?php echo "?".rand();?>">
</head>

<body>
        <div class="tete">
            <img class="pp" src="./STYLE/images/<?php echo $_SESSION['avatar'];?>" alt="ppJ">
            <div class="score"><?php echo $_SESSION['score'].' pts';?></div>
            <div class="name"><h3><strong><?php echo $_SESSION['prenom'].'. '.$_SESSION['nom'];?></strong></h3></div>
            <div class="quitter">
                <form action="./CONTROLLER/deconnexion.php" method="POST">
                    <button>QUITTER</button>
                </form>
            </div>
            <div class="ligne_pj"></div>
        </div>
        <div class="partiejeu">
            <div class="jeu">
                <div class="qst"></div>
                <div class="point"></div>
            </div>
            <div class="topscore"></div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    </body>

</html>