<?php

function cmp($a, $b){
    if ( $a["Statut"]=="J" && $b["Statut"]=="J" ){
	if ($a["Score"] == $b["Score"]) {
		return 0;
	}
    return ($a["Score"] > $b["Score"]) ? -1 : 1;
}
}

function trouveJou($tab, $val1,$val2) {
    foreach ($tab as $key =>$entry) {
        if ( ($val1 == $tab[$key]['Nom']) && ($val2 == $tab[$key]['Prenom']) ) {
                return $key;
        }
    }
    return -1;
}

		function modifieScore($tab4,$val,$val1,$stat,$x) {
			foreach ($tab4 as $key => $entry) {
               if ($tab4[$key]["Statut"]==$stat){
                    if ( ($tab4[$key]['Prenom'] == $val) && ($tab4[$key]['Nom'] == $val1) ){
                        if ($tab4[$key]['Score'] < $x) {
                            $tab4[$key]['Score'] = $x;
                        }
                    } 
                }
            }
            $js = json_encode($tab4);
			file_put_contents('./BD/compteUser.json', $js);
            return $js;
        }  
?>

<?php
//$i et $k sont respectivement le numero de la page et le pas

function paginateJ($tab4,$i,$k){
    
echo '<table width="500px" height="200px">';
echo '<thead>';
    echo '<tr>';
        echo '<th>'; echo 'Nom'; echo '</th>';
        echo '<th>'; echo 'Prenom';  echo '</th>';
        echo '<th>'; echo 'Score'; echo '</th>';
    echo '</tr>';
echo '</thead>';
echo '<tbody>';

		for ($i=$k;$i<$k+7;$i++) { 
			if (array_key_exists($i,$tab4)) { 
                if ($tab4[$i]["Statut"]=="J" && $tab4[$i]["Score"] != 0){
               
	echo '<tr>';
		echo '<td align="center" >';
			 echo $tab4[$i]["Nom"]; 
		echo '</td>';
        echo '<td  align="center">';
			 echo $tab4[$i]["Prenom"]; 
		echo '</td>';
        echo '<td  align="center">';
			 echo $tab4[$i]['Score'].' pts';
		echo '</td>';
	echo '</tr>';
		}
        }
    }
echo '</tbody>';
echo '</table>';
   
}
?>

<?php


function table($tab4){
    
$tab=array("#5F9EA0","#00FFFF","#FF7F50","#FF8C00","#FFE4C4");
echo "<table>";
    echo "<tbody>"; ?>
        <?php   
            for ($i=0;$i<5;$i++) {
                if (array_key_exists($i,$tab4) ) {
                   // if ( ($tab4[$i]["Score"] >= 30) && ($tab4[$i]["Score"] <= 100) ) {
        ?>
    <?php echo "<tr>"; ?>
        <?php echo '<td align="center">'; ?>
            <?php echo $tab4[$i]["Prenom"].' '.$tab4[$i]["Nom"]; ?>
        <?php echo "</td>"; 
        echo '<td align="center">'; ?>
           <?php echo '<div id="score" style="border-color:'; ?> <?php echo $tab[$i].'"'; ?> <?php echo '>'; ?>
              <?php echo '<b>'; ?> <?php echo $tab4[$i]["Score"].' pts'; ?> <?php echo '</b>'; ?>
            <?php echo '</div>'; ?>
        <?php echo '</td>';
    echo '</tr>'; ?>
    <?php
                  //  }
        }
        }
    ?>
    <?php echo '</tbody>'; ?>
<?php echo '</table>'; ?>
<?php }
?>


