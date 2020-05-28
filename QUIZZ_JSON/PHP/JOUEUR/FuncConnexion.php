<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php
function lesjoueur($tab4){
    $j=array();
    foreach($tab4 as $key => $val){
        if ($tab4[$key]["Statut"]=="J") {
            $j[]=$tab4[$key];
        }
    }
    return $j;
}
function lesadmin($tab1){
    $a=array();
    foreach($tab1 as $key => $val){
        if ($tab1[$key]["Statut"]=="A"){
            $a[]=$tab1[$key];
        }
    }
    return $a;
}

function trouveJ($tab, $val,$val1) {
    foreach ($tab as $key =>$entry) {
        if ( ($val == $tab[$key]['Login']) && ($val1 == $tab[$key]['Password']) ) {
				return $key;
        }
	}
	return -1;
}
?>
<?php
function trouveA($tab, $val,$val1) {
    foreach ($tab as $key1=>$entry) {
        if ( ($val == $entry['Login']) && ($val1 == $entry['Password']) ) {
            //if ( $entry['Statut']=="A" ){
			return $key1;
			//}
        }
    }
    return -1;
}
?>

<?php
	if ( isset($_POST['valider'])) { 
		if( !empty($_POST['login']) && !empty($_POST['pwd'])  ) {
			$tab1=file_get_contents('./BD/compteUser.json');
			$tab1=json_decode($tab1,true);
			$jou=lesjoueur($tab1);
			$j= trouveJ($jou,$_POST['login'],$_POST['pwd']);
				if ( $j !=-1 ){
					$_SESSION['Prenom']=$jou[$j]['Prenom'];
					$_SESSION['Nom']=$jou[$j]['Nom'];
					$_SESSION['Tof']=$jou[$j]['Avatar'];
					$_SESSION['log']="on";
					//$_SESSION["Score"]=$jou[$j]['Score'];
	
					//$result="joueur";	
					header("location:./PHP/QUIZZ/genere.php");	
					exit();
				}
				else {
					$adm=lesadmin($tab1);
					$a=trouveA($adm,$_POST['login'],$_POST['pwd']);
					if ( $a !=-1 ) {
						$_SESSION['PrenomAd']=$adm[$a]['Prenom'];
					$_SESSION['NomAd']=$adm[$a]['Nom'];
						$_SESSION['TofAd']=$adm[$a]['Avatar'];
						$_SESSION['log']="on";
						$result="admin";
					header("location:./index.php?lien=".$result);
						exit();
					}
					else{
						echo "Login et Password incorrects !";
					}
				}
			}
		}


		function is_connect(){
			if (!isset($_SESSION['log'])){
				header("location:./index.php");
			}
		}
?>