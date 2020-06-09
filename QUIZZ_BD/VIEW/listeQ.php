<?php
if(!isset($_SESSION)){ 
    session_start(); 
} 
//$idU=$_SESSION['idJ'];
?>
<!doctype html>
<html lang="en">

<head>
    <title>Liste Question</title>
    <base href="../">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="STYLE/CSS/style_quizz.css<?php echo "?".rand();?>">
    <link rel="stylesheet" href="STYLE/CSS/styleLQ.css<?php echo "?".rand();?>">
</head>
<body>
<?php
//$nombre=array();
if (isset($_POST['ok']) && !empty($_POST['val'])) {
    $nombre=$_POST['val'];
    /*require_once ("./MODEL/modele.php");
    $bdd=connexion();
    $req = $bdd->prepare("
        INSERT INTO part(id,play)
        VALUES('$idU', '$nombre')");
        $req->execute();*/
        //echo "ok";
	//enregistrer BD
}
if (!isset($_POST['ok']) && empty($_POST['val'])){
		$nombre=5;
            //enregistrement BD
}

?>

            <div class="Qjeu">
                <form action="" method="post">
                <label class="" for=""><strong>Nombre de question/jeu</strong></label>
                <input type="number" min="1" name="val" value="<?php echo $nombre;?>">
                <button name="ok">OK</button>
                </form>
            </div>
            <div class="listeQ" style="overflow:scroll;">
<?php
require_once ("./MODEL/modele.php");
require_once ("./CONTROLLER/listeQst.php");
        $bdd=connexion();
        $req10=getQuestion();
        $req11=getAnswerforQ();
        while ($tab3=$req10->fetch(PDO::FETCH_ASSOC)){$T1[]=$tab3;}
            while ($tab5=$req11->fetch(PDO::FETCH_ASSOC)){$T2[]=$tab5;}
       paginate($T1,$T2);
    ?>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="STYLE/JS/scriptMA.js"></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js " integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1 " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js " integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM " crossorigin="anonymous "></script>
</body>

</html>