<?php
function exist($tab, $val) {
    foreach ($tab as $entry) {
        if ( ($val == $entry['Login']) ) {
            return true;    
        }
    }
    return false;
}
?>
<?php
$target_file="";
$target_dir = "../../style/AVATAR/";
if(isset($_POST["valider1"])) {        
?>
<?php
$target_file = $target_dir . basename($_FILES["upfile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$check = getimagesize($_FILES["upfile"]["tmp_name"]);
$uploadOk = 1;
        if($check !== false) {
          $uploadOk = 1;
        }
        else {
            $uploadOk = 0;
        }

  //ligne 31 a la fin mets le 
  // Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["upfile"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "jpg") {
    echo "Sorry, only JPEG,JPG and PNG files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

} else { 
        $tab1=file_get_contents("../../BD/compteUser.json");
		$tab1=json_decode($tab1,true);
        if ( !exist($tab1,$_POST['login']) ) {
            $tab2=array();
            $tab2['Statut']="A";
            $tab2['Prenom']=$_POST['prenom'];
            $tab2['Nom']=$_POST['nom'];
            $tab2['Login']=$_POST['login'];
            $tab2['Password']=$_POST['pwd'];
            $tab2['ConfPassword']=$_POST['pwd1'];
            if (move_uploaded_file($_FILES["upfile"]["tmp_name"], $target_file)) {
       
                $file=basename( $_FILES["upfile"]["name"]);  
            $tab2['Avatar']=$file;
            $js1=file_get_contents('../../BD/compteUser.json');
            $js1=json_decode($js1,true);
            $js1[]=$tab2;
            $js1=json_encode($js1);
            file_put_contents('../../BD/compteUser.json',$js1);
            header("location:../../index.php?lien=admin&smenu=cAdmin");
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
?>
