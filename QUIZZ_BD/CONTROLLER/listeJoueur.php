<?php
function paginateJ($tab4,$i,$k){
    echo '<table border="8">';
    echo '<thead>';
        echo '<tr>';
            echo '<th>'; echo 'Nom'; echo '</th>';echo '&nbsp;&nbsp;';
            echo '<th>'; echo 'Prenom';  echo '</th>';echo '&nbsp;&nbsp;';
            echo '<th>'; echo 'Score';  echo '</th>';echo '&nbsp;&nbsp;';
            echo '<th>'; echo 'Statut'; echo '</th>';echo '&nbsp;&nbsp;';
        echo '</tr></br>';
    echo '</thead>';
    echo '<tbody>';
            for ($i=$k;$i<$k+1;$i++) {   if (array_key_exists($i,$tab4)) {
        echo '<tr>';
            echo '<td align="center" >';
                 echo $tab4[$i]["lastName"]; 
            echo '</td>';echo '&nbsp;&nbsp;';
            echo '<td  align="center">';
                 echo $tab4[$i]["firstName"]; 
            echo '</td>';echo '&nbsp;&nbsp;';
            echo '<td  align="center">';
                 echo $tab4[$i]["score_jr"].' pts'; 
            echo '</td>';echo '&nbsp;&nbsp;';
            echo '<td  align="center">';
            if ($tab4[$i]["statut"]==1){
                echo '<input type="radio" id="rA" name="r" checked="checked">';
            }
            else{echo '<input id="rI" name="r" type="radio"/>';}
                echo '</td>';echo '&nbsp;&nbsp;';
        echo '</tr>';
        }
        }
        echo '</tbody>';
    echo '</table>';
    }
    
?>