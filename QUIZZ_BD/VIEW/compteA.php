<!doctype html>
<html lang="en">

<head>
    <title>Menu Admin</title>
    <base href="../">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="STYLE/CSS/style_quizz.css">
    <link rel="stylesheet" href="STYLE/CSS/styleAd.css">
</head>

<body>
            <div class="formulaire_ca">
                <label for="">Compte administrateur</label>
                <div class="ligneA"></div>
                <form action="./CONTROLLER/uploadA.php" method="post" id="compteA" enctype="multipart/form-data">
                    <div class="form_ca_pre">
                        <label for=""><strong>Prenon</strong></label><br>
                        <input type="text" class="text" name="prenom" placeholder="Abbb" pattern="(^[A-Z][a-z]+$)" title="le prenom commence par une lettre majuscule">
                    </div>
                    <div class="form_ca_nom">
                        <label for=""><strong>Nom</strong></label><br>
                        <input type="text" class="text" name="nom" placeholder="ABBB" pattern="([A-Z]+)" title="le nom est ecrit en lettre capitale">
                    </div>
                    <div class="form_ca_login">
                        <label for=""><strong>login</strong></label><br>
                        <input type="text" class="text" name="login" placeholder="abbb" pattern="([a-z]+)" title="le login est ecrit en lettre minuscule">
                    </div>
                    <div class="form_ca_pwd">
                        <label for="username"><strong>Password</strong></label><br>
                        <input type="password" class="text" id="pwd1" placeholder="......" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Doit contenir au moins un chiffre et une lettre majuscule et minuscule, et contenir au moins 8 caractères">
                    </div>
                    <div class="form_ca_cpwd">
                        <label for="password "><strong>Confirm Password</strong></label><br>
                        <input type="password" class="text" placeholder="......" id="pwd2">
                    </div><br>
                    <button class="btn-upload2">Choisir le fichier</button>
                    <input type="file" name="photoA" id="imgAd"><br>
                    <button class="btn_ca" name="valider" type="submit">Connexion</button>
                </form>
            </div>
            <div class="pp_ca">
                <img src="#" alt="pp" id="ppAd">
                <label for=""><strong>Photo de profil</strong></label>
            </div>
            <script src="STYLE/JS/scriptA.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js " integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1 " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js " integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM " crossorigin="anonymous "></script>
</body>

</html>