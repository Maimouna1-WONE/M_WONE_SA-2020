<?php
is_connect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menu Admin</title>
	<base href="./">
	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="style/css/menuAdmin.css<?php echo "?".rand();?>">
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet">
</head>
<body>
	<footer>
<div id="form">
			<div id="formHaut">
				<form method="post" action="./PHP/JOUEUR/deconnexion.php">
					<button id ="bouton" type="submit" name="valider" onclick="return confirm('Voulez-vous vraiment vous deconnecter ?');">
						<h3>Deconnexion</h3>
					</button>
				</form>
				<center>
					<label>
						<h2>CREER ET PARAMETRER VOS QUIZZ</h2>
					</label>
				</center>	
			</div>
			<div id="formBas">
				<div id="gauche">
					<div id="gH">
						<img id="tof" src="./style/AVATAR/<?php echo $_SESSION['TofAd']; ?>" height="98" alt="photoJ" />
						<div id="name">
							<b><?php echo $_SESSION["PrenomAd"];?></br><?php echo $_SESSION["NomAd"];?></b>
						</div>
					</div>
					<div id="gB">
						<nav>						
							<ul>
								<li style="background:url(./style/icone/ic-liste.png) no-repeat right;" <?php if (isset($_GET['smenu'])){ if ($_GET['smenu'] == 'lqst') {echo 'id="en_cours"';}} ?>>
									<a href="./index.php?lien=admin&smenu=lqst">Liste Questions</a>
								</li>
								<li style="background:url(./style/icone/ic-ajout.png) no-repeat right;" <?php if (isset($_GET['smenu'])){ if ($_GET['smenu'] == 'cAdmin') {echo 'id="en_cours"';}} ?>>
									<a href="./index.php?lien=admin&smenu=cAdmin">Creer Admin</a>
								</li>
								<li style="background:url(./style/icone/ic-liste.png) no-repeat right;"  <?php if (isset($_GET['smenu'])){ if ($_GET['smenu'] == 'listeJ') {echo 'id="en_cours"';}} ?>>
									<a href="./index.php?lien=admin&smenu=listeJ">Liste Joueurs</a>
								</li>
								<li style="background:url(./style/icone/ic-ajout.png) no-repeat right;" <?php if (isset($_GET['smenu'])){ if ($_GET['smenu'] == 'creerQ') {echo 'id="en_cours"';}} ?>>
									<a href="./index.php?lien=admin&smenu=creerQ">Creer Question</a>
								</li>
							</ul>	
						</nav>
					</div>
				</div>
				<div id="droite">
				<?php 
				
					if  (isset($_GET['smenu'])) {
						if ($_GET['smenu']=="cAdmin" ) {
							require_once ("./VUE/compteAdmin.php");
						}
						if ($_GET['smenu']=="creerQ" ) {
							require_once ("./VUE/creerQuestion.php");
						}
						if ($_GET['smenu']=="listeJ" ) {
							require_once ("./VUE/listeJoueur.php");
						}
						if ($_GET['smenu']=="lqst" ) {
							require_once ("./VUE/lqst.php");
						}
					}
				else {require_once ("./VUE/dashbord.php");
					 }
					 
					 ?>
				</div>
</footer>
</body>
</html>  