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
							$path2 = "faculty/$folder/uploads/images/";
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
				$file3 = fopen("faculty/$folder/header.html","w");
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
                  <p> Watkins 104</p>
                  
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
                  <img src='uploads/images/$new_name2' alt='Research Project'>
                  
                  <h3> $_captionimageheading</h3>
                  <p> $_extratext</p>
                  </div>
                  
              </div>
          
          </div>
          
			</body>
	</html>
");
				fwrite($file2,
"ul{
		list-style-type: none;
		text-align: center;
		font-family:'Lato';
            font-weight: 300;
            display: block;
            padding-top: 20px;
            padding-bottom: 20px;
           
	}
html{
    background-color: #eeeeee;
}

@media only screen and (min-width: 250px) {
    
    header{
        font-family: 'Lato';
        font-weight: bold;
        font-size:250%;
        color:#333192;
        padding:20px;
        width:95%;
        text-align:center;
    }

    header img{
        float:right;
        vertical-align:top;
        width:100%;
    }

    nav{
        width:100%;
        padding: 15px;
        background-color:#333092;
        text-align: center;
        line-height:30px;
        margin-bottom: 5px;
    }
    
    nav a{
        text-decoration: none;
        color:#f1f1f1;
        font-weight: 100; 
        font-family: Lato;
        letter-spacing: 2px;
        padding-left: 15px;
        padding-right:15px;
        display:block;
        font-size:80%;
    }
    
    br{
        clear: both;
    }
    
    .banner{
        width:100%;
        margin-bottom: 0px;
    }
    
    .mainheading{
        font-family: 'Lato';
        font-weight: bold;
        font-size:150%;
        color:#333192;
        width:100%;
        text-align: center;
    }
    

    
    footer{
        width:100%;
        font-weight: 100; 
        font-family: Lato;
        letter-spacing: 2px;
        text-align: center;
        font-size: 60%;
        position: sticky;
        bottom: auto;
    }
    
    footer img{
        width:100%;
    }
    
    
}

@media only screen and (min-width: 600px) {
    header{
        font-family: 'Lato';
        font-weight: bold;
        font-size:250%;
        color:#333192;
        padding:20px;
        width:95%;
        text-align: center;
    }

    header img{
        float:right;
        vertical-align:20px;
        width:30%;
    }

    nav{
        width:100%;
        padding: 15px;
        background-color:#333092;
        text-align: center;
        line-height:40px;
        margin-bottom: 5px;
    }
    
    nav a{
        text-decoration: none;
        color:#f1f1f1;
        font-weight: 100; 
        font-family: Lato;
        letter-spacing: 2px;
        padding-left: 15px;
        padding-right:15px;
        display:inline;
    }
    
    br{
        clear: both;
    }
    
    .mainheading{
        font-family: 'Lato';
        font-weight: bold;
        font-size:200%;
        color:#333192;
        width:100%;
        text-align: center;
    }
    
    footer{
        width:100%;
        font-weight: 100; 
        font-family: Lato;
        letter-spacing: 2px;
        text-align: center;
        font-size: 60%;
        position: sticky;
        bottom: auto;
    }
    
    footer img{
        width:100%;
    }

    .intropara{
        font-family: 'Slabo 27px';
        font-size:100%;
        width:70%;
        text-align: justify;
        margin: auto;
        font-weight: 100;
        padding-bottom: 60px;
        margin-bottom: 70px;
    }
    
    .wrapper{
        width:100%;
        margin: auto;
        height:222px;
        background-color: #333192;
    }
    
    .infofaculty{
        font-family: Lato;
        color:whitesmoke;
        display: inline-block;
        margin: auto;
        padding-top: 70px;
    }
    
    .sliderdivider{
        height:222px;
        display: inline-block;
        float:right;
        margin-left: -120px;
    }
    
    .facultypicture{
        height:222px;
        z-index: -1;
        float: right;
        margin-left: -120px;
    }
    
    .head{
        width:30%;
        padding-left:10px;
        text-align: center;
        height:222px;
        display: inline-block;
        vertical-align: top;
    }
    
    .quote{
        font-family: 'Slabo 27px';
        font-style:italic;
        font-weight: 300;
        text-align: center;
        font-size: 130%;
        color: #333092;
        width:80%;
        margin: auto;
    }
    
    .eventswrapper{
        margin:auto;
        width:90%;
        text-align: center;
        margin-top: -150px;
    }
    
    .widget{
        display: inline-block;
        width:100%;
        margin: auto;
        margin-left: 20px;
        margin-right: 20px;
    }
    
    .events{
        font-family: Lato;
        background-color: rgba(254,254,254,0.7);
        width:100%;
        display:inline-block;
        height: 300px;
        vertical-align: top;
        text-align: justify;
        border-radius: 2%;
        padding-bottom: 40px;
    }
    
    .optionsheading{
        text-align: center;
        font-size:100%;
        font-weight:400;
        letter-spacing: 2px;
        color:#333092;
        font-family: Lato;
    }
    
    .events h3{
        font-size:80%;
        padding-left: 20px;
        padding-right: 20px;
        margin-bottom: -15px;
        color:#333092;
    }
    
    .events p{
        text-align: left justify;
        font-size:90%;
        padding-left:20px;
        padding-right:20px;
        font-weight: 300;
        color:#333092;
        margin-bottom: -5px;
    }
    
    .events img{
        height:210px;
        object-fit: cover;
        width:90%;
        border-radius: 4px;
        display: block;
        margin: auto;
        margin-top: 20px;
    }
    
    .verticalline{
        height:20px;
    }
    
    .wrapperimg{
        display: inline-block;
        float:right;
    }
     
}

@media only screen and (min-width: 768px) {

    header{
        font-family: 'Lato';
        font-weight: bold;
        font-size:250%;
        color:#333192;
        width:95%;
        text-align: left;
        vertical-align:top;
    }

    header img{
        float:right;
        max-width:250px;
        margin-top: -23px;
    }

    nav{
        width:100%;
        background-color:#333092;
        text-align: justify;
        line-height:20px;
    }
    
    nav a{
        text-decoration: none;
        color:#f1f1f1;
        font-weight: 100; 
        font-family: Lato;
        letter-spacing: 2px;
        padding-left: 15px;
        padding-right:15px;
        display: inline;
    }
    
    br{
        clear: both;
    }
    
    .mainheading{
        font-family: 'Lato';
        font-weight: bold;
        font-size:200%;
        width:80%;
        text-align: center;
        color:#313a49;
        margin: auto;
        margin-top:90px;
    }
    
    footer{
        width:100%;
        font-weight: 100; 
        font-family: Lato;
        letter-spacing: 2px;
        text-align: center;
        font-size: 80%;
        position: sticky;
        bottom: auto;
    }
    
    footer img{
        width:100%;
    }
    
    .intropara{
        font-family: 'Slabo 27px';
        font-size:100%;
        width:70%;
        text-align: justify;
        margin: auto;
        font-weight: 100;
        padding-bottom: 60px;
    }
    
    .wrapper{
        width:100%;
        margin: auto;
        height:222px;
        background-color: #333192;
    }
    
    .infofaculty{
        font-family: Lato;
        color:whitesmoke;
        display: inline-block;
        margin: auto;
        padding-top: 70px;
    }
    
    .sliderdivider{
        height:222px;
        display: inline-block;
        float:right;
        margin-left: -120px;
    }
    
    .facultypicture{
        height:222px;
        z-index: -1;
        float: right;
        margin-left: -120px;
    }
    
    .head{
        width:30%;
        padding-left: 60px;
        text-align: center;
        height:222px;
        display: inline-block;
        vertical-align: top;
    }
    
    .quote{
        font-family: 'Slabo 27px';
        font-style:italic;
        font-weight: 300;
        text-align: center;
        font-size: 130%;
        color: #333092;
        width:80%;
        margin: auto;
    }
    
    .backgroundimage{
        width:100%;
        background-image: url('../uploads/images/DottedBG.png');
        background-position:top;
        background-size: cover;
        height:400px;
        margin-top: -80px;
    }
    
    .wrapperimg{
        display: inline-block;
        float:right;
    }
      
    .eventswrapper{
        margin:auto;
        width:90%;
        text-align: center;
        margin-top: -150px;
    }
    
    .widget{
        display: inline-block;
        width:42%;
        margin: auto;
        margin-left: 20px;
        margin-right: 20px;
    }
    
    .events{
        font-family: Lato;
        background-color: rgba(254,254,254,0.7);
        width:100%;
        display:inline-block;
        height: 300px;
        vertical-align: top;
        text-align: justify;
        border-radius: 3%;
        padding-bottom: 40px;
        text-align: left; 
    }
    
    .optionsheading{
        text-align: center;
        font-size:100%;
        font-weight:400;
        letter-spacing: 2px;
        color:#333092;
        font-family: Lato;
    }
    
    .events h3{
        font-size:80%;
        padding-left: 20px;
        padding-right: 20px;
        margin-bottom: -15px;
        color:#333092;
    }
    
    .events p{
        text-align: left justify;
        font-size:90%;
        padding-left:20px;
        padding-right:20px;
        font-weight: 300;
        color:#333092;
        margin-bottom: -5px;
    }
    
    .events img{
        height:150px;
        object-fit: cover;
        width:90%;
        border-radius: 4px;
        display: block;
        margin: auto;
        margin-top: 20px;
    }
    
    .verticalline{
        width:2px;
        height:350px;
        display:inline-block;
        vertical-align:top;
        background-color: #333092;
    }
    
}
");
fwrite($file3,
"
     <header><img src='../Images/winonalogo.png'>COMPUTER  SCIENCE</header>
      <nav>
          <a href=''>HOME</a>
          <a href=''>PROSPECTIVE STUDENTS</a>
          <a href=''>CURRENT STUDENTS</a>
          <a href=''>FACULTY</a>
          <a href=''>RESOURCES</a>
      </nav>
");
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