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

            $filename = $_POST['wantsDeleted'];
            $username = $_SESSION['username'];

            //checking the username is valid and will print an error message if not
            if(!preg_match('/^[\w_\-]+$/', $username)){
                echo "<h1 class = 'pagetitle'>Invalid username:<br>" . htmlentities($username) . "</h1><br>";
                echo "<a href = 'home.php' class = 'submitbutton'>Return to Home</a>";
                exit;
            }

            if(isset($_POST['userchoice']))
            {
                $userchoice = $_POST['userchoice'];

                //checking the file names are valid and will print an error message if not
                if(!preg_match('/^[\w_\.\-]+$/', $filename)){
                    echo "<h1 class = 'pagetitle'>Invalid filename:<br>" . htmlentities($filename) . "</h1><br>";
                    echo "<a href = 'home.php' class = 'submitbutton'>Return to Home</a>";
                    exit;
                }

                $full_path = sprintf("/srv/module2group/%s/%s", $username, $filename);
                $recentdelpath = sprintf("/srv/module2group/%s/recentlydeleted/%s", $username, $filename);

                //referenced for unlink: https://www.php.net/manual/en/function.unlink.php  
                //deletes the file permanently
                if($userchoice == 'deletepermanently'){
                    if (unlink($full_path)) {
                        echo "<h1 class = 'pagetitle'>" . htmlentities($filename) . " has been successfully deleted!<br></h1>";
                        echo "<a href = 'home.php' class = 'submitbutton'>Return to Home</a>";
                    } else {
                        echo htmlentities($filename) . " couldn't be deleted.";
                    }
                }

                //referenced for rename file: https://www.geeksforgeeks.org/how-to-move-a-file-into-a-different-folder-on-the-server-using-php/
                elseif($userchoice == 'recentlydeleted'){
                    if (rename($full_path, $recentdelpath)) {
                        echo "<h1 class='pagetitle'>" . htmlentities($filename) . " has been moved to the Recently Deleted folder.<br></h1>";
                        echo "<a href = 'home.php' class = 'submitbutton'>Return to Home</a>";
                    } else {
                        echo "<h1 class='pagetitle'>" . htmlentities($filename) . " couldn't be moved to Recently Deleted.</h1>";
                        echo "<a href = 'home.php' class = 'submitbutton'>Return to Home</a>";
                    }
                }
                else{
                    echo htmlentities($filename) . " couldn't be deleted.";
                    echo "<a href = 'home.php' class = 'submitbutton'>Return to Home</a>";
                }
                exit;
            }

            if(isset($_POST['rduserchoice']))
            {
                $userchoice = $_POST['rduserchoice'];

                //checking the file names are valid and will print an error message if not
                if(!preg_match('/^[\w_\.\-]+$/', $filename)){
                    echo "<h1 class = 'pagetitle'>Invalid filename:<br>" . htmlentities($filename) . "</h1><br>";
                    echo "<a href = 'home.php' class = 'submitbutton'>Return to Home</a>";
                    exit;
                }

                $recentdelpath = sprintf("/srv/module2group/%s/recentlydeleted/%s", $username, $filename);

                //referenced for unlink: https://www.php.net/manual/en/function.unlink.php  
                //deletes the file permanently
                if (unlink($recentdelpath)) {
                        echo "<h1 class = 'pagetitle'>" . htmlentities($filename) . " has been successfully deleted!<br></h1>";
                        echo "<a href = 'home.php' class = 'submitbutton'>Return to Home</a>";
                } 
                else {
                        echo htmlentities($filename) . " couldn't be deleted.";
                }
            }
        ?>
	</div>
</body>
</html>