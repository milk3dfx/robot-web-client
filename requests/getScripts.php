<?php
/*
	Get scripts request
*/
session_start();
require_once("../config/generalOptions.php");
echo("{");
try{
	if(!isset($_SESSION['userName']))
		throw new Exception("Session error");

	if (($handle = opendir($ROBOT_SCRIPTS_DIR)) == false)
		throw new Exception("Error open scripts directory");

	$amount = 0;
	echo("type:'succeed',");
	echo("data:[");
	while (false !== ($entry = readdir($handle))) {
		if($entry!="." && $entry != ".."){
			echo("'$entry', ");
			$amount++;
		}
	}
	echo("]");
	closedir($handle);
}
catch(Exception $e){
	echo(" type : 'error', ");
	echo(" msg : '".$e->getMessage()."'");
}
echo("}");
?>
