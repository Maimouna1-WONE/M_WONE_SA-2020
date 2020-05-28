<?php
include "./PHP/JOUEUR/FuncConnexion.php";
is_connect();

ob_start();
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<?php
$valu=file_get_contents('./BD/nombre.json');
    $valu=json_decode($valu,true);
    ?>
<?php
$jeu=$valu['jeu'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface joueur</title>
    <base href="./">
    <script type="text/javascript" src="style/JS/ScriptDroiteJeu.js"></script>
    <link rel="stylesheet" type="text/css" href="style/css/joueur.css<?php echo "?".rand();?>">
    <link rel="stylesheet" type="text/css" href="style/css/ScriptDroiteJeu.css<?php echo "?".rand();?>">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap" rel="stylesheet"> 
</head>
<body>
	<footer>
		<div id="form">
			<div id="formHaut">
                <div id="avatar">
                    <img id="av" src="./style/AVATAR/<?php echo $_SESSION['Tof']; ?>" height="98" alt="photoJ" />
                    <h4><?php echo $_SESSION["Prenom"].' '.$_SESSION["Nom"] ;?></h4> 
                </div>
                <form id="reponse" method="post" action="./PHP/JOUEUR/deconnexion.php">
				    <button id ="bouton" type="submit" name="valider" onclick="return confirm('Voulez-vous vraiment vous deconnecter ?');"><h3>Deconnexion</h3></button>
                </form>
                <center>
                    <label>
                        <h2>BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ</h2>
                    </label>
                </center>
                <center>
                    <label>
                        <h6>JOUER ET TESTER VOTRE NIVEAU DE CULTURE GENERALE</h6>
                    </label>
                </center>	
			</div>
			<div id="formBas">
                <div id="GD">
                    <div id="gauche">
<?php	
                            $terminus = $valu['val'];
                            $tab3=file_get_contents('./BD/creerQuestion.json');
                            $tab3=json_decode($tab3,true);
                            if ( $terminus <=count($tab3) && $terminus >=5 ) {      
                                $total=$terminus;
                                $nbValParPage=1;
                                $nbrepage=ceil($total/$nbValParPage);
                                echo '</br>';
                                if (isset($_GET['page'])){
                                    $pageAct=$_GET['page'];
                                    $pageEncours=$pageAct;
                                    if( ($pageAct>$nbrepage) ){ 
                                        $pageAct=$nbrepage;    
                                    }
                                }
                                else{
                                    $pageAct=1;
                                    $pageEncours=1;
                                }
                                $indDep=($pageAct-1)*$nbValParPage;
                                $indFin=$indDep+$nbValParPage-1;
                                for ($i=$indDep;$i<=$indFin;$i++){
                                    $k=$jeu[$i]['num'];
?>
                    <form id="quizz" method="post" action="<?php echo './index.php?lien=joueur&page='.($pageEncours+1).'';?>">
                    <div id="G1">         
                        <div id="maina">
                            <center>
                                <label>
                                    <h5>Question <?php echo ($i+1).'/'.$total.': ';?></h5></br><?php echo $tab3[$k]['Question']; ?>
                                </label>
                            </center>   
                        </div> 
                    </div>                    
                    <div id="G2">
                        <label id="input21" ><?php echo $tab3[$k]['Score'].' pts'; ?></label>
                    </div>
                    <div id="G3">   
                        <input type="hidden" name="type" value="<?php echo $tab3[$k]['Choix'];?>" id="type" />                      
<?php
                            if ($tab3[$k]['Choix']=='cs' || $tab3[$k]['Choix']=='cm' ){
                                for ($n=0;$n<count($tab3[$k]['Reponse']);$n++){
	                                if ($tab3[$k]['Choix']=="cs"){
?>
</br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      
<?php
                            echo 'REP  '.($n+1);
?>
                        <input style="width:15px; height:15px" class="ck" type="radio" name="fichier" id="r" value="<?php echo ($n+1);?>"/></b>
<?php
                                    }
	                                if ($tab3[$k]['Choix']=="cm"){
?>
</br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
                            echo 'REP  '.($n+1);
?>
                        <input style="width:15px; height:15px" class="ck" type="checkbox" name="fichierC<?php echo '['.$n.']';?>" id="c" value="<?php echo ($n+1);?>"/></b>
<?php
                                    }
?>
&nbsp;&nbsp;
                        <b><?php
                                echo $tab3[$k]['Reponse'][$n];
                            ?></b></br>
<?php
                                }
                            }
                            if ($tab3[$k]['Choix']=='ct'){ 
?>
</br> </br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
                            echo 'REP ';
?>
                        <b><input style="width:300px; height:40px; border-style: solid;border-width: 2px; border-color: aquamarine;" type="text" name="text" id="t"/></b></br>
<?php
                            }
?>
<?php    
                        }    
                    }
                    else {
                        echo 'Le nombre de questions par jeu doit etre inferieur aux nombres total de questions et superieur ou egal a 5';
                    }
?>
                    </div>  
                    <div id="G4">
<?php
                            if ($pageEncours<$nbrepage){
?>
                        <button id ="bouton2" type="submit" name="valider5">
                            <h3>Suivant</h3>
                        </button>
<?php
                            }
?>            
                    </form>
                    <form id="myform" method="post" action="<?php echo './index.php?lien=joueur&page='.($pageEncours-1).'';?>">
<?php
                        if ($pageEncours-1>0) {
?>
					<button id ="bouton3" type="submit" name="valider">
                        <center>
                            <h3>Precedent</h3>
                        </center>
                    </button>
<?php
                        }
?>
                       </form>
<?php
                        if ($pageEncours==$nbrepage){
?>
                    <button id ="bouton2" type="submit" name="valider6">
                        <h3>Terminer</h3>
                    </button>           
<?php
                        }
?>
                </div>
            </div>
<?php
    $joueur=array();
    if ( (isset($_POST['valider5'])) || (isset($_POST['valider6'])) ) {
        if (isset($_POST['fichierC']) && (is_array($_POST['fichierC']))) {    
            $liste_bouton = $_POST['fichierC'];
            foreach($liste_bouton as $key => $data) {
                $joueur['rep'][]=$data;
            }
        }
        if (isset($_POST['fichier'])){
        $joueur['rep'][]=$_POST['fichier'];}
        if (isset($_POST['text'])){
        $joueur['rep'][]=strtoupper($_POST['text']);}
        $_SESSION['joueur'][]=$joueur;
        if(isset($_POST['valider6'])) {
            $result="final";
            header("location:./index.php?lien=".$result);
            exit();
            ob_end_flush();
        }
    }
    if ( isset($_POST['valider']) ) {
        $pop=array_pop($_SESSION['joueur']);
       }   
?>
                <div id="droite">
                    <div class="onglets">
                        <span class="onglet_0 onglet" id="onglet_quoi" onclick="javascript:change_onglet('quoi');">
                            <center>Top score</center>
                        </span>
                        <span class="onglet_0 onglet" id="onglet_qui" onclick="javascript:change_onglet('qui');">
                            <center>Mon meilleur Score</center>
                        </span>
                    </div>
                    <div class="contenu_onglets">
                        <div class="contenu_onglet" id="contenu_onglet_quoi">
                        <?php  
                         include "./PHP/JOUEUR/listeJoueurDroite.php";
                        // include "./PHP/JOUEUR/FuncConnexion.php";
                        $tab4=file_get_contents('./BD/compteUser.json');
                        $tab4=json_decode($tab4,true);
                        $jou=lesjoueur($tab4);
                        usort($jou,"cmp");
                        table($jou);           
                        ?>
                </div>
            <div class="contenu_onglet" id="contenu_onglet_qui">
               <b id="ms"> <?php if ($j=trouveJou($tab4,$_SESSION['Nom'],$_SESSION['Prenom'])){ echo $tab4[$j]["Score"];} ?></b>
            </div>
        </div>
    </div>
    </div>
	</div>
	</div>

</footer>
<script>
    anc_onglet = 'quoi';
    change_onglet(anc_onglet);
</script>

<script>
    anc_onglet1 = 'qui';
    change_onglet(anc_onglet1);
</script>
</body>
</html>