<?php   
        session_start();

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        //Following code is referenced from CSE 330 wiki on "Sending a File to the Browser"
        $username = $_SESSION['username'];
        if(!preg_match('/^[\w_\-]+$/', $username)){
            echo "<h1 class = 'pagetitle'>Invalid username:<br>" . htmlentities($username) . "</h1><br>";
                echo "<a href = 'home.php' class = 'submitbutton'>Return to Home</a>";
            exit;
        }
        if(isset($_GET['file'])){
            $filename = $_GET['file'];

            if(!preg_match('/^[\w_\.\-]+$/', $filename)){
                echo "<h1 class = 'pagetitle'>Invalid filename:<br>" . htmlentities($filename) . "</h1><br>";
                echo "<a href = 'home.php' class = 'submitbutton'>Return to Home</a>";
                exit;
            }

            $full_path = sprintf("/srv/module2group/%s/%s", $username, $filename);

            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mime = $finfo->file($full_path);

            header("Content-Type: ".$mime);
            header('content-disposition: inline; filename="'.$filename.'";');
            readfile($full_path);
            exit;
            //end citation
        }

        if(isset($_GET['rdfile'])){
            $rdfilename = $_GET['rdfile'];
            //Following code is taken from CSE 330 wiki on "Sending a File to the Browser"

            if(!preg_match('/^[\w_\.\-]+$/', $rdfilename)){
                echo "<h1 class = 'pagetitle'>Invalid filename:<br>" . htmlentities($rdfilename) . "</h1><br>";
                echo "<a href = 'home.php' class = 'submitbutton'>Return to Home</a>";
                exit;
            }

            $rdfull_path = sprintf("/srv/module2group/%s/recentlydeleted/%s", $username, $rdfilename);

            $rdfinfo = new finfo(FILEINFO_MIME_TYPE);
            $rdmime = $rdfinfo->file($rdfull_path);

            header("Content-Type: ".$rdmime);
            header('content-disposition: inline; filename="'.$rdfilename.'";');
            readfile($rdfull_path);
            exit;
            //end citation
        }
    ?>


<!DOCTYPE html>
<html id = "failurebg" lang = "en">
<head>
	<title>File Sharing - Home</title>
	<link rel="stylesheet" href="home.css">
</head>
<body>
    <div class = "message">
        <h1 class = 'pagetitle'>Invalid filename</h1><br>
        <a href = 'home.php' class = 'submitbutton'>Return to Home</a>
    </div>
</body>
</html>