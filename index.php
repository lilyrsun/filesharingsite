<!DOCTYPE html>
<html lang = "en">
<head>
	<title>File Sharing - Login</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<div class = "fadein" id = "loginpage">
	<h1 class = "pagetitle">Welcome to <strong>Sunshine File Sharing!</strong></h1>
		<div id = "loginfields">
		<form method = "POST" action="login.php">
			<label class = "formlabels"><strong>Username: </strong><br><input type="text" name="username" class = "fillin"></label>
			<br><br>
			<input type="submit" value="Login" class = "submitbutton">
		</form>
		</div>

	<!--referenced for error message: https://www.codeproject.com/Questions/725678/whats-query-string-in-php-->
	<?php
    if (isset($_GET['error'])) {
        echo"<p class = 'errormessage'>You have entered the wrong username. Please try again.</p>";
    }
    ?>
	</div>
</body>
</html>