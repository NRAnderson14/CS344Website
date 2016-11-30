<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>prototype php</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="js/index.js" type="text/javascript"></script>
		<script src="js/jquery.js" type="text/javascript"></script>
		<link rel="stylesheet" href="style.css">

	</head>
		<body>
			<?php
				$db = new PDO("mysql:dbname=users;host=localhost","root");
				if(isset($_POST['postinput1']) && isset($_POST['postinput2'])){
					$_username = $_POST['postinput1'];
					$_password = $_POST['postinput2'];
					$rows = $db->query("SELECT DISTINCT username,password FROM subs;");
				foreach($rows as $row){
					if($row['username']==$_username&&$row['password']==$_password){
						$_status = $db->query("UPDATE subs SET status='TRUE';");
						?>
				<?php
					include("form.php");
					}else{
						print "<p>FALSE</p>";
						}
					}
				}
			?>
		</body>
	</html>