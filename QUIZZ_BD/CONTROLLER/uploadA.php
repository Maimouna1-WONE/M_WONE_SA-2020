<?php
$target_file="";
$target_dir = "../STYLE/avatar/";
if(isset($_POST["valider"])) {
    if (!empty($_POST)){ 
        $target_file = $target_dir . basename($_FILES["photoA"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["photoA"]["tmp_name"]);
        $uploadOk = 1;
        if ($check !== false) {
            $uploadOk = 1;
        }
        else {
            $uploadOk = 0;
        }
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["photoA"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if($imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "jpg") {
            echo "Sorry, only JPEG,JPG and PNG files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        }
        else { 
            require_once ("../MODEL/modele.php");
            $req3=getUsers();
            while($tab=$req3->fetch()){
                if ( !in_array($_POST['login'],$tab)){
                    /*enregistement dans BD*/
                    $profil="admin";
                    $prenom=$_POST['prenom'];
                    $nom=$_POST['nom'];
                    $login=$_POST['login'];
                    $pwd=$_POST['password'];
                    $statut="actif";
                    $score=NULL;
                    if (move_uploaded_file($_FILES["photoA"]["tmp_name"], $target_file)) {
                        $file=basename( $_FILES["photoA"]["name"]);  
                        $avatar=$file;
                        $bdd=connexion();
                        $req = $bdd->prepare("
                        INSERT INTO user(profil,firstName, lastName, login, password, score_jr,avatar,statut)
                        VALUES('$profil', '$prenom', '$nom', '$login', '$pwd', '$score', '$avatar', '$statut')");
                        $req->execute();
                        header("Location:../index.php?lien=admin&smenu=compteA");
                        exit();
                    }
                    else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                } 
                else{
                    echo "Ce login est deja disponible";
                }
            }
        }
    }
}
?>