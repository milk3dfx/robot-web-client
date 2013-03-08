<?php
	require_once("include/session.php");
?>
<!DOCTYPE HTML>
<html>
<head>
   <title>Robot</title>
   <link rel="stylesheet" type="text/css" href="css/robot.css">
   <style type="text/css">

   </style>
   <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
   <script type="text/javascript" src="robot.js"></script>
</head>
<body onload = "init()">
<div id = "logout_button" class = "buttons">logout</div>
<h1>Robot Rrogram terminal</h1>
<div  id = "main_area">
   <div id = "robot_scripts">
      <h4>Scripts:</h4>
      <div id = "robot_scripts_list"></div>
   </div>
   <div id = "work_area">
      <h4 id = "active_script_name">Empty.lua</h4>
      <div id = "new_script_button" class = "buttons">New</div>
      <div id = "run_script_button" class = "buttons">RUN</div>
      <div id = "save_script_button" class = "buttons">Save</div>
      <div id = "delete_script_button" class = "buttons">Delete</div>
      
      <div id = "script_edit_area">
         <form id = "script_edit_form">
         <textarea id = "script_text"></textarea>
         </form>
      </div>
      
      <div id = "script_dysplay_area">
         <div id = "script_storage"></div>
      </div>
   </div>
</div>
</body>
</html>
