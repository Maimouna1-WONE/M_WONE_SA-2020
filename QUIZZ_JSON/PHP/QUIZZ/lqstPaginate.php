<?php
//$i=numero de la page courante
function paginate($tab3,$i){
if(array_key_exists($i, $tab3)) {
	echo ($i+1).'.    '.$tab3[$i]['Question'].'</br>';
	if ($tab3[$i]['Choix']=='cs' || $tab3[$i]['Choix']=='cm' ){
    	foreach($tab3[$i]['Reponse'] as $key => $qcm){
            if ($tab3[$i]['Choix']=="cs"){ 
                echo '&nbsp;&nbsp;';
                if (($key+1) == $tab3[$i]['Good'][0]){
                    echo '<input type="radio" name="r['.$i.']" id="r" checked>';
                }
                else echo '<input type="radio" name="r" id="r">';
            }
            if ($tab3[$i]['Choix']=="cm"){ 
                echo '&nbsp;&nbsp;';
                if ( in_array(( $key+1),$tab3[$i]['Good'] )) { 
                    echo '<input type="checkbox" name="c['.$i.']" id="c" checked="checked">';
                }
                else echo '<input type="checkbox" name="c" id="c">';
            }
        echo '&nbsp;&nbsp;';
        echo $qcm.'</br>';
        }
    
    } 
    if ($tab3[$i]['Choix']=='ct'){
	    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo '<input type="text" name="t" id="t" value="'; echo $tab3[$i]['Good'][0].'"></br>';
    }
}
}
?>
