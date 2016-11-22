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
						print "
	<body>
            
            <div class='sidebar'>
                <div class='links'>
                <a src=''> YOUR<br> WEBSITE</a>
                <a src=''> MANAGE YOUR <br>TUTOR HOURS</a>
                <a src=''> CREATE<br> EVENTS</a>
                </div>
            </div>
        
			<div id='form_div'>
				<form class='custom_page_form' action='confirmation.php' method='post' enctype='multipart/form-data'>
                    <h1 class='formheading'>CREATE YOUR WEBPAGE</h1>
                    <fieldset name='Personal'>PERSONAL INFORMATION <br>
                        <hr>
					<div class='compositename'> 
                        <div class='first'>
							<label for='fname'>First Name:</label><br>
							<input type='text' name='fname' id='fname' required placeholder='John'>
						</div>		
                        
                        <div class='last'>
							<label for='lname'>Last Name:</label><br>
							<input type='text' name='lname' id='lname' required placeholder='Smith'>
					    </div>
                    </div>
                    
                     <label for='fileToUpload'>Upload Your Photo:</label>
							<input type='file' name='fileToUpload' id='fileToUpload' accept='image/*' style='margin: auto;' required><br>
                        <br>
                        <label for='quote'>Your Favorite Quote:</label><br>
								<textarea name='quote' rows='2' id='quote' placeholder='A quote that has meaning for you'></textarea><br>
                    
							<label for='bio'>Short Biography About Yourself:</label><br>
								<textarea name='bio' rows='10' id='bio' required placeholder='Information about yourself, your work, what you enjoy doing and things you feel you are an expert in etc.'></textarea><br>
                        </fieldset>
                    <br>
							<fieldset name='Education'>EDUCATIONAL BACKGROUND: <br>
                                <hr>
							<label><input type='checkbox' name='bachelors' id='bachelors' > Bachelor's</label>
                                
                            <label><input type='checkbox' name='masters' id='masters' > Master's</label>
<!--                                This is the last thing I fixed in the confirmation.php. I wanted to add the title Dr. in front of a professors name in case they've done their phD-->
                            <label><input type='checkbox' name='phd' id='phd'> PhD</label>
                                
                                <br>
                            <label for='schooling'>University You Last Attended: </label><input type='text' name='schooling' id='schooling'> 
							</fieldset><br>
						
<!--
							<label for='graduation'>Graduation Type:</label><br>
							<select name='graduation' id='graduation' required>
								<option></option>
								<option>Associate Degree</option>
								<option>Bachelor's Degree</option>
								<option>Graduate Degree</option>
								<option>Professional Degree</option>
							</select><br>
							
-->
                    
                    <fieldset name='OfficeHourse'>OFFICE HOURS & CONTACT INFORMATION<br>
                        <hr>
                        <label for='email'>Email:</label><br>
						<input type='email' name='email' id='email' required placeholder='name@domain.com'><br>
                        
                        <label for='mon'>MON:</label><br>
						<input type='time' name='monstart' id='monstart' class='monstart'> to 
						<input type='time' name='monend' id='monend' class='monend'><br>
                        
                        <label for='tue'>TUE:</label><br>
						<input type='time' name='tuestart' id='tuestart' class='tuestart'> to 
						<input type='time' name='tueend' id='tueend' class='tueend'><br>
                        
                        <label for='wed'>WED:</label><br>
						<input type='time' name='wedstart' id='wedstart' class='wedstart'> to 
						<input type='time' name='wedend' id='wedend' class='wedend'><br>
                        
                        <label for='wed'>THU:</label><br>
						<input type='time' name='thustart' id='thustart' class='thustart'> to 
						<input type='time' name='thuend' id='thuend' class='thuend'><br>
                        
                        <label for='fri'>FRI:</label><br>
						<input type='time' name='fristart' id='fristart' class='fristart'> to 
						<input type='time' name='friend' id='friend' class='friend'><br>
                        
                        </fieldset>
                    <br>
							
                    <fieldset name='extra'>EXTRA WIDGET:
                        <hr>
                    <label for='extrapic'>Upload A Picture:</label>
							<input type='file' name='extrapic' id='extrapic' accept='image/*'><br>
                        
                    <label for='captionimageheading'> A caption for your image:</label><br>
                        <input name='captionimageheading' id='captionimageheading' type='text'>
			
                        <br>
                    <label for='extratext' id='extratext'>Some information for your image <br></label>
					<textarea name='extratext' id='extratext' rows='5' placeholder='Some information about your image.'></textarea>
                        
                    </fieldset>
						
                        <br>
						
							<button class='submit' type='submit' name='submit'>Submit</button>
						
					
				</form>";
					}else{
						print "<p>FALSE</p>";
						}
					}
				}
			?>
		</body>
	</html>