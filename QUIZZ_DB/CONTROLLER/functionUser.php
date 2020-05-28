<?php
function is_connect(){
	if (!isset($_SESSION['log'])){
		header("location:./index.php");
	}
}
?>