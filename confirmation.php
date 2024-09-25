<?php
    session_start();
    $filename = $_POST['wantsDeleted'];
?>

<!DOCTYPE html>
<html id = "home" lang = "en">
<head>
	<title>File Sharing - Home</title>
	<link rel="stylesheet" href="home.css">
</head>
<body>
    <!--start of creative project: option to delete permanently or delete in recently deleted folder-->
    <div id="homepage">
        <form action="delete.php" method="POST">
            <h3 class = "formlabels">Delete permanently or move to recently deleted?</h3>
            <div id = "buttoncontainer">
                <button type="submit" name = "userchoice" class="submitbutton" value = "deletepermanently">Delete permanently</button>
                <button type="submit" name = "userchoice" class="submitbutton" value = "recentlydeleted">Recently deleted</button>
                <input type="hidden" name="wantsDeleted" value="<?php echo htmlentities($filename); ?>">
            </div>
        </form>
        <br><br><br>
        <a href = 'home.php' id = 'cancelbutton'>Cancel</a>
    </div>
</body>
</html>