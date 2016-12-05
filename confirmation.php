<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>prototype php</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="js/index.js" type="text/javascript"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!--Where is this?-->
        <link rel="stylesheet" href="Style/Confirmationstyle.css">

	</head>
		<body>
			<?php
            include "header.html";
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
				if(!file_exists("Faculty/$folder/uploads/images")){
					mkdir("Faculty/$folder/uploads/images", 0777, true);
										
				}else{
					print "";
				}
				if(!file_exists("Faculty/$folder/style")){
					mkdir("Faculty/$folder/style", 0777, true);
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
						$degreeTitle = "";
					}else{
						
					}
				}
				if(isset($_POST['masters'])){
				$_masters = $_POST['masters'];	
					if($_masters = "on"){
						$_masters = "Masters";
						$degreeTitle = "";
					}else{
					}				
				}
				if(isset($_POST['phd'])){
				$_phd = $_POST['phd'];
					if($_phd = "on"){
						$_phd = "PHD";
						$degreeTitle = "Dr. ";
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
				if(isset($_POST['room'])){
				$_room = $_POST['room'];
				}
				if(isset($_POST['style'])){
				$_style = $_POST['style'];
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
								$path = "Faculty/$folder/uploads/images/";
								if  (move_uploaded_file($tmp_name, $path.$new_name)){
									echo '';
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
										password			varchar(255),
										status				varchar(255));
										
										INSERT INTO `subs` (username,password,status) VALUES('admin','password',FALSE);");
									*/
									
							
									
				$_files2 = $_FILES["extrapic"]["name"];
				$tmp_name2 = $_FILES['extrapic']['tmp_name'];
				$file_type2 = pathinfo($_files,PATHINFO_EXTENSION);
				$new_name2 = "$_fname".time().".jpg";
				$error2 = $_FILES['extrapic']['error'];
					if(isset($_files2)){
						$check2 = getimagesize($_FILES['extrapic']['tmp_name']);
						if($check2 !== false){
							if(!empty($_files2)){
							$path2 = "Faculty/$folder/uploads/images/";
								if  (move_uploaded_file($tmp_name2, $path2.$new_name2)){
									echo ''; 
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
					$facultyFile = fopen("faculty/$_lname/$_lname.txt","w");
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
					fwrite($adminFile,"ROOM: $_room".PHP_EOL);
					
					fwrite($facultyFile,"FNAME: $_fname".PHP_EOL);
					fwrite($facultyFile,"LNAME: $_lname".PHP_EOL);
					fwrite($facultyFile,"EMAIL: $_email".PHP_EOL);
					fwrite($facultyFile,"SCHOOL: $_schooling".PHP_EOL);
					fwrite($facultyFile,"BIO: $_bio".PHP_EOL);
					fwrite($facultyFile,"QUOTE: $_quote".PHP_EOL);
					fwrite($facultyFile,"DEGREE1: $_bachelors".PHP_EOL);
					fwrite($facultyFile,"DEGREE2: $_masters".PHP_EOL);
					fwrite($facultyFile,"DEGREE3: $_phd".PHP_EOL);
					fwrite($facultyFile,"CAPTION: $_captionimageheading".PHP_EOL);
					fwrite($facultyFile,"EXTRA: $_extratext".PHP_EOL);
					
					fwrite($facultyFile,"MONDAYSTART: $_monstart".PHP_EOL);
					fwrite($facultyFile,"MONDAYEND: $_monend".PHP_EOL);
					fwrite($facultyFile,"TUESDAYSTART: $_tuestart".PHP_EOL);
					fwrite($facultyFile,"TUESDAYEND: $_tuestart".PHP_EOL);
					fwrite($facultyFile,"WEDNESDAYSTART: $_wedstart".PHP_EOL);
					fwrite($facultyFile,"WEDNESDAYEND: $_wedend".PHP_EOL);
					fwrite($facultyFile,"THURSDAYSTART: $_thustart".PHP_EOL);
					fwrite($facultyFile,"THURSDAYEND: $_thuend".PHP_EOL);
					fwrite($facultyFile,"FRIDAYSTART: $_fristart".PHP_EOL);
					fwrite($facultyFile,"FRIDAYEND: $_friend".PHP_EOL);
					fwrite($facultyFile,"ROOM: $_room".PHP_EOL);
					
					//fwrite($adminFile,"GRAD TYPE: $_graduation".PHP_EOL);
					fwrite($adminFile,"BIO: $_bio".PHP_EOL);
									//fwrite($adminFile,"USERNAME: username".PHP_EOL);
									//fwrite($adminFile,"PASSWORD: password".PHP_EOL);
				$file = fopen("Faculty/$folder/$_lname.php", "w");
				$file2 = fopen("Faculty/$folder/style/style.css", "w");
				$file3 = fopen("Faculty/$folder/header.html","w");
				$file4 = fopen("links.txt","w");
				fwrite($file4, "<a href='$_lname.php' alt='link'/>");
				fwrite($file,
"<!DOCTYPE html>
	<html lang='en'>
		<head>
			<meta charset='utf-8'>
			<title>prototype php</title>
			<meta name='viewport' content='width=device-width, initial-scale=1.0'>
			<script src='index.js' type='text/javascript'></script>
			<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js\"></script>
			<link rel='stylesheet' class='nativestyle' href='../Style/style$_style.css'>
			<link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900|Slabo+27px' rel='stylesheet'>
		</head>
			<body>
                
                <?php
                include 'header.html'
                ?>
                
			<div class='wrapper'>
                
                <div class='head'>
                <div class='infofaculty'>
                <h1>$degreeTitle $_fname $_lname</h1>
                </div>
                </div>
				<div class='wrapperimg'>
                <img class='facultypicture' src='uploads/images/$new_name'></div>
                
                <img class='sliderdivider' src='../Images/Slider.png'>
                </div>
                <br>
                
                <div class='backgroundimage'>
                <h1 class='mainheading'>$_phd $_masters $_bachelors - $_schooling</h1>
                
                <h2 class='quote'>$_quote</h2>
                
                <div class='intropara'>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                </div>
                </div>
                <br>
      <div class='eventswrapper'>
              <div class='widget'>
              
                  <div class='events'>
                <h2 class='optionsheading'>
                  OFFICE HOURS</h2>
                  <h3> EMAIL</h3>
                  <p> $_email</p>
                      
                  <h3> OFFICE</h3>
                  <p> $_room</p>
                  
                  <h3>MONDAY:</h3>
                  <p>$_monstart to $_monend</p>
                  
                  <h3>TUESDAY:</h3>
                  <p>$_tuestart to $_tueend</p>
                  
                  <h3>WEDNESDAY:</h3>
                  <p>$_wedstart to $_wedend</p>
                  
                  <h3>THURSDAY:</h3>
                  <p>$_thustart to $_thuend</p>
                      
                  <h3>FRIDAY:</h3>
                  <p>$_fristart to $_friend</p>
                  </div>
              </div>
              
              <div class='verticalline'>
              
              </div>
              
              <div class='widget'>
                  
                  <div class='events'>
                    <h2 class='optionsheading'>
                  CURRENT RESEARCH</h2>
                  <img class='researchimg' src='uploads/images/$new_name2' alt='Research Project'>
                  
                  <h3> $_captionimageheading</h3>
                  <p> $_extratext</p>
                  </div>
                  
              </div>
          
          </div>
          
			</body>
	</html>
");
				
fwrite($file3,
"
     <header><a href='../../index.php'><img src='../Images/winonalogo.png'></a>COMPUTER  SCIENCE</header>
      <nav>
          <a href='../../index.php'>HOME</a>
          <a href=''>PROSPECTIVE STUDENTS</a>
          <a href=''>CURRENT STUDENTS</a>
          <a href='../index.php'>FACULTY</a>
          <a href=''>RESOURCES</a>
      </nav>
");
					print "<h1 class='mainheading'>YOUR PAGE HAS BEEN CREATED! HERE IS THE LINK:</h1>";
					print "<br><div class='wrap'><a class='facultyLink' href='Faculty/$folder/$_lname.php'>$_fname $_lname's page.</a></div>";
					$_status = $db->query("UPDATE subs SET status='FALSE';");
				}else{
					print "Sorry, you are not logged in.";
					$_status = $db->query("UPDATE subs SET status='FALSE';");
				}
			?>
		</body>
</html>