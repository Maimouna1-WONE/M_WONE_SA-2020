<?php
is_connect();
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php 
	$valu=file_get_contents('./BD/nombre.json');
	$valu=json_decode($valu,true);
$joueur=$_SESSION['joueur'];
$jeu=$valu['jeu'];
//var_dump($joueur);
?>
      <?php
        $tab3=file_get_contents('./BD/creerQuestion.json');
        $tab3=json_decode($tab3,true);
        $sc=0;
        for ( $i=0;$i<count($jeu);$i++ ) {
          $k=$jeu[$i]['num'];
          if ($tab3[$k]["Choix"]=="cs") {
            if ( empty($joueur[$i]["rep"]) || ($tab3[$k]["Good"][0] != $joueur[$i]["rep"][0]) ){
              $ptt= 0; 
              $sc=$sc;
              $_SESSION['false'][]=$jeu[$i]['qest'];
              // echo $sc.' faux cs '.$k.'<br>';
            }
            if ( !empty($joueur[$i]['rep']) && ($tab3[$k]["Good"][0] == $joueur[$i]["rep"][0]) ) { 
              $ptt=$tab3[$k]["Score"];
              $sc = $sc + $ptt;
              $_SESSION['true'][]=$jeu[$i]['qest'];
             // echo $sc.' ok cs '.$k.' <br>';
            }
          }
          if ($tab3[$k]["Choix"]=="cm"){
            if ( !empty($joueur[$i]['rep']) && (count($tab3[$k]["Good"])==count($joueur[$i]["rep"]) ) ) {
              $j=0;
              while ( ($j < count($tab3[$k]["Good"])) && ( $tab3[$k]["Good"][$j] == $joueur[$i]["rep"][$j] ) ) {
                $j++;
                }
              if ($j>=count($tab3[$k]["Good"])) {
                $ptt = $tab3[$k]["Score"];
                $sc=$sc+$ptt;   
                $_SESSION['true'][]=$jeu[$i]['qest'];
               // echo $sc.' ok cm '.$k.'<br>'; 
              }
            }
             if ( (!empty($joueur[$i]["rep"]) && ((count($tab3[$k]["Good"])<count($joueur[$i]["rep"])) || (count($tab3[$k]["Good"])>count($joueur[$i]["rep"])))) || empty($joueur[$i]["rep"]) ) {
              $ptt=0;
              $sc = $sc;
              $_SESSION['false'][]=$jeu[$i]['qest'];
              //echo $sc.' faux cm '.$k.' <br>';
            }
          }
          if ($tab3[$k]["Choix"]=="ct"){
            if ( !empty($joueur[$i]['rep']) && ($joueur[$i]["rep"][0] == $tab3[$k]["Good"][0]) ) {
              $ptt = $tab3[$k]["Score"];
              $sc=$sc+$ptt;
              $_SESSION['true'][]=$jeu[$i]['qest'];
              //echo $sc.' ok ct '.$k.' <br>';
            }
            if( ($joueur[$i]["rep"][0]="") || ($joueur[$i]["rep"][0] != $tab3[$k]["Good"][0])) {
              $ptt=0;
              $sc=$sc;
              $_SESSION['false'][]=$jeu[$i]['qest'];
             // echo $sc.' faux ct '.$k.' <br>'; 
            }
          }                       
        }
        unset($_SESSION['joueur']);
        
?>
<?php
$true=$_SESSION['true'];
$false=$_SESSION['false'];

$valu["Score"]=$sc;
if(!empty($true)){
$valu["True"]=$true;
}
if (!empty($false)){
$valu["False"]=$false;
}
$js1=json_encode($valu);
file_put_contents('./BD/nombre.json',$js1);

$value=file_get_contents('./BD/nombre.json');
$value=json_decode($value,true);

include "./PHP/JOUEUR/listeJoueurDroite.php";
$tab=file_get_contents('./BD/compteUser.json');
$tab=json_decode($tab,true);
$j=trouveJou($tab,$_SESSION['Nom'],$_SESSION['Prenom']);
if ($j !=-1){
  if(!empty($true)){
  foreach($true as $ent){
$tab[$j]["True"][]=$ent;
}
  }
}
$js1 = json_encode($tab);
file_put_contents('./BD/compteUser.json', $js1);
unset($_SESSION['true']);
unset($_SESSION['false']);
?>
