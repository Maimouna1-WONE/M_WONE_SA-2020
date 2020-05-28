<!DOCTYPE html>
<html lang="en">
<head>
<base href="./">
	<title>Connexion</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="./STYLE/css/style.css<?php echo "?".rand();?>">
	<link rel="icon" href="./STYLE/images/logo-QuizzSA.png">
</head>
<body>
<header>
    <img src="./STYLE/images/logo-QuizzSA.png" alt="">
    <label for="header">LE PLAISIR DE JOUER</label>
</header>
<div class="container-fluid">
	<?php 
    if (isset($_GET['lien'])){
		if ( $_GET['lien'] == "joueur" ) {
			require_once ("./VIEW/PartieJeu.php");
		}	
		else if ( $_GET['lien'] == "admin" ) {
				require_once ("./VIEW/menuA.php");
		}
    }
    else{ 
		require_once ("./VIEW/connexion.php");
    }
	?>
</div>
<footer>
    <div class="footer_text ">
		<label for="footer">Copyright © 2020 SONATEL ACADEMIE COHORTE 3</label>
    </div>
    <div class="footer_img">
        <a href="https://www.academysonatel.com/ " rel="noopener noreferrer " target="_blank "><img src="./STYLE/images/logo-SA.png " alt=" "></a>
    </div>
</footer>
</body>
</html
