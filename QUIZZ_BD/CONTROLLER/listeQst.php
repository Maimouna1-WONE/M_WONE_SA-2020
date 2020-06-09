<?php
//$i=numero de la page courante
function paginate($tab3,$tab5){
    echo '<table>';
    echo '<tbody>';
    foreach($tab3 as $key=>$val){
        echo "<tr id='tr_'.$key.''>";
        echo "<td id='td_'.$key.''>";
        echo ($key+1).'.    '.$val['libelle_qst'];echo "<br>";
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
       if ($val['type']=="cs"){
        foreach($tab5 as $val1){
                if ($val['libelle_qst']==$val1['libelle_qst']){
                    if ($val1['rep_value']==1){
                        echo '<input type="radio" name="r['.($key+1).']" id="r" checked>';
                    }
                    else {echo '<input type="radio" name="r" id="r">';}
                    echo '&nbsp;&nbsp;';
                    echo $val1['libelle_rep'].'</br>';
                    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                }
                }
                
                if (isset($_POST['modifier_'.$key.''])){
                    
                   /* echo "<form method='post' action=''>Question<input type='text'name='q' value='";echo $val['libelle_qst']."'></br>";
                    echo "Score<input type='text' name='sc' value='";echo $val['score']."'></br>";
                    echo "Type de la reponse<select name='tp' class='type'>
                    <option value=''>Donnez le type de reponse</option>
                    <option value='cm'>Choix multiple</option>
                    <option value='cs'>Choix simple</option>
                    <option value='ct'>Choix texte</option>
                  </select></br>";
                    foreach($tab5 as $val1){
                        if ($val['libelle_qst']==$val1['libelle_qst']){
                           echo '<input type="radio" name="r" id="r">';
                            echo '&nbsp;&nbsp;';
                            echo "Rep ".($key+1)."<input type='text' name='rts['.$key'.]' value='";echo $val1['libelle_rep']."'></br>";
                        }
                        }
                        echo "<button name='mod_'.$key.''>modify</button></form>";

                        if (isset($_POST['mod_'.$key.''])){
                            /*enregistrement dans BD*/

                           /* if (!empty($_POST['q']) && !empty($_POST['sc']) && !empty($_POST['tp'])) {
                                require_once ("../MODEL/modele.php");
                                //$tab=array();
                                $bdd=connexion();
                                $Question=$_POST['q'];
                                $Score=$_POST['sc'];
                                $Choix=$_POST['tp'];
                        
                                $req6=getQuestion();
                                while($t2=$req6->fetch(PDO::FETCH_ASSOC)){$T1[]= $t2;}
                                $rep=getIdPart($T1,$Question);
                                $rep1=getIdQst($T1,$Question);
                        
                                $qValue=0;
                                $req = $bdd->prepare("
                                INSERT INTO question(libelle_qst,score, type,id_part,id,qst_value)
                                VALUES('$Question', '$Score', '$Choix','$rep','$idU','$qValue')");
                                $req->execute();
                        
                                if ($Choix=='cs'){
                                  if(!empty($_POST['rts']) && is_array($_POST['rts']) ) {
                                        $liste_bouton = $_POST['rts'];
                                        foreach($liste_bouton as $key => $data) {
                                          $Reponse[]=$data;
                                        }
                                        }
                                          if (isset($_POST['r'])){
                                            $Good[]=$_POST['r'];
                                          }
                                          foreach($Reponse as $key=>$val){
                                              if ($key+1==$Good[0]){$bien=$Good[0];
                                            }
                                            else{
                                                $bien=0;
                                            }
                                            $req = $bdd->prepare("
                                            INSERT INTO answer(libelle_rep,id_qst,rep_value)
                                            VALUES('$val','$rep1','$bien')");
                                            $req->execute();
                                          }
                                }
                                    }*/
                            //}
                            
                }
                if (isset($_POST['supprimer_'.$key.''])){
                    /*suppression dans la BD*/
                }
            }

            if ($val['type']=="cm"){
                foreach($tab5 as $val1){
                        if ($val['libelle_qst']==$val1['libelle_qst']){
                            if ($val1['rep_value']==1){
                                echo '<input type="checkbox" name="c['.($key+1).']" checked>';
                            }
                            else {echo '<input type="checkbox" name="c" >';}
                            echo '&nbsp;&nbsp;';
                            echo $val1['libelle_rep'].'</br>';
                            echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                        }
                        }
                        if (isset($_POST['modifier_'.$key.''])){
                            echo "<form method='post' action=''><input type='text' name='q' value='";echo $val['libelle_qst']."'>";
                            echo "<input type='text' name=''sc value='";echo $val['score']."'>";
                            echo "<input type='text' name='tp' value='";echo $val['type']."'>";
                            foreach($tab5 as $val1){
                                if ($val['libelle_qst']==$val1['libelle_qst']){
                                   echo "<input type='checkbox' name='c['.$key'.]' >";
                                    echo '&nbsp;&nbsp;';
                                    echo "<input type='text' name='rtc['.$key'.]' value='";echo $val1['libelle_rep']."'>";
                                }
                                }
                                echo "<button name='mod_'.$key.''>modify</button></form>";
                                if (isset($_POST['mod_'.$key.''])){
                                    /*enregistrement dans BD*/

                                   /* if ($Choix=='cm'){
                                        if(!empty($_POST['rtc']) && is_array($_POST['rtc']) ) {
                                              $liste_bouton2 = $_POST['rtc'];
                                              foreach($liste_bouton2 as $key => $data2) {
                                                $Reponse[]=$data2;
                                              }
                                              }
                                              if (isset($_POST['rtc']) && is_array($_POST['rtc']) ){
                                                 $liste_bouton1 = $_POST['rtc'];
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
                                                VALUES('$val','$reP1','$bien')");
                                                $req->execute();
                                              }
                                              }*/
                                    }
                        }
                        if (isset($_POST['supprimer_'.$key.''])){
                            /*suppression dans la BD*/
                        }
                    }

                    if ($val['type']=="ct"){
                        foreach($tab5 as $val1){
                                if ($val['libelle_qst']==$val1['libelle_qst']){
                                        echo '<input type="text" name="t" id="t" value="'; echo $val1['libelle_rep'].'"></br>';
                                        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                                    }
                                }
                                if (isset($_POST['modifier_'.$key.''])){
                                    //echo "ok";
                                   /* echo "<form method='post' action=''><input type='text' name='q' value='";echo $val['libelle_qst']."'>";
                                    echo "<input type='text' name='sc' value='";echo $val['score']."'>";
                                    echo "<input type='text' name='tp' value='";echo $val['type']."'>";
                                    foreach($tab5 as $val1){
                                        if ($val['libelle_qst']==$val1['libelle_qst']){
                                            echo "<input type='text' name='rtt' value='";echo $val1['libelle_rep']."'>";
                                        }
                                        }
                                        echo "<button name='mod_'.$key.''>modify</button></form>";
                                        if (isset($_POST['mod_'.$key.''])){
                                        /*enregistrement dans BD*/

                                        
                                         /*   if ($Choix=='ct'){
                                                if (isset($_POST['rtt'])) {
                                                $Reponse=$_POST['rtt'];
                                                $Good=strtoupper($_POST['rtt']);
                                            }
                                            $bien=1;
                                                $req = $bdd->prepare("
                                            INSERT INTO answer(libelle_rep,id_qst,rep_value)
                                            VALUES('$Reponse','$rep1','$bien')");
                                            $req->execute();
                                        
                                            }
                                        }*/
                                }
                                if (isset($_POST['supprimer_'.$key.''])){
                                    /*suppression dans la BD*/
                                }
                            } 
                            echo '</td>';
                            echo '<td>';
                                echo "<form action='' method='post'><button name='modifier_".$key."' style='width:20px;height:20px;'><img style='width:20px;height:20px;margin-top:-12px;margin-left:-7px;' src='./STYLE/icones/ic-modifier.png' alt='btn'/></button></form>";
                                echo "<form action='' method='post'><button name='supprimer_'.$key.'' style='width:20px;height:20px;'><img style='width:20px;height:20px;margin-top:-12px;margin-left:-7px;' src='./STYLE/icones/ic-ferme.png' alt='btn'/></button></form>";                    
                            echo '</td>';
                            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    
    }
    
?>