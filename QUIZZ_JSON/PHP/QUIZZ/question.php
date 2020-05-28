<?php
  if (isset($_POST['valider1'])){ 
    if (!empty($_POST['question']) && !empty($_POST['nbre']) && !empty($_POST['choise'])) {
    $tab3=array();
    $tab3['Question']=$_POST['question'];
      $tab3['Score']=$_POST['nbre'];
    $tab3['Choix']=$_POST['choise'];
    if ($tab3['Choix']=='cs'){
      if(!empty($_POST['fichier']) && is_array($_POST['fichier']) ) {
            $liste_bouton = $_POST['fichier'];
            foreach($liste_bouton as $key => $data) {
              $tab3['Reponse'][]=$data;
            }
            }
              if (isset($_POST['fich'])){
                $tab3['Good'][]=$_POST['fich'];
              }
              }
      
              if ($tab3['Choix']=='cm'){
      if(!empty($_POST['fichier1']) && is_array($_POST['fichier1']) ) {
            $liste_bouton2 = $_POST['fichier1'];
            foreach($liste_bouton2 as $key => $data2) {
              $tab3['Reponse'][]=$data2;
            }
            }
            if (isset($_POST['fich1']) && is_array($_POST['fich1']) ){
               $liste_bouton1 = $_POST['fich1'];
                  foreach($liste_bouton1 as $key => $data1) {
                      $tab3['good'][]=$data1;
                  }
              }
                    }
    if ($tab3['Choix']=='ct'){
      if (isset($_POST['fichierT'])) {
        $tab3['Reponse']=$_POST['fichierT'];
        $tab3['Good']=strtoupper($_POST['fichierT']);
    }
  }
    $js=file_get_contents('../../BD/creerQuestion.json');
    $js=json_decode($js,true);
    $js[]=$tab3;
    $js=json_encode($js);
    file_put_contents('../../BD/creerQuestion.json',$js);
   
  }
  //$result="creerQ";
  header("location:../../index.php?lien=admin&smenu=creerQ");
    //header("location: ../../VUE/creerQuestion.php");
   // exit();
  }
?>
