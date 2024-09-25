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
                    <h3 class = "formlabels"> Recently deleted files:</h3>
                    <form action = "restore.php" method="POST">
                        <!--div to left justify list of files-->
                            <?php
                                //referenced for scandir: https://www.educative.io/answers/how-to-list-files-in-a-directory-in-php
                                $rddirPath = "/srv/module2group/" . $_SESSION['username'] . "/recentlydeleted";
                                $rdfiles = scandir($rddirPath);
                                
                                echo "<ul class = 'filelist'>";
                                foreach ($rdfiles as $rdfile) {
                                    $rdfilePath = $rddirPath . '/' . $rdfile;
                                    if (is_file($rdfilePath)) {
                                        //referenced stack overflow for hyperlinking files: https://stackoverflow.com/questions/2298214/making-a-file-directory-and-having-clickable-download-links-in-php
                                        //referenced following line for urlencode: https://www.php.net/manual/en/function.urlencode.php
                                        $rdencodedFile = urlencode($rdfile);
                                        //referenced following line for sending to new tab: https://stackoverflow.com/questions/12796324/is-there-any-php-function-for-open-page-in-new-tab
                                        
                                        echo "<input type='radio' name='wantsRestored' id = 'wantsRestored' value='$rdencodedFile'>";
                                        //referenced following line for sending to new tab: https://stackoverflow.com/questions/12796324/is-there-any-php-function-for-open-page-in-new-tab
                                        echo "<label for = 'wantsRestored'><a href='fileviewer.php?rdfile=$rdencodedFile' target='_blank' class='linkedtext'>" . htmlentities($rdfile) . "</a></label><br>";
                                    }
                                }
                                //end of citation
                                echo "</ul>";
                            ?>
                            <button type="submit" class="submitbutton">Restore Selected File</button>
                        <!--end of div to left justify list of files-->
                    </form>

                    <br><br>

                    <form action = "cleandeletedfiles.php" method="POST">
                        <!-- Dropdown to select expiry time -->
                        <label for="expiry" class = "formlabels">Permanently delete all files older than:</label>
                        <select name="expiry" id="expiry">
                            <!--referenced for formatting dropdown: https://blog.logrocket.com/creating-custom-select-dropdown-css/-->
                            <option value="1">Delete all files</option>
                            <option value="3600">1 hour</option>
                            <option value="86400">24 hours</option>
                            <option value="604800">1 week</option>
                            <option value="2592000">30 days</option>
                        </select>
                        <br><br>
                        <button type="submit" class="submitbutton">Permanently Delete Files</button>
                    </form>
                    <a href = "home.php" class = "submitbutton homebutton">Return to Home</a>
                </div>
                <!--end of div for left container for viewing and listing files-->

            </div>
            <!--end of div created for flex-->
    </div>
    <!--end of div for entire homepage container, including page title & logout button-->
</body>
</html>