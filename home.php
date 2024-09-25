<?php
    session_start();
?>

<!DOCTYPE html>
<html id = "home" lang = "en">
<head>
	<title>File Sharing - Home</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <!--div for entire homepage container, including page title & logout button-->
    <div id = "homepage" class = "fadein">
        <h1 class = "pagetitle">Welcome <strong><?php echo $_SESSION['username']?>!</strong></h1>

            <!--div created for flex-->
            <div id = "container">
                <!--div for left container for viewing and listing files-->
                <div id = "viewfiles">
                    <h3 class = "formlabels"> Current list of files:</h3>
                    <form action="confirmation.php" method="POST">
                        <!--div to left justify list of files-->
                        <div id = "left-text">
                            <?php
                                //referenced for scandir: https://www.educative.io/answers/how-to-list-files-in-a-directory-in-php
                                $dirPath = "/srv/module2group/" . $_SESSION['username'];
                                $files = scandir($dirPath);
                                
                                echo "<ul class = 'filelist'>";
                                foreach ($files as $file) {
                                    $filePath = $dirPath . '/' . $file;
                                    if (is_file($filePath)) {
                                        //referenced stack overflow for hyperlinking files: https://stackoverflow.com/questions/2298214/making-a-file-directory-and-having-clickable-download-links-in-php
                                        //referenced following line for urlencode: https://www.php.net/manual/en/function.urlencode.php
                                        $encodedFile = urlencode($file);
                                        echo "<input type='radio' name = 'wantsDeleted' id='wantsDeleted' value='$encodedFile'>";
                                        //referenced following line for sending to new tab: https://stackoverflow.com/questions/12796324/is-there-any-php-function-for-open-page-in-new-tab
                                        echo "<label for = 'wantsDeleted'><a href='fileviewer.php?file=$encodedFile' target='_blank' class='linkedtext'>" . htmlentities($file) . "</a></label><br>";
                                    }
                                }
                                //end of citation
                                echo "</ul>";
                            ?>
                        </div>
                        <!--end of div to left justify list of files-->
                            <input name="deleteselected" type="submit" value = "Delete Selected" class = "submitbutton homebutton">
                    </form>
                </div>
                <!--end of div for left container for viewing and listing files-->

                <!--div for right container for uploading files-->    
                <div id = "uploadfiles">
                    <!--Code Block below referenced from CSE 330 Wiki - PHP - Uploading a File-->
                    <form enctype="multipart/form-data" action="uploader.php" method="POST">
                            <input type="hidden" name="MAX_FILE_SIZE" value="20000000">
                            <h3 class = "formlabels"> Choose file to upload:</h3>
                            <input type="file" name="uploadedfile" id="uploadfile_input" style="display: none;">
                            <label for="uploadfile_input" class = "uploadfileimage">
                                <img src="upload-image.png" alt="Upload" class="upload-button-image">
                            </label>
                        <p>
                            <input type="submit" value="Upload File" class = "submitbutton homebutton">
                        </p>
                    </form>
                    <!--End of citation-->
                </div>
                <!--end of div for right container for uploading files--> 
            </div>
            <!--end of div created for flex-->
            <br>
        <div id = "buttoncontainer">
            <a href="rdlist.php" class="submitbutton">View Recently Deleted</a>
            <a href="logout.php" class="submitbutton">Logout</a>
        </div>
    </div>
    <!--end of div for entire homepage container, including page title & logout button-->
</body>
</html>