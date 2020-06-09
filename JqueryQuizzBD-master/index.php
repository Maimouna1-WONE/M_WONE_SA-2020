<?php
 define("WEBROOT","http://localhost/jqueryquizz");
   define("ACTION","action");
  require_once("./traitement/traitement.php");
  require_once("./data/bd.php");
if(isset($_GET[ACTION]))
{


    if($_GET[ACTION]=='connexion')
    {
          //Traitement de connexion
          pageConnexion($_POST);
    }
    else if($_GET[ACTION]=='inscription')
    {
        //Vue Incription Joueur
        require_once './pages/joueur/inscription.php';
    }elseif($_GET[ACTION]=="admin"){
        //Appel des Vues Admin
        //Avant d'appeler une vue admin on verifie 
        //que l'amin est connecté
        if(is_connect()){
            //Appel des Pages Admin
            if(isset($_GET["page"])){
              
                if($_GET["page"]=="showJoueur"){
                    //Chargement de la liste des Joueurs
                    require_once './pages/admin/liste_joueur.php';
                }elseif($_GET["page"]=="addQuestion"){
                    //Chargement de la Vue qui permet d'ajouter des Questions
                    require_once './pages/admin/question.php';
                }
                
            }else{
                //Vue Admin charger par défaut
                require_once './pages/layout_admin.php';
            }
        }else{
            //Page de Connexion
            require_once './pages/layout.php'; 
        }
        
    }elseif($_GET[ACTION]=="joueur"){
        if(is_connect()){
            require_once './pages/joueur/joueur.php';
        }
      
  } elseif($_GET[ACTION]=="deconnexion"){
          //Traitement de Deconnexion
           deconnection();
    }
}
else
{

        require_once './pages/layout.php';
}


?>