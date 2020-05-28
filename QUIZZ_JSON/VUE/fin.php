<?php
include "./PHP/JOUEUR/FuncConnexion.php";
is_connect();
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php
include "./PHP/QUIZZ/JeuTerminer.php";
//include "./PHP/JOUEUR/listeJoueurDroite.php";
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
<?php
	$value=file_get_contents('./BD/nombre.json');
	$value=json_decode($value,true);
?>
	<div id="form">
        <center>
			<label>
				<h2><?php echo "Votre score est de : ";?>
                <b><?php echo $value["Score"];?></b>
                <?php echo " points";?></h2>
			</label>
		</center>
		<?php
$tab=file_get_contents('./BD/compteUser.json');
$tab=json_decode($tab,true);
$js=modifieScore($tab,$_SESSION['Prenom'],$_SESSION["Nom"],"J",$value['Score']);
		?>
		<center>
			<form method="post" action="">
			<button id ="bouton2" type="submit" name="valider">
                        <h3>REJOUER</h3>
                    </button>  
					</form>
		</center></br>
		<center>
			<form method="post" action="./index.php?lien=recap">
			<button id ="bouton2" type="submit" name="valider1">
                        <h3>RECAP</h3>
                    </button>  
					</form>
		</center></br>
        <center>
			<form method="post" action="./index.php?lien=recap">
			<button id ="bouton3" type="submit" name="valider2">
                        <h4>QUITTER LE JEU</h4>
                    </button>  
					</form>
		</center>
  	</div>
	  <?php
if (isset($_POST['valider'])){
	$value=file_get_contents('./BD/nombre.json');
	$value=json_decode($value,true);
	$value['Score']=0;
unset($value['jeu']);
$js1=json_encode($value);
file_put_contents('./BD/nombre.json',$js1);
	header("location:./PHP/QUIZZ/genere.php");
	exit();
}
		?>
</footer>
</body>
</html>