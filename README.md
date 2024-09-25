# CSE330 - File Sharing Site
> Welcome to my file-sharing project! This project was built using Apache, and the **link below** will take you directly to the site (you'll need to input one of the existing usernames to access the homepage). To view the code in detail, visit the **File-Sharing-Code folder!** <br>

**Languages:** PHP, HTML, CSS <br>
**Technologies/Frameworks:** Apache, Amazon AWS (EC2), SSH <br>

**Link to file sharing site:** http://ec2-18-222-136-197.us-east-2.compute.amazonaws.com/~lilyrsun/module2/module2-group-module2-520806/filesharing/index.php?error=true <br>

**Username Information**: Feel free to use either **_lilysun_**, **_jingtaosun_**, or **_yidinglei_** as a username. <br>

****
### Site Functionality
**File Management:** This site allows users to **view,** **upload,** and **delete** files in their _own folders_, ensuring that each user's actions won't impact other users' files.
- **Viewing Files**: Each user will have a list of hyperlinked files that when clicked will open the file in a new browser tab _(head to home.php & fileviewer.php for code)_
- **Uploading Files**: Users can upload files of any type given that they're under a certain file size and follow proper naming conventions _(head to home.php and uploader.php for code)_
- **Deleting Files**: Feature descriptions are below _(see delete.php for code)_
    1. **Choice of deletion:** When the user chooses a file to delete on their home screen, it will bring them to a confirmation page where they have 3 choices _(see confirmation.php & delete.php for code)_:
        - **Delete Permanently**: Deletes file permanently without going through the recently deleted folder
        - **Recently Deleted**: Moves file to the recently deleted folder. It will not appear on the home screen, but it can still be accessed 
        - **Cancel**: Brings the user back to the home screen and does not take any action.
    2. **Restoring recently deleted files**: If a user decides that they want to restore a deleted file, they can do so in the recently deleted folder. Using a radio button, they can select which file they want to restore, and it will be moved back to their home screen _(see restore.php for code)_.
    3. **Destruction of expired files with automatable script**: I wrote an automatable script that will delete all files older than a certain amount of time _(see cleandeletedfiles.php for code)_. This script, if run through the command line or terminal with CronJob, can automatically run to delete all files older than the user's set expiry time. Since it isn't super feasible to have everyone testing the site to run this script through the command line, I made a few modifications that will let the script run directly on the web server:
        - Under the user's list of recently deleted files, I included a drop-down that lets the user pick the expiration time they want to set. For example, if the user chooses to delete files older than 24 hours, the script will only delete files older than 24 hours and keep files newer than that.
        - After choosing an expiry time and clicking "Delete Permanently," the website will automatically run the script, searching for expired files in the user's recently deleted folder and unlinking them.

_**Quick Note:** Just a quick note about uploading -- you can upload files by clicking the "Click to upload file" image. Unfortunately, this project required that we ONLY use PHP (i.e. no JavaScript), which isn't capable of changing the image display based on user input. If you've clicked on a file to upload, even if it seems like it didn't do anything, just click on the "Upload file" button below!_ 😊
