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
    <title>Menu Admin</title>
    <base href="../">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="STYLE/CSS/style_quizz.css<?php echo "?".rand();?>">
    <link rel="stylesheet" href="STYLE/CSS/styleMA.css<?php echo "?".rand();?>">
</head>

<body>
        <div class="tete">
            <img class="ppA" src="./STYLE/images/<?php echo $_SESSION['avatar'];?>" alt="ppA">
            <div class="nameA"><?php echo $_SESSION['prenom'].'. '.$_SESSION['nom'];?></div>
            <div class="deconnexion">
                <form action="./CONTROLLER/deconnexion.php" method="POST">
                    <button>Deconnexion</button>
                </form>
            </div>
            <div class="ligne_pj"></div>
        </div>
        <div class="topnav">
            <a href="./index.php?lien=admin&smenu=listeQ">Liste Questions</a>
            <a href="./index.php?lien=admin&smenu=creerQ">Creer Question</a>
            <a href="./index.php?lien=admin&smenu=listeA">Liste Admin</a>
            <a href="./index.php?lien=admin&smenu=compteA">Creer Admin</a>
            <a href="./index.php?lien=admin&smenu=listeJ">Liste Joueurs</a>
        </div>
        <div class="bas">
            <?php 
				
					if  (isset($_GET['smenu'])) {
                        if ($_GET['smenu']=="listeQ" ) {
							require_once ("./VIEW/listeQ.php");
                        }
                        if ($_GET['smenu']=="creerQ" ) {
							require_once ("./VIEW/creerQ.php");
						}
						if ($_GET['smenu']=="listeA" ) {
							require_once ("./VIEW/listeA.php");
                        }
                        if ($_GET['smenu']=="compteA" ) {
							require_once ("./VIEW/compteA.php");
						}
						if ($_GET['smenu']=="listeJ" ) {
							require_once ("./VIEW/listeJ.php");
						}
						
					}
				else {require_once ("./VIEW/dashbord.php");
					 }
					 
					 ?>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js " integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1 " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js " integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM " crossorigin="anonymous "></script>
</body>

</html>