<?php
function lesjoueurs($tab4){
		$j=array();
		foreach($tab4 as $key => $val){
			if ($tab4[$key]["Statut"]=="J") {
				$j[]=$tab4[$key];
			}
		}
		return $j;
    }

    function cmp($a, $b){
      
        if ($a["y"] == $b["y"]) {
            return 0;
        }
        return ($a["y"] > $b["y"]) ? -1 : 1;
    }

?>
