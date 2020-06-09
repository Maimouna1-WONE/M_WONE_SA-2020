
    <header class="bgSecondary">
        <h1 class="text-center m-0">
            Le plaisir de jouer
        </h1>
    </header>

    <div id="main" class="d-flex justify-content-center align-items-center">

        <div  class="w-25">
            <div class="connexion-form-header">
                <h3 class="bgPrimary h5 p-3 m-0">Login form</h3>
            </div>

            <div class="connexion-form-body bgWhite p-3">
                <div id="error_message" class="alert alert-danger" role="alert">
                    <strong>Login ou Mot de Passe Incorrect</strong>
                </div>
                <form id="form-connexion" class="py-2" method="post" action="index.php?action=connexion">
                    <div class="form-group ">
                        <input type="text" placeholder="Login" name="login" class="form-control" id="email">
                    </div>

                    <div class="form-group py-2">
                        <input type="password" placeholder="Password" name="password" class="form-control">
                    </div>


                    <button  id="btn_connexion" name="btn_connexion" type="submit" class="btn btn-primary">Connexion</button>
                    <a id="inscription" href="#" class="text-secondary pl-5">S'inscrire pour jouer</a>
                </form>
            </div>

        </div>
    </div>

   

 