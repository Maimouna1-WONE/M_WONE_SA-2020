<?php
if (isset($_POST['forgot'])){
    require_once ("./MODEL/modele.php");
    if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['profil'])){
    $req3=getUsers();
        while ($tabJ = $req3->fetch(PDO::FETCH_ASSOC)){
            $res=checkUser($tabJ,$_POST['prenom'],$_POST['nom'],$_POST['profil']);
            if ($res!=null){
                echo '<center><strong>Votre mot de passe est :</strong> '.$res['password'].'</center><br>';?>
<center><label for=""><a href="./index.php">Cliquer ici</a> pour vous connecter !</label></center>
           <?php }  
    }
    if ($res==null){
        echo "<center><strong>Ces informations ne sont pas valides</strong></center>";?>
        <center><label for=""><a href="./index.php?lien=compteJ">Cliquer ici</a> pour creer un nouveau compte !</label></center>
 
    <?php }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Accueil</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="../">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="STYLE/CSS/style_quizz.css<?php echo "?".rand();?>">
    <link rel="stylesheet" href="STYLE/CSS/styleFP.css<?php echo "?".rand();?>">
</head>

<body>
            <form method="post" id="oublie" action="">
                <div class="oublie_p">
                    <label for="prenom"><strong>Prenom</strong><h6 id="p" style="color:red; margin-top:-30px;margin-left:80px;">*</h6></label><br>
                    <input type="text" name="prenom" id="prenom" pattern="(^[A-Z][a-z]+$)" title="le prenom commence par une lettre majuscule"><br>
                    <small>Validation Error</small>
                </div>
                <div class="oublie_p">
                    <label for="nom"><strong>Nom</strong><h6 id="n">*</h6></label><br>
                    <input type="text" name="nom" id="nom" pattern="([A-Z]+)" title="le nom est ecrit en lettre capitale"><br>
                    <small>Validation Error</small>
                </div>
                <div class="oublie_p">
                    <label for="profil"><strong>Profil</strong><h6 id="pf">*</h6></label><br>
                    <select name="profil" id="profil">
                        <option value=" ">Quel est votre profil ?</option>
                        <option value="admin">Administrateur</option>
                        <option value="joueur">Joueur</option>
                    </select><br>
                    <small>Validation Error</small>
                </div><br>
                <button name="forgot" id="forgot" type="submit">Rechercher</button>
            </form>
            <script src="STYLE/JS/scriptFP.js"></script>
</body>

</html>