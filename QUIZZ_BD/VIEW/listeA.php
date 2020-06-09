<!doctype html>
<html lang="en">

<head>
    <title>Liste Admin</title>
    <base href="../">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="STYLE/CSS/style_quizz.css<?php echo "?".rand();?>">
    <link rel="stylesheet" href="STYLE/CSS/styleLA.css<?php echo "?".rand();?>">
</head>


<body>
    <div class="pagineA">
<?php
require_once ("./MODEL/modele.php");
require_once ("./CONTROLLER/listeAdmin.php");
        $bdd=connexion();
        $req8=getAdmin();
        while ($tab=$req8->fetch(PDO::FETCH_ASSOC)){
            $Tab[]=$tab; 
        }
        $total=count($Tab);
			$nbValParPage=1;
			$nbrepage=ceil($total/2);
			if (isset($_GET['page'])){
				$pageAct=$_GET['page'];
				$pageEncours=$pageAct;
				if( ($pageAct>$nbrepage) ){
					$pageAct=$nbrepage;
				}
			}
			else{
				$pageAct=1;
				$pageEncours=1;
			}
			$indDep=($pageAct-1)*$nbValParPage;
			$indFin=$indDep+$nbValParPage-1;
			for ($i=$indDep;$i<=$indFin;$i++){ 
				$k = ($pageAct-1)*2;
				paginateA($Tab,$i,$k);
			}
        ?>
        </div>
        <div class="btnPage">
        <?php if ($pageEncours-1>0){ ?>
					<form method="post" action="<?php echo './index.php?lien=admin&smenu=listeA&page='.($pageEncours-1).'';?>" >
						<button id ="bouton3" type="submit" name="valider"><center><h5>Precedent</h5></center></button>
					</form>
						<?php } ?>
						<?php if ($pageEncours<$nbrepage){ ?>
					<form method="post" action="<?php echo './index.php?lien=admin&smenu=listeA&page='.($pageEncours+1).'';?>" >
						<button id ="bouton2" type="submit" name="valider"><center><h5>Suivant</h5></center></button>
					</form>
						<?php } ?>
                        </div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js " integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1 " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js " integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM " crossorigin="anonymous "></script>
</body>

</html>