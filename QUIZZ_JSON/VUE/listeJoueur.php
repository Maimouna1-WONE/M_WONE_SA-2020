<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php
include "./PHP/JOUEUR/listeJoueurDroite.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Liste Joueurs</title>
	<base href="./">
	<link rel="stylesheet" type="text/css" href="style/css/listeJoueur.css<?php echo "?".rand();?>">
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
</head>
<body>
	
					<div id="dH">
						<center>
							<label>
								<b id="lj"></br>LISTE DES JOUEURS PAR SCORE</b>
							</label>
						</center>
					</div>
					<div id="dM">
		<?php
		$tab4=file_get_contents('./BD/compteUser.json');
		$tab4=json_decode($tab4,true);
			$total=count($tab4);
			$nbValParPage=1;
			$nbrepage=ceil($total/7);
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
			//$valu=file_get_contents('./BD/nombre.json');
			//$valu=json_decode($valu,true);
			//echo $valu['Score'];
			//$js=modifieScore($tab4,$_SESSION['Prenom'],$_SESSION["Nom"],"J",$valu['Score']);
			//$js=file_get_contents('./BD/compteUser.json');
			//$mod=json_decode($js,true);
			$j=lesjoueur($tab4);
			//var_dump($j);
			usort($j,"cmp");
			for ($i=$indDep;$i<=$indFin;$i++){ 
				$k = ($pageAct-1)*7;
				paginateJ($j,$i,$k);
			}
		?>
					</div>
					<div id="dB">
						<?php if ($pageEncours-1>0){ ?>
					<form method="post" action="<?php echo './index.php?lien=admin&smenu=listeJ&page='.($pageEncours-1).'';?>" >
						<button id ="bouton3" type="submit" name="valider"><center><h5>Precedent</h5></center></button>
					</form>
						<?php } ?>
						<?php if ($pageEncours<$nbrepage){ ?>
					<form method="post" action="<?php echo './index.php?lien=admin&smenu=listeJ&page='.($pageEncours+1).'';?>" >
						<button id ="bouton2" type="submit" name="valider"><center><h5>Suivant</h5></center></button>
					</form>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	


</body>
</html>