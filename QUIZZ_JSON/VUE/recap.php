<?php
include "./PHP/JOUEUR/FuncConnexion.php";
is_connect();
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Score</title>
	<base href="./">
	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="style/css/fin.css<?php echo "?".rand();?>">
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet">

</head>
<body>
	<footer>
    <div id="form">
	<div id="rep">
<center>
<?php
$valu=file_get_contents('./BD/nombre.json');
$valu=json_decode($valu,true);
if (!empty($valu["True"])) {
foreach($valu['True'] as $entry) {
	echo '<h5>'.$entry.' </h5><h6>True</h6>';
}
}

if (!empty($valu["False"])) {
foreach($valu['False'] as $entry1) {
    echo '<h5>'.$entry1.' </h5><h6>False</h6>';
}
}
?>
</center>
</div>
<center id="bas">
	<div id="g"><form method="post" action="">
			<button id ="bouton21" type="submit" name="valider">
                        <h3 id="but31">REJOUER</h3>
                    </button>  
					</form></div>
	<div id="d"><form method="post" action="./PHP/JOUEUR/deconnexion.php">
			<button id ="bouton31" type="submit" name="valider2">
                        <h4 id="but41">QUITTER LE JEU</h4>
        	</button>  
				</form>
	</div>
</center>
	  </div>
	  <?php
if (isset($_POST['valider'])){
	$val['Score']=0;
	unset($val['jeu']);
	$js1=json_encode($val);
	file_put_contents('./BD/nombre.json',$js1);
		header("location:./PHP/QUIZZ/genere.php");
		exit();
}
?>
</footer>
</body>
</html>