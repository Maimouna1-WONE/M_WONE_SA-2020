<!doctype html>
<html lang="en">

<head>
    <title>Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=WEBROOT?>/public/css/classe.css">


</head>

<body>



    <header class="bgSecondary">
        <h1 class="text-center m-0">
            Le plaisir de jouer
        </h1>
    </header>

    <div id="main" class="d-flex justify-content-center align-items-center ">

        <section style="width:92vw ;">
            <div class="section-header bgPrimary position-relative ">
                <h3 class=" w-100 py-2 d-inline-block text-center">CREER ET PARAMETRER VOS QUIZZ</h3>
                <button id="btn_deconnexion" class="deconnexion position-absolute btn btn-primary"
                    style="right: 10px; top: 10px;">Deconnexion</button>
            </div>


            <div class="section-body bgWhite px-5 " style="height: 75vh;">

                <div class="row d-flex align-items-center h-100">
                    <!-- Menu -->
                    <div class="col-md-4 pl-3">
                        <div class="menu " style="width: 85%;">
                            <div class="menu-header  py-3 d-flex align-items-center justify-content-between px-3">
                                <div class="avatar ">
                                    <img class="img-fluid" src="./img/" alt="">
                                </div>
                                <h5 class="text-white">ADAMA LADY</h5>
                            </div>

                            <nav class="nav flex-column py-3 ">
                                <a class="nav-link active" lien="index.php?action=admin&page=showJoueur" href="#">Lister Joueur</a>
                                <a class="nav-link"  lien="index.php?action=admin&page=addAdmin" href="#">Créer Admin</a>
                                <a class="nav-link" lien="index.php?action=admin&page=addQuestion" href="#">Creer Question </a>
                                <a class="nav-link"  lien="index.php?action=admin&page=showQuestion" href=" #">Lister Question</a>
                            </nav>
                        </div>
                    </div>

                       <div class="" style="width :60%;" id="container_admin">
                       <div class="col-md-12" id="container-admin">
                        
                      <?php 
                           require_once("./pages/admin/inscription.php");?>
                       
                      </div>

                </div>

            </div>
        </section>
    </div>
   
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="<?=WEBROOT?>/public/js/script.js" ></script>
</body>
</html>