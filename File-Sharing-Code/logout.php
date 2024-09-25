<!DOCTYPE html>
<html id = "logout" lang = "en">
<head>
    <title>File Sharing - Logout</title>
    <link rel="stylesheet" href="home.css">
</head>
    <div class = "message">
        <?php
            //referenced stack overflow for session_destroy(): https://stackoverflow.com/questions/17341797/where-should-session-destroy-code-be-placed
            session_destroy();
            echo "<h1 class = 'pagetitle'>Logout successful.<br></h1>";
            echo "<a href = 'login.php' class='submitbutton'>Logout</a>"
        ?>
    </div>
</html>