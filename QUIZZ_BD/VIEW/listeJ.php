<!doctype html>
<html lang="en">

<head>
    <title>Liste Joueur</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <base href="../">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="STYLE/CSS/style_quizz.css<?php echo "?".rand();?>">
    <link rel="stylesheet" href="STYLE/CSS/styleLJ.css<?php echo "?".rand();?>">
</head>
<body>
    
<div class="pagineA">
<?php
require_once ("./MODEL/modele.php");
require_once ("./CONTROLLER/listeJoueur.php");
        $bdd=connexion();
        $req7=getPlayers();
        while ($tab4=$req7->fetch(PDO::FETCH_ASSOC)){ $Tab[]=$tab4;}
        $total=count($Tab);
			$nbValParPage=1;
			$nbrepage=ceil($total/1);
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
				$k = ($pageAct-1)*1;
				paginateJ($Tab,$i,$k);
			}

        ?>
        </div>
        <div class="btnPage">
		<div class="pagination">

		<?php for ($j=1;$j<=$nbrepage;$j++){
			if ($pageEncours==$j){
			?>    
    <?php echo '<a class="active" href="./index.php?lien=admin&smenu=listeJ&page=' .$j. '">' .$j. '</a> '; ?>
			<?php  }
		
		else{
			?>    
    <?php echo '<a href="./index.php?lien=admin&smenu=listeJ&page=' .$j. '">' .$j. '</a> '; ?>
			<?php  }

		} ?>

		

  		</div>
		
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js " integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1 " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js " integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM " crossorigin="anonymous "></script>
</body>

</html>