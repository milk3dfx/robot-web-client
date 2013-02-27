<?php
session_start();
require_once("../config/users.php");

if(!isset($_SESSION['userName'])){
	foreach ($USERS as $userName => $pass) {
		if($_GET['userName']==$userName && $_GET['pass']==$pass){
			$_SESSION['userName'] = $_GET['userName'];
			echo("Succeed");
			break;
		}
	}
	if(!isset($_SESSION['userName']))
		echo("Login or password is incorrect");
}else{
	echo("You already login");
}
?>
