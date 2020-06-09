<?php
function connexion(){
	try
	{
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=quizz_bd;charset=utf8', 'root', '');
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}
	return $bdd;
}
function getUsers()
{
	$bdd=connexion();
    $req = $bdd->query('SELECT * FROM user');
	return $req;
}
function getActifPlayers()
{
	$bdd=connexion();
    $req1 = $bdd->query('SELECT * FROM user WHERE profil=\'joueur\' and statut=1');
	return $req1;
}
function getActifAdmin()
{
	$bdd=connexion();
    $req2 = $bdd->query('SELECT * FROM user WHERE profil=\'admin\' and statut=1');
	return $req2;
}
function getActif()
{
	$bdd=connexion();
    $req3 = $bdd->query('SELECT * FROM user WHERE statut=1');
	return $req3;
}
function check($tab,$val1,$val2)
{
	for($i=0;$i<count($tab);$i++){
		if ($tab['login']==$val1 && $tab['password']==$val2){
			$res=$tab;
		} else{
			$res=null;
		}
	}
	return $res;
}
function lastIdQst()
{
	$bdd=connexion();
    $req4 = $bdd->query('SELECT Max(LAST_INSERT_ID(id_qst)) as lqst FROM question');
	return $req4;
}
function lastIdPart()
{
	$bdd=connexion();
    $req5 = $bdd->query('SELECT Max(LAST_INSERT_ID(id_part)) as lpart FROM part');
	return $req5;
}
function lastIdUser()
{
	$bdd=connexion();
    $req6 = $bdd->query('SELECT Max(LAST_INSERT_ID(id)) as luser FROM user');
	return $req6;
}
function getPlayers()
{
	$bdd=connexion();
    $req7 = $bdd->query('SELECT * FROM user WHERE profil=\'joueur\'');
	return $req7;
}
function getAdmin()
{
	$bdd=connexion();
    $req8 = $bdd->query('SELECT * FROM user WHERE profil=\'admin\'');
	return $req8;
}
function getQuestion()
{
	$bdd=connexion();
    $req9 = $bdd->query('SELECT * FROM question');
	return $req9;
}
function getAnswerforQ()
{
	$bdd=connexion();
    $req10 = $bdd->query('SELECT libelle_qst,libelle_rep,rep_value FROM answer,question where answer.id_qst=question.id_qst');
	return $req10;
}
function getIdPart($tab,$val)
{
	for($i=0;$i<count($tab);$i++){
		if ($tab[$i]['libelle_qst']==$val){
			$res=$tab[$i]['id_part'];
		}
	}
	return $res;
}
function getIdQst($tab,$val)
{
	for($i=0;$i<count($tab);$i++){
		if ($tab[$i]['libelle_qst']==$val){
			$res=$tab[$i]['id_part'];
		}
	}
	return $res;
}
function checkUser($tab,$val1,$val2,$val3)
{
	for($i=0;$i<count($tab);$i++){
		if ($tab['firstName']==$val1 && $tab['lastName']==$val2 && $tab['profil']==$val3){
			$res=$tab;
		} else{
			$res=null;
		}
	}
	return $res;
}
?>