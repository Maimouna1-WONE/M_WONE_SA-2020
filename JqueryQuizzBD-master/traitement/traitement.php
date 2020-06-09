
<?php
 session_start();
function pageConnexion($post)
 {
     $login=$post['login'];
     $password=$post['password'];
     //Validation des Champs en Php
   
     $result=getUserConnexion($login, $password);

     if($result!== null)
     {
        
         $_SESSION['userConnect']=$result;
         echo $result['profil'];
     }else{
          echo "error";
     }

 }

 function deconnection(){
    //Destruction des données utlisateur
    session_destroy();
    unset( $_SESSION['userConnect']);
     echo "logout";
 }

 function is_connect(){
     if(isset($_SESSION['userConnect'])){
         return true;
     }else{
        return false;
     }
 }
      
       
?>