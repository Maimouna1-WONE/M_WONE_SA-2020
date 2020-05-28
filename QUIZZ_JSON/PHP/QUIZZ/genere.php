<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php
include "../../PHP/JOUEUR/listeJoueurDroite.php";
$valu=file_get_contents('../../BD/nombre.json');
$valu=json_decode($valu,true);
if (empty($valu['val'])) {
$valu['val']=5;
}
$terminus = $valu['val'];
$tab3=file_get_contents('../../BD/creerQuestion.json');
$tab3=json_decode($tab3,true);
$qstio = array();
$q=(count($tab3)-1);
$t = range(0, $q);
$tab=file_get_contents('../../BD/compteUser.json');
$tab=json_decode($tab,true);
        $m=0;
        while ($m<$terminus){
            shuffle($t);
				$k=array_pop($t);
				$j=trouveJou($tab,$_SESSION['Nom'],$_SESSION['Prenom']);
				if ($j!=-1){
				if (!empty($tab[$j]['True'])) {
				if ( count($tab3)-count($tab[$j]['True'])>=5 ){
                if( !in_array($tab3[$k]['Question'],$tab[$j]["True"],true) ) {
                    $qstio["qest"]=$tab3[$k]['Question'];
                    $qstio["num"]=$k;
                    $valu['jeu'][]=$qstio;
                    $valu["Score"]=0;
                    $js1=json_encode($valu);
                    file_put_contents('../../BD/nombre.json',$js1);
                    $m++;
					}
				}
				else{
					echo "JEU INDISPONIBLE";
				}
			}
				else{
					for($m=0;$m<$terminus;$m++){
						shuffle($t);
						$k=array_pop($t);
					$qstio["qest"]=$tab3[$k]['Question'];
					$qstio["num"]=$k;
					$valu['jeu'][]=$qstio;
					$valu["Score"]=0;
					$js1=json_encode($valu);
					file_put_contents('../../BD/nombre.json',$js1);
					}
					
				}
			}
		}
	
$result="joueur";
header("location:../../index.php?lien=".$result);
	?>