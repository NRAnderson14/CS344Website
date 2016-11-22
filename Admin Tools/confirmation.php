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
				$_status = $db->query("SELECT status FROM `subs`;");
				foreach ($_status as $_stat){
					$page_status = $_stat['status'];
				}
				$_bachelors = "";
				$_masters = "";
				$_phd = "";
				if($page_status == 'TRUE'){
				//if(isset($_POST['title'])){
				//$_title = $_POST['title'];			
				//}
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
				//if(isset($_POST['graduation'])){
				//$_graduation = $_POST['graduation'];			
				//}
				if(isset($_POST['bio'])){
				$_bio = $_POST['bio'];			
				}
				if(isset($_POST['quote'])){
				$_quote = $_POST['quote'];			
				}
				if(isset($_POST['bachelors'])){
				$_bachelors = $_POST['bachelors'];
					if($_bachelors = "on"){
						$_bachelors = "Bachelors";
					}else{
						
					}
				}
				if(isset($_POST['masters'])){
				$_masters = $_POST['masters'];	
					if($_masters = "on"){
						$_masters = "Masters";
					}else{
					}				
				}
				if(isset($_POST['phd'])){
				$_phd = $_POST['phd'];
					if($_phd = "on"){
						$_phd = "PHD";
					}else{
					}				
				}
				if(isset($_POST['monstart'])){
				$_monstart = $_POST['monstart'];
				}
				if(isset($_POST['monend'])){
				$_monend = $_POST['monend'];
				}
				if(isset($_POST['tuestart'])){
				$_tuestart = $_POST['tuestart'];				
				}
				if(isset($_POST['tueend'])){
				$_tueend = $_POST['tueend'];				
				}
				if(isset($_POST['wedstart'])){
				$_wedstart = $_POST['wedstart'];				
				}
				if(isset($_POST['wedend'])){
				$_wedend = $_POST['wedend'];				
				}
				if(isset($_POST['thustart'])){
				$_thustart = $_POST['thustart'];				
				}
				if(isset($_POST['thuend'])){
				$_thuend = $_POST['thuend'];				
				}
				if(isset($_POST['fristart'])){
				$_fristart = $_POST['fristart'];				
				}
				if(isset($_POST['friend'])){
				$_friend = $_POST['friend'];				
				}
				if(isset($_POST['captionimageheading'])){
				$_captionimageheading = $_POST['captionimageheading'];
				}
				if(isset($_POST['extratext'])){
				$_extratext = $_POST['extratext'];			
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
									/*
									$rows = $db->query("
										create database if not exists `users`;
										use `users`;

										DROP TABLE if exists `subs`;
										create table `subs`(
										username			varchar(255),
										password			varchar(255));
										
										INSERT INTO `subs` (username,password) VALUES('admin','password');");
									*/
									
							
									
				$_files2 = $_FILES["extrapic"]["name"];
				$tmp_name2 = $_FILES['extrapic']['tmp_name'];
				$file_type2 = pathinfo($_files,PATHINFO_EXTENSION);
				$new_name2 = "$_lname".time().".jpg";
				$error2 = $_FILES['extrapic']['error'];
					if(isset($_files2)){
						$check2 = getimagesize($_FILES['extrapic']['tmp_name']);
						if($check2 !== false){
							if(!empty($_files2)){
							$path2 = "faculty/$folder/uploads/images/";
								if  (move_uploaded_file($tmp_name2, $path2.$new_name2)){
									echo 'Uploaded2'; 
									}
								}else{
									echo "please try again";
								}
							}else{
								echo "File is not an image.";
							}
						}
					}
					$adminFile = fopen("faculty.txt","a");
					fwrite($adminFile,"FNAME: $_fname".PHP_EOL);
					fwrite($adminFile,"LNAME: $_lname".PHP_EOL);
					fwrite($adminFile,"EMAIL: $_email".PHP_EOL);
					fwrite($adminFile,"SCHOOL: $_schooling".PHP_EOL);
					fwrite($adminFile,"BIO: $_bio".PHP_EOL);
					fwrite($adminFile,"QUOTE: $_quote".PHP_EOL);
					fwrite($adminFile,"DEGREE1: $_bachelors".PHP_EOL);
					fwrite($adminFile,"DEGREE2: $_masters".PHP_EOL);
					fwrite($adminFile,"DEGREE3: $_phd".PHP_EOL);
					fwrite($adminFile,"CAPTION: $_captionimageheading".PHP_EOL);
					fwrite($adminFile,"EXTRA: $_extratext".PHP_EOL);
					
					fwrite($adminFile,"MONDAYSTART: $_monstart".PHP_EOL);
					fwrite($adminFile,"MONDAYEND: $_monend".PHP_EOL);
					fwrite($adminFile,"TUESDAYSTART: $_tuestart".PHP_EOL);
					fwrite($adminFile,"TUESDAYEND: $_tuestart".PHP_EOL);
					fwrite($adminFile,"WEDNESDAYSTART: $_wedstart".PHP_EOL);
					fwrite($adminFile,"WEDNESDAYEND: $_wedend".PHP_EOL);
					fwrite($adminFile,"THURSDAYSTART: $_thustart".PHP_EOL);
					fwrite($adminFile,"THURSDAYEND: $_thuend".PHP_EOL);
					fwrite($adminFile,"FRIDAYSTART: $_fristart".PHP_EOL);
					fwrite($adminFile,"FRIDAYEND: $_friend".PHP_EOL);
					
					//fwrite($adminFile,"GRAD TYPE: $_graduation".PHP_EOL);
					fwrite($adminFile,"BIO: $_bio".PHP_EOL);
									//fwrite($adminFile,"USERNAME: username".PHP_EOL);
									//fwrite($adminFile,"PASSWORD: password".PHP_EOL);
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
			<h1>STYLE SHEET IN PROGRESS...</h1>
				<img class='personal_image' src='uploads/images/$new_name'>
				<img class='personal_image' src='uploads/images/$new_name2'>
				<p><strong>First name</strong>: $_fname</p>
				<p><strong>Last name</strong>: $_lname</p>
				<p><strong>Email</strong>: $_email</p>
				<p><strong>School</strong>: $_schooling</p>
				<p><strong>Bio</strong>: $_bio</p>
				<p><strong>Quote</strong>: $_quote</p>
				<p><strong>Degree1</strong>: $_bachelors</p>
				<p><strong>Degree2</strong>: $_masters</p>
				<p><strong>Degree3</strong>: $_phd</p>
				<p><strong>Caption</strong>: $_captionimageheading</p>
				<p><strong>Extra info</strong>: $_extratext</p>
				<p><strong>MONDAY1</strong>: $_monstart</p>
				<p><strong>MONDAY2</strong>: $_monend</p>
				<p><strong>TUESDAY1</strong>: $_tuestart</p>
				<p><strong>TUESDAY2</strong>: $_tueend</p>
				<p><strong>WEDNESDAY1</strong>: $_wedstart</p>
				<p><strong>WEDNESDAY2</strong>: $_wedend</p>
				<p><strong>THURSDAY1</strong>: $_thustart</p>
				<p><strong>THURSDAY2</strong>: $_thuend</p>
				<p><strong>FRIDAY1</strong>: $_fristart</p>
				<p><strong>FRIDAY2</strong>: $_friend</p>
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
					print "<a href='faculty/$folder/$_lname.php'>$_fname $_lname's page.</a>";
					$_status = $db->query("UPDATE subs SET status='FALSE';");
				}else{
					print "Sorry, you are not logged in.";
					$_status = $db->query("UPDATE subs SET status='FALSE';");
				}
			?>
		</body>
</html>