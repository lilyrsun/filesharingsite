<?php
        session_start();

        //referenced increasing max file size from suggested website on 330 wiki: https://www.sitepoint.com/upload-large-files-in-php/
        ini_set('upload_max_filesize', '20M');
        ini_set('post_max_size', '20M');
        ini_set('max_input_time', 300);
        ini_set('max_execution_time', 300);
?>

<!DOCTYPE html>
<html id = "failurebg" lang = "en">
<head>
	<title>File Sharing - Home</title>
	<link rel="stylesheet" href="home.css">
</head>
<body>
	<div class = "message">
        <?php
        $filename = basename($_FILES['uploadedfile']['name']);
        if(!preg_match('/^[\w_\.\-]+$/', $filename)){
            echo "<h1 class = 'pagetitle'>Invalid filename:<br>" . htmlentities($filename) . "</h1><br>";
            echo "<a href = 'home.php' class = 'submitbutton'>Return to Home</a>";
            exit;
        }

        $username = $_SESSION['username'];
        if(!preg_match('/^[\w_\-]+$/', $username)){
            echo "<h1 class = 'pagetitle'>Invalid username:<br>" . htmlentities($username) . "</h1><br>";
            echo "<a href = 'home.php' class = 'submitbutton'>Return to Home</a>";
            exit;
        }

        $full_path = sprintf("/srv/module2group/%s/%s", $username, $filename);

        if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $full_path) ){
            header("Location: upload_success.html");
            exit;
        }else{
            header("Location: upload_failure.html");
            exit;
        }
    ?>

	</div>
</body>
</html>