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
                  {
                     scriptName: $(this).html()
                  },
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

// Body onload event function
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