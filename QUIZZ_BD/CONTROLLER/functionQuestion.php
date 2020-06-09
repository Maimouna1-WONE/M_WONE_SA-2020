<?php
if(!isset($_SESSION)){ 
    session_start(); 
} 
//$idU=$_SESSION['id'];
?>
<?php
if(isset($_POST["saveQ"])) {
    if (!empty($_POST['libelleQ']) && !empty($_POST['point']) && !empty($_POST['choix'])) {
        require_once ("../MODEL/modele.php");
        //$tab=array();
        $bdd=connexion();
        $Question=$_POST['libelleQ'];
        $Score=$_POST['point'];
        $Choix=$_POST['choix'];


        $req5=lastIdPart();
        while($t1=$req5->fetch(PDO::FETCH_ASSOC)){$idP= $t1['lpart'];}

        /*$req6=lastIdUser();
        while($t2=$req6->fetch(PDO::FETCH_ASSOC)){$idU= $t2['luser']+1;}*/
        $qValue=0;
        $req = $bdd->prepare("
        INSERT INTO question(libelle_qst,score, type,id_part,id,qst_value)
        VALUES('$Question', '$Score', '$Choix','$idP','$idU','$qValue')");
        $req->execute();

        $req4=lastIdQst();
        while($t=$req4->fetch(PDO::FETCH_ASSOC)){$idQ= $t['lqst'];}

        if ($Choix=='cs'){
          if(!empty($_POST['fichiercs']) && is_array($_POST['fichiercs']) ) {
                $liste_bouton = $_POST['fichiercs'];
                foreach($liste_bouton as $key => $data) {
                  $Reponse[]=$data;
                }
                }
                  if (isset($_POST['fichs'])){
                    $Good[]=$_POST['fichs'];
                  }
                  foreach($Reponse as $key=>$val){
                      if ($key+1==$Good[0]){$bien=$Good[0];
                    }
                    else{
                        $bien=0;
                    }
                    $req = $bdd->prepare("
                    INSERT INTO answer(libelle_rep,id_qst,rep_value)
                    VALUES('$val','$idQ','$bien')");
                    $req->execute();
                  }
        }
       
          
                  if ($Choix=='cm'){
          if(!empty($_POST['fichiercm']) && is_array($_POST['fichiercm']) ) {
                $liste_bouton2 = $_POST['fichiercm'];
                foreach($liste_bouton2 as $key => $data2) {
                  $Reponse[]=$data2;
                }
                }
                if (isset($_POST['fichm']) && is_array($_POST['fichm']) ){
                   $liste_bouton1 = $_POST['fichm'];
                      foreach($liste_bouton1 as $key => $data1) {
                          $Good[]=$data1;
                      }
                  }
                  foreach($Reponse as $key1=>$val){
                        if (count($Reponse)==count($Good)){
                            $bien=1;
                        }
                        if (count($Reponse)>count($Good)){
                            if ( in_array(($key1+1),$Good)){
                                $bien=1;
                            }
                            else{$bien=0;}
                        }
                        $req = $bdd->prepare("
                  INSERT INTO answer(libelle_rep,id_qst,rep_value)
                  VALUES('$val','$idQ','$bien')");
                  $req->execute();
                }
                }
               

        if ($Choix=='ct'){
          if (isset($_POST['fichierct'])) {
            $Reponse=$_POST['fichierct'];
            $Good=strtoupper($_POST['fichierct']);
        }
        $bien=1;
            $req = $bdd->prepare("
      INSERT INTO answer(libelle_rep,id_qst,rep_value)
      VALUES('$Reponse','$idQ','$bien')");
      $req->execute();
    
      }
            }
            header("location:../../index.php?lien=admin&smenu=creerQ");
}
?>