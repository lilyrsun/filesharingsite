<?php
    //Part of creative portion
    //Referenced stack overflow when building script: https://stackoverflow.com/questions/3126191/php-script-to-delete-files-older-than-24-hrs-deletes-all-files
    session_start();

    if (isset($_SESSION['username']) && isset($_POST['expiry'])){
        $expirytime = (int) $_POST['expiry'];

        $userfile = "/srv/module2group/users.txt";
        $basedirectory = "/srv/module2group/";

        $userlist = file($userfile);

        $username = trim(strtolower($_SESSION['username']));

        $dir = $basedirectory . $username . "/recentlydeleted/";

        echo "Script started. Deleting files older than <br>" . $expirytime . " seconds or " . $expirytime/60 . " minutes.<br>";

        if (is_dir($dir)){
            foreach (glob($dir . "/*") as $file) {
                echo "File age: " . (time() - filectime($file)) . " seconds<br>";
                if (time() - filectime($file) > $expirytime) {
                    if (unlink($file)) {
                        echo "Deleted file.<br>"; // Optional logging
                    } else {
                        echo "Failed to delete file.<br>" . $file . "\n"; // Optional logging
                    }
                }
            }
        } 
        else {
            echo "Directory does not exist. <br>"; // Optional logging
        }
        echo "Script completed.<br>";
        echo "<a href = 'home.php'>Return to Home</a>";
    }
    else {
        echo "No expiry time set.<br>";
    }

?>