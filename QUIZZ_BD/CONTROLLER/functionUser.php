<?php
if(!isset($_SESSION)){ 
    session_start(); 
} 
?>
<?php
function is_connect(){
	if (!isset($_SESSION['log'])){
		header("location:./index.php");
	}
}
?>
<?php
if (isset($_POST['connect'])){
    require_once ("../MODEL/modele.php");
	if (!empty($_POST['login']) && !empty($_POST['pwd'])){
        $req3=getActifPlayers();
        while ($tabJ = $req3->fetch(PDO::FETCH_ASSOC)){
            $res=check($tabJ,$_POST['login'],$_POST['pwd']);
            if ($res!=null){
                $_SESSION['prenom']=substr($res['firstName'],0,1);
                $_SESSION['nom']=$res['lastName'];
                $_SESSION['avatar']=$res['avatar'];
                $_SESSION['score']=$res['score_jr'];
                $_SESSION['idJ']=$res['id'];
                $result="joueur";
                $_SESSION['log']="on";
                header("location:./../index.php/lien=$result");
                exit();
            }
        }
        $req4=getActifAdmin();
        while ($tabA = $req4->fetch(PDO::FETCH_ASSOC)){
            $res1=check($tabA,$_POST['login'],$_POST['pwd']);
            if ($res1!=null){
                $_SESSION['prenom']=substr($tabA['firstName'],0,1);
                $_SESSION['nom']=$tabA['lastName'];
                $_SESSION['avatar']=$tabA['avatar'];
                $_SESSION['id']=$tabA['id'];
                $result="admin";
                $_SESSION['log']="on";
                header("location:./../index.php?lien=$result");
                exit();
            }
        }
        if ($res==null || $res1==null){
            echo "Les informations entrées sont invalides";
        }        
    }
}
?>
