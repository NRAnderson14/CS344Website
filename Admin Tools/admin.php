<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>prototype index</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="js/index.js" type="text/javascript"></script>
		<script src="js/jquery.js" type="text/javascript"></script>
		<link rel="stylesheet" href="style/style(1).css">
		<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900|Slabo+27px" rel="stylesheet">

	</head>
		<body>
			<?php
				include '../header.html';
				$db = new PDO("mysql:dbname=users;host=localhost","root");
				$_status = $db->query("UPDATE subs SET status='FALSE';");
			?>
			<!--
			<div class="sidebar">
                <div class="links">
                <a src=""> YOUR<br> WEBSITE</a>
                <a src=""> MANAGE YOUR <br>TUTOR HOURS</a>
                <a src=""> CREATE<br> EVENTS</a>
                </div>
            </div>
			-->
			<div id="form_div">
				<form class="custom_page_form" id="form1">
					<ul>
						<li>
							<label for="username">USERNAME:</label>
							<input type="text" name="username" id="username" required>
						</li>
						<li>
							<label for="password">PASSWORD:</label>
							<input type="password" name="password" id="password" required>
						</li>
						<li>
							<input type="button" value="submit" id="button1">
						</li>
					</ul>
				</form>
				<div id="ajax">
				</div>
			</div>
		</body>
</html>