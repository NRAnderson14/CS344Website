<!DOCTYPE html>
	<html lang='en'>
		<head>
			<meta charset='utf-8'>
			<title>prototype php</title>
			<meta name='viewport' content='width=device-width, initial-scale=1.0'>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            <script src="../../script.js" type="text/javascript"></script>
			<link rel='stylesheet' href='style/style.css'>
		</head>
			<body>
			<div id='wrapper'>
				<h1>Nathan's Page</h1>
				<img class='personal_image' src='uploads/images/Anderson1479610487.jpg'>
				<p><strong>First name</strong>: Nathan</p>
				<p><strong>Last name</strong>: Anderson</p>
				<p><strong>Email</strong>: nathan.anderson@nathan.net</p>
				<p><strong>School</strong>: Yale</p>
				<p><strong>Grad Type</strong>: Graduate Degree</p>
				<p><strong>Bio</strong>: I am from a small town.</p>
				</div>
                <div class="stylediv field">
                    <form id="stylepicker">
                    <fieldset>
                        <legend>Change the Page Style</legend>
                        <label><input type="radio" name="stylebtn" value="white" id="stylebtn">White</label>
                        <label><input type="radio" name="stylebtn" value="purple" id="stylebtn" checked>Purple</label>
                        <label><input type="radio" name="stylebtn" value="blue" id="stylebtn">Blue</label>
                    </fieldset>
                    </form>
                </div>
                <div class="editdiv field">
                    <fieldset>
                        <legend>Edit Page</legend>
                        <button id="editbtn">Edit</button>
                    </fieldset>
                </div>
			</body>
	</html>