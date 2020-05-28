<?php
session_start();
unset($_SESSION['log']);
session_destroy();

$val=file_get_contents('./BD/nombre.json');
$val=json_decode($val,true);
unset($val);
$js1=json_encode($val);
file_put_contents('../../BD/nombre.json',$js1);

header("location: ../../index.php?log=off");
?>
