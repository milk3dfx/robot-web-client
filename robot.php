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
   <script type="text/javascript" src="libs/jquery.js">
   </script>
   <script>
      // Get scripts list
      function getScriptsList(){
         $("#robot_scripts_list").html("");
         $.get(
            "requests/getScripts.php",
            function(data){
               data = eval("("+data+")");
	       var sArr = data.data;
               for(var i = 0; i < sArr.length; i++){
                  var scriptElement = $(document.createElement("div")).html(sArr[i]).addClass("scriptNames")
                  .click(function(){
                     $("#active_script_name").html($(this).html());
                     // Get script request
                     $.get(
                        "requests/getScript.php",
                        { scriptName: $(this).html() },
                        function(data){
                           $("#script_text").val(data);
                           //$("#script_storage").html(data.replace(/\n/g, "<br>"));
                        }
                     );
                  });
                  $("#robot_scripts_list").append(scriptElement);
               }
            }
         );
      }
   
      function init(){
         getScriptsList();
      
         // New script button
         $("#new_script_button").click(function(){
            $("#script_text").val("");
            $("#active_script_name").html("Empty.lua");
         });
         // Run script button
         $("#run_script_button").click(function(){
            $.get(
               "requests/runScript.php",
               { scriptName: $("#active_script_name").html() },
               function(data){
                  //$("#script_storage").html(data.replace(/\n/g, "<br>"));
                  alert("done");
               }
            );
         });
         // logout button
         $("#logout_button").click(function(){
            $.get(
               "requests/logout.php",
               function(data){
                  if(data=="Succeed")
					window.location.replace("index.php");
				}
            );
         });
         // Save script button
         $("#save_script_button").click(function(){
            var sName = $("#active_script_name").html();
            if(sName == "Empty.lua"){
               sName = window.prompt("Enter the file name:","Empty.lua");
               if(sName==""){
                  alert("Wrong file name");
                  return;
               }
               if(sName==null)
                  return;
                $("#active_script_name").html(sName);  
            }
            $.post(
               "requests/saveScript.php",
               {
                  scriptName: sName, 
                  scriptText: $("#script_text").val()
               },
               function(data){
                  data = eval("("+data+")");
                  alert(data.msg);
				}
            );
         });
         // Delete script
         $("#delete_script_button").click(function(){
            confirm("Do you really want to delete this script?");
         });
      }
   </script>
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
