<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>prototype index</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="index.js" type="text/javascript"></script>
		<script src="jquery.js" type="text/javascript"></script>
		<link rel="stylesheet" href="style/style.css">

	</head>
	<header>
		<h1 class="header">Custom Page Generator</h1>
	</header>
		<body>
			<div id="form_div">
				<form class="custom_page_form" action="confirmation.php" method="post" enctype="multipart/form-data">
					<ul>
						<li>
							<label for="title">Title Of Your Page</label>
							<input type="text" name="title" id="title" required>
						</li>
						<li>
							<label for="fname">First Name:</label>
							<input type="text" name="fname" id="fname" required>
						</li>
						<li>					
							<label for="lname">Last Name:</label>
							<input type="text" name="lname" id="lname" required>
						</li>
						<li>
							<label for="email">Email:</label>
							<input type="email" name="email" id="email" required>
							<span class="email_syntax">"name@something.com"</span>
						</li>	
						<li>
							<label for="schooling">University/School Graduated From:</label>
							<input type="text" name="schooling" id="schooling" required>
						</li>
						<li>
							<label for="graduation">Graduation Type:</label>
							<select name="graduation" id="graduation" required>
								<option></option>
								<option>Associate Degree</option>
								<option>Bachelor's Degree</option>
								<option>Graduate Degree</option>
								<option>Professional Degree</option>
							</select>
						</li>
						<li>	
							<label for="bio">Short Biography About Yourself:</label>
								<textarea name="bio" cols="40" rows="6" id="bio" required></textarea>
						</li>
						<li>
							<label for="fileToUpload">Upload Image:</label>
							<input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" style="margin: auto;"/required>
						</li>
						<li>
							<button class="submit" type="submit" name="submit">Submit</button>
						</li>
					</ul>
				</form>
			</div>
		</body>
</html>