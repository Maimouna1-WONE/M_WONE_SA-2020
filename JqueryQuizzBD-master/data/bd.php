<?php

function connect_db(){
    $host ="localhost";
    $db = "quizz_liage";
    $user ="root";
    $psswd ="";
    try{
    $conn = new PDO("mysql:host=$host;dbname=$db",$user,$psswd);
    return $conn;
    
    }catch(PDOException $pe){
        return 'connection error '.$pe->getMessage();
       die();
    }
}

function getUserConnexion($login,$password){
    try{
    $db = connect_db();
    
     $query = $db->prepare("SELECT * FROM compte WHERE login=:login AND password=:password");
     $query->bindParam("login", $login, PDO::PARAM_STR);
     $query->bindParam("password", $password, PDO::PARAM_STR);
     
     $query->execute();

       if($query->rowCount() > 0){
        
         $user = $query -> fetch(PDO::FETCH_ASSOC);
         $profil = $user['profil'];    
         return $user;
    }
    else{
         return null;
    }

  
    }catch(PDOException $e){
       exit($e -> getMessage());
    }
          
    }


    /*------------------------------------------------------------------------------------
inserer les infos utilisateur dans la BDD(inscription ou ajout d'un admin)
---------------------------------------------------------------------------------------*/
function addUser($login,$password,$prenom,$nom)
{
    $result = 0;
    if(isset($_SESSION['user'])){ //c'est un admin qui ajoute un autre admin
        $profil = 'admin';
    
    }
  else{ //c'est un joueur qui s'inscrit
     $profil = 'joueur';
  
  }
try{
$db = connect_db();

$query = $db -> prepare("INSERT INTO utilisateur(login, password, fullName, profil,statut) VALUES(:login, :password, :fullName, :profil,:statut)");
      $fullName= $prenom+" "+$nom;
      $query -> bindParam("login",$login,PDO::PARAM_STR);
        $query -> bindParam("password",$password,PDO::PARAM_STR);
        $query -> bindParam("fullName",$fullName,PDO::PARAM_STR);
        $query -> bindParam("profil",$profil,PDO::PARAM_STR);
        $query -> bindParam("statut",$profil,PDO::PARAM_INT);
        $query -> execute();
         return 1;
   }catch(PDOException $e){
exit($e -> getMessage());
}
         
}
?>