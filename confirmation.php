<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>prototype php</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="index.js" type="text/javascript"></script>
		<script src="jquery.js" type="text/javascript"></script>
		<link rel="stylesheet" href="generatorstyle.css">

	</head>
		<body>
			<?php
				if(isset($_POST['title'])){
				$_title = $_POST['title'];			
				}
				if(isset($_POST['fname'])){
				$_fname = $_POST['fname'];			
				}
				if(isset($_POST['lname'])){
				$_lname = $_POST['lname'];
				$folder = $_lname;
				if(!file_exists("faculty/$folder/uploads/images")){
					mkdir("faculty/$folder/uploads/images", 0777, true);
				}else{
					print "";
				}
				if(!file_exists("faculty/$folder/style")){
					mkdir("faculty/$folder/style", 0777, true);
				}else{
					print "";
				}
				}
				if(isset($_POST['email'])){
				$_email = $_POST['email'];			
				}
				if(isset($_POST['schooling'])){
				$_schooling = $_POST['schooling'];			
				}
				if(isset($_POST['graduation'])){
				$_graduation = $_POST['graduation'];			
				}
				if(isset($_POST['bio'])){
				$_bio = $_POST['bio'];			
				}
				if(isset($_POST['submit'])){
				$_files = $_FILES["fileToUpload"]["name"];
				$tmp_name = $_FILES['fileToUpload']['tmp_name'];
				$file_type = pathinfo($_files,PATHINFO_EXTENSION);
				$new_name = "$_lname".time().".jpg";
				$error = $_FILES['fileToUpload']['error'];
					if(isset($_files)){
						$check = getimagesize($_FILES['fileToUpload']['tmp_name']);
						if($check !== false){
							if(!empty($_files)){
								$path = "faculty/$folder/uploads/images/";
								if  (move_uploaded_file($tmp_name, $path.$new_name)){
									echo 'Uploaded';    
									}
								}else{
									echo "please try again";
								}
							}else{
								echo "File is not an image.";
							}
						}
					}
				$file = fopen("faculty/$folder/$_lname.php", "w");
				$file2 = fopen("faculty/$folder/style/style.css", "w");
				fwrite($file,
"<!DOCTYPE html>
	<html lang='en'>
		<head>
			<meta charset='utf-8'>
			<title>prototype php</title>
			<meta name='viewport' content='width=device-width, initial-scale=1.0'>
			<script src='index.js' type='text/javascript'></script>
			<script src='jquery.js' type='text/javascript'></script>
			<link rel='stylesheet' href='style/style.css'>
		</head>
			<body>
			<div id='wrapper'>
				<h1>$_title</h1>
				<img class='personal_image' src='uploads/images/$new_name'>
				<p><strong>First name</strong>: $_fname</p>
				<p><strong>Last name</strong>: $_lname</p>
				<p><strong>Email</strong>: $_email</p>
				<p><strong>School</strong>: $_schooling</p>
				<p><strong>Grad Type</strong>: $_graduation</p>
				<p><strong>Bio</strong>: $_bio</p>
				</div>
			</body>
	</html>");
				fwrite($file2,
"#wrapper{
	width: 80%;
	margin: auto;
	margin-top: 20%;
	color: white;
	text-align: center;
	border-top: 1px solid black;
	border-bottom: 1px solid black;
}
body{
	background-color: purple;
}
.personal_image{
	height: 50%;
	width: 50%;
}");
					print "<p>Your page has been created! The link is below.</p>";
					print "<a href='faculty/$folder/$_lname.php'>$_fname $_lname's page.</a>"
			?>
		</body>
</html>