<?php
include "./PHP/QUIZZ/lqstPaginate.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Liste des questions</title>
	<base href="./">
	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="style/css/lqst.css<?php echo "?".rand();?>">
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet"> 
	
</head>
<body>
<?php
$nombre=array();
if (isset($_POST['chiff']) && !empty($_POST['chiff'])) {
	$nombre['val']=$_POST['chiff'];
	$js = json_encode($nombre);
	file_put_contents('./BD/nombre.json', $js);
}
if (!isset($_POST['chiff']) && empty($_POST['chiff'])){
		$nombre['val']=5;
            $js1=json_encode($nombre);
			file_put_contents('./BD/nombre.json',$js1);
}

?>
					<div id="dHB">
						<div id="dH">
						<form method="post" action="">
							<center id="qs">
								<label>
									<b id="nbre">Nbre de question/Jeu</b>
								</label>
							</center> 
							<input id="input11" name="chiff" type="number" value="<?php echo $nombre['val'];?>"/>
                        	<button id ="bouton1" type="submit" name="valider">
								<h4>OK</h4>
							</button>
                        </form>
					</div>
					<div id="dB">
<?php
$tab3=file_get_contents('./BD/creerQuestion.json');
$tab3=json_decode($tab3,true);
?>
<?php
$total=count($tab3);
$nbValParPage=3;
$nbrepage=ceil($total/$nbValParPage);
if ($_GET['smenu']=="lqst"){
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
}
$indDep=($pageAct-1)*$nbValParPage;
$indFin=$indDep+$nbValParPage-1;
for ($i=$indDep;$i<=$indFin;$i++){
?>
<?php paginate($tab3,$i) ?>
<?php
}
?>
					</div>
				</div>
					<div id="dF">
						<?php if ($pageEncours-1>0){ ?>
						<form method="post" action="<?php echo './index.php?lien=admin&smenu=lqst&page='.($pageEncours-1).'';?>" >
							<button id ="bouton3" type="submit" name="valider2"><center><h5>Precedent</h5></center></button>
						</form>
						<?php } ?>
						<?php if ($pageEncours<$nbrepage){ ?>
						<form method="post" action="<?php echo './index.php?lien=admin&smenu=lqst&page='.($pageEncours+1).'';?>" >
							<button id ="bouton2" type="submit" name="valider1"><center><h5>Suivant</h5></center></button>
						</form>
						<?php } ?>
					</div>
				</div>
			</div>


</body>
</html>