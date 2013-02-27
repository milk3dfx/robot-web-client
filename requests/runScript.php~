<?php
session_start();
require_once("../config/generalOptions.php");
echo("{");
try{
	if(!isset($_SESSION['userName']))
		throw new Exception("Session error");

	$file = $_GET['scriptName'];

	if(!preg_match("/^[a-zA-z1-9_\s-]+.lua$/", $file))
		throw new Exception("Wrong script name");

	exec($ROBOT_INTERPRETER_PATH." ".$file,$output);
	echo("Program output:<br>");
	foreach($output as $str){
		echo($str."<br>");
	}
}
catch(Exception $e){
	echo(" type : 'error', ");
	echo(" msg : '".$e->getMessage()."'");
}
echo("}");
?>
