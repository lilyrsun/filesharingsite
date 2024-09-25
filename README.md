[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-22041afd0340ce965d47ae6ef1cefeee28c7c493a6346c4f15d667ab976d596c.svg)](https://classroom.github.com/a/dsRPaEFS)
# CSE330
**Name:** Lily Sun<br>
**Student ID:** 520806<br>
**Github Username:** lilyrsun<br>

**Link to file sharing site:** http://ec2-18-222-136-197.us-east-2.compute.amazonaws.com/~lilyrsun/module2/module2-group-module2-520806/filesharing/index.php?error=true

**Username Information**: Feel free to use either **_lilysun_**, **_jingtaosun_**, or **_yidinglei_** as a username.

_**Quick Note:** Just a quick note about uploading -- you can upload files by clicking the "Click to upload file" image. Unfortunately, without JavaScript, it doesn't seem like I can change this display depending on whether the user has selected a file or not. If you've clicked on a file to upload, even if it seems like it didn't do anything, just click on the "Upload file" button below!_ 😊

**Description of Creative Portion:** My creative portion was to create a recently deleted folder for users who aren't sure if they want to permanently delete files -- this was inspired by Apple's recently deleted feature for their camera roll and Windows's recycle bin feature. The recently deleted folder consists of 3 main functionalities:
1. **Choice of deletion:** When the user chooses a file to delete on their home screen, it will bring them to a confirmation page where they have 3 choices:
    - **Delete Permanently**: Will delete the file permanently without going through the recently deleted folder
    - **Recently Deleted**: Will put the file in the recently deleted folder. Will not appear on the home screen, but can still be accessed. This was done with PHP's rename() function.
    - **Cancel**: Brings the user back to the home screen and does not take any action.
2. **Restoring recently deleted files**: If a user decides that they want to restore a deleted file, they can do so in the recently deleted folder. Using a radio button, they can select which file they want to restore, and it will be moved back to their home screen.
3. **Destruction of expired recently deleted files using automatable script**: To emulate the functionality of Apple and Microsoft's recently deleted features, I included a script that will delete all files older than a certain amount of time. This script, if run through the command-line or terminal, can automatically run to delete all files older than the user's set expiry time. However, for the purposes of this assignment, it didn't seem super feasible to have everyone testing the site to run this script through the command-line 😅. Instead, I made a few modifications that will let the script run directly on the web server:
    - Under the user's list of recently deleted files, I included a drop down that lets the user pick which expiry time they want to set. For example, if the user chooses to delete files older than 24 hours, the script will only delete files older than 24 hours and keep files newer than that.
    - After choosing an expiry time and clicking "Delete Permanently," the website will automatically run the script, searching for expired files in the user's recently deleted folder and unlinking them.
