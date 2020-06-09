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
</head>

<body>
        <div class="line_insc">
            <form action="./index.php?lien=compteJ" method="POST">
                <button class="btn_insc">S'incrire</button>
            </form>
        </div>
        <div class="formulaire">
            <form method="post" id="connexion" action="./CONTROLLER/functionUser.php">
                <div class="form_form_user">
                    <label for="login"><strong>Login</strong></label><br>
                    <input type="text" class="champ" name="login" id="login" placeholder="saisie le login" style="background: url(STYLE/icones/ic-login.png) no-repeat right;"><br>
                    <small>Validation Error</small>
                </div>
                <div class="form_form_user">
                    <label for="password"><strong>Password</strong></label><br>
                    <input type="password" class="champ" name="pwd" id="password" placeholder="......." style="background: url(STYLE/icones/ic-password.png) no-repeat right;"><br>
                    <small>Validation Error</small>
                </div><br>
                <button name="connect" id="envoi" type="submit">Connexion</button>
            </form>
            <label for="" class="form_pwd"><strong>Forgot <a href="./index.php?lien=fPwd">Password</a> ?</strong></label>
        </div>
        <script src="STYLE/JS/script_quizz.js"></script>
          <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js " integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1 " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js " integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM " crossorigin="anonymous "></script>



<script>
$(document).ready(function() {
  // Action qui est exécutée quand le formulaire est envoyé ( #connexion est l'ID du formulaire)
  $('#envoi').on('submit', function(e) {
    e.preventDefault(); // On empêche de soumettre le formulaire
    var $this = $(this); // L'objet jQuery du formulaire
    // Envoi de la requête HTTP en mode asynchrone
    $.ajax({
      url: $this.attr('action'), // On récupère l'action (ici action.php)
      type: $this.attr('method'), // On récupère la méthode (post)
      data: $this.serialize(), // On sérialise les données = Envoi des valeurs du formulaire
      dataType: 'json', // JSON
      success: function(json) { // Si ça c'est passé avec succès
        // ici on teste la réponse
        if(json.reponse === 'ok') {
          if (json.reponse.profil === "admin") {
                        window.location = './VIEW/admin/';
                    } else {
                        window.location = './VIEW/jeu/';
                    }
      }
    });
  });
});
</script>

</body>

</html>