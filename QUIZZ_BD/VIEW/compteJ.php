<!doctype html>
<html lang="en">

<head>
    <title>Compte Joueur</title>
    <base href="../">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="STYLE/CSS/style_quizz.css<?php echo "?".rand();?>">
    <link rel="stylesheet" href="STYLE/CSS/styleJr.css<?php echo "?".rand();?>">
</head>

<body>
        <div class="formulaire_cj">
            <label for="">S'inscrire pour jouer</label>
            <div class="ligneJ"></div>
            <form action="./CONTROLLER/uploadJ.php" method="post" id="compteJ" enctype="multipart/form-data">
                <div class="form_cj_pre">
                    <label for=""><strong>Prenon</strong></label><br>
                    <input type="text" class="text" name="prenom" placeholder="Abbb" pattern="(^[A-Z][a-z]+$)" title="le prenom commence par une lettre majuscule">
                </div>
                <div class="form_cj_nom">
                    <label for=""><strong>Nom</strong></label><br>
                    <input type="text" class="text" name="nom" placeholder="ABBB" pattern="([A-Z]+)" title="le nom est ecrit en lettre capitale">
                </div>
                <div class="form_cj_login">
                    <label for=""><strong>login</strong></label><br>
                    <input type="text" class="text" name="login" placeholder="abbb" pattern="([a-z]+)" title="le login est ecrit en lettre minuscule">
                </div>
                <div class="form_cj_pwd">
                    <label for="username"><strong>Password</strong></label><br>
                    <input type="password" class="text" id="pwd1" placeholder="......" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Doit contenir au moins un chiffre et une lettre majuscule et minuscule, et contenir au moins 8 caractères">
                </div>
                <div class="form_cj_cpwd">
                    <label for="password "><strong>Confirm Password</strong></label><br>
                    <input type="password" class="text" placeholder="......" id="pwd2">
                </div><br>
                <button class="btn-upload1">Choisir le fichier</button>
                <input type="file" name="photoJ" id="imgJr"><br>
                <button class="btn_cj" name="valider" type=" submit ">Connexion</button>
            </form>
        </div>
        <div class="pp_cj">
            <img src="#" alt="pp" id="ppJr">
            <label for=""><strong>Photo de profil</strong></label>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="STYLE/JS/scriptCJ.js"></script>
    <script src="STYLE/JS/scriptJ.js"></script>

</body>

</html>