<?php
	//Used this YT video for inspiration: https://www.youtube.com/watch?v=1zXqo2WcOew
        session_start();
        
        /*referenced stack overflow:
        https://stackoverflow.com/questions/19205610/php-login-from-text-file 
        https://stackoverflow.com/questions/4103287/read-a-plain-text-file-with-php
        */
        $username = $_POST['username'];
        $userlist = file('/srv/module2group/users.txt');

        foreach ($userlist as $x) {
                $x = trim(strtolower($x));

                if ($username == $x) {
                        $_SESSION['username'] = $username;
                        header("Location: home.php");
                        exit;
                }
        }

        //referenced for error message: https://www.codeproject.com/Questions/725678/whats-query-string-in-php
        header("Location: index.php?error=true");
                exit;
        //session_destroy();
?>