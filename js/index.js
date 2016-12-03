window.onload = init;
count = 0;
var input1;
var input2;
function init() {
	document.getElementById("button1").onclick = post;
	document.getElementById("password").onkeypress = myFunction;
	document.getElementById("username").onkeypress = myFunction;
}
function myFunction(e){
	if(e.keyCode === 13){
		if(document.getElementById("username").value == "" || document.getElementById("password").value == ""){
			if(count == 0){
				alert("Please fill out the rest of the fields.");
			}
		}else{
			post();
		}
	}
}

function post(){
	username = $('#username').val();
	passwords = $('#password').val();
	$.post('adminConfirm.php',{postinput1:username,postinput2:passwords}, function(data){
		
		$('#ajax').html(data);
		if($("p").html() == "FALSE"){
			alert("Incorrect Username or Password, please try again.");
			$('#ajax').hide();
			window.location.reload(true);
		}else{
			$('header').html("<h1 class='header'>Custom Page Generator</h1>");
			$("#form1").hide();
		}
	});	
	
}