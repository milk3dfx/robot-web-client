
$(document).ready(function () {
	$("#submit_button").click(function(){
		$.get("requests/login.php",
		{
			userName: $("#login_input").val(),
			pass: $("#pass_input").val()
		},
		function(data){
			if(data=="Succeed"){
				window.location.replace("robot.php");
			}else{
				alert(data);
			}
		});
	});
});