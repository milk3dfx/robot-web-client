<?php
session_start();
require_once("../config/generalOptions.php");

$file = $_GET['scriptName'];
if(preg_match("/^[a-zA-z1-9_\s-]*.lua$/", $file)){
	readfile($ROBOT_SCRIPTS_DIR.$file);
}else{
	echo("-error-");
}
?>
