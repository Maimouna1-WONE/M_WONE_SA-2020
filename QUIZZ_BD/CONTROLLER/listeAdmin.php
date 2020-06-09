<?php
function paginateA($tab4,$i,$k){
    echo '<table border="8">';
    echo '<thead>';
        echo '<tr>';
            echo '<th>'; echo 'Nom'; echo '</th>';echo '&nbsp;&nbsp;';
            echo '<th>'; echo 'Prenom';  echo '</th>';echo '&nbsp;&nbsp;';
            echo '<th>'; echo 'Statut'; echo '</th>';echo '&nbsp;&nbsp;';
        echo '</tr></br>';
    echo '</thead>';
    echo '<tbody>';
            for ($i=$k;$i<$k+2;$i++) {   if (array_key_exists($i,$tab4)) {
        echo '<tr>';
            echo '<td align="center" >';
                 echo $tab4[$i]["lastName"]; 
            echo '</td>';echo '&nbsp;&nbsp;';
            echo '<td  align="center">';
                 echo $tab4[$i]["firstName"]; 
            echo '</td>';echo '&nbsp;&nbsp;';
            echo '<td  align="center">';
            if ($tab4[$i]["statut"]=="actif"){
                 echo '<input type="radio" checked="checked">';}
                 else{echo '<input type="radio"/>';}
            echo '</td>';echo '&nbsp;&nbsp;';
            echo '<td  align="center">';
            echo "<form action='' method='post'><button name='modifier_".$i."' style='width:20px;height:20px;'><img style='width:20px;height:20px;margin-top:-12px;margin-left:-7px;' src='./STYLE/icones/ic-modifier.png' alt='btn'/></button></form>";
            echo '</td>';echo '&nbsp;&nbsp;';
        echo '</tr>';

            if (isset($_POST['modifier_'.$i.''])){
                echo "ok";
            }
        }
        }
        echo '</tbody>';
    echo '</table>';
    }
    
?>