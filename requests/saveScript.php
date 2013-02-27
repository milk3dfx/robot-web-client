<?php
session_start();
require_once("../config/generalOptions.php");
echo("{");
try{
	if(!isset($_SESSION['userName']))
		throw new Exception("Session error");
	if(!preg_match("/^[a-zA-z1-9_\s-]+.lua$/", $_POST['scriptName']))
		throw new Exception("Wrong script name");
	
	file_put_contents($ROBOT_SCRIPTS_DIR.$_POST['scriptName'], $_POST['scriptText']);
	
	echo("'type' : 'succeed', msg: 'Script successfully saved'");
}
catch(Exception $e){
	echo(" type : 'error', ");
	echo(" msg : '".$e->getMessage()."'");
}
echo("}");
?>
