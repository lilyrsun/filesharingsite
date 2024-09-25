<?php
        session_start();

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html id = "home" lang = "en">
<head>
	<title>File Sharing - Home</title>
	<link rel="stylesheet" href="home.css">
</head>
<body>
	<div class = "message">
        <?php

            $filename = $_POST['wantsRestored'];
            $username = $_SESSION['username'];

            //checking the username is valid and will print an error message if not
            if(!preg_match('/^[\w_\-]+$/', $username)){
                echo "<h1 class = 'pagetitle'>Invalid username:<br>" . htmlentities($username) . "</h1><br>";
                echo "<a href = 'home.php' class = 'submitbutton'>Return to Home</a>";
                exit;
            }

            if(isset($_POST['wantsRestored']) && !empty($_POST['wantsRestored']))
            {
                //checking the file names are valid and will print an error message if not
                if(!preg_match('/^[\w_\.\-]+$/', $filename)){
                    echo "<h1 class = 'pagetitle'>Invalid filename:<br>" . htmlentities($filename) . "</h1><br>";
                    echo "<a href = 'home.php' class = 'submitbutton'>Return to Home</a>";
                    exit;
                }

                $recentdelpath = sprintf("/srv/module2group/%s/recentlydeleted/%s", $username, $filename);
                $full_path = sprintf("/srv/module2group/%s/%s", $username, $filename);

                //referenced for rename: https://www.php.net/manual/en/function.rename.php  
                //restores file back to original locatino
                if (rename($recentdelpath, $full_path)) {
                    echo "<h1 class='pagetitle'>" . htmlentities($filename) . " has been restored.<br></h1>";
                    echo "<a href = 'home.php' class = 'submitbutton'>Return to Home</a>";
                } else {
                    echo "<h1 class='pagetitle'>" . htmlentities($filename) . " couldn't be restored.</h1>";
                    echo "<a href = 'home.php' class = 'submitbutton'>Return to Home</a>";
                }
            }
        ?>
	</div>
</body>
</html>