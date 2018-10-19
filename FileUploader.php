<!doctype html>
<!--
Author: Ty Ary 
Date: 10.4.18

Filename: FileUploader.php
-->


<html>
    <head>
        <title>File uploader</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1.0" />
        <script src="modernizr.custom.65897.js"></script>
    </head>
    <body>
       <h2>File uploader</h2>
        <?php
        //parent directory dot
        $dir = ".";
        //if upload is set and is posted, and if the file is a new file, upload the file to the server 
        if (isset($_POST['upload'])) {
            if (isset($_FILES['newFile'])) {
                if (move_uploaded_file($_FILES['newFile']['tmp_name'], $dir . "/" . $_FILES['newFile']['name']) === true) {
                    chmod($dir . "/" . $_FILES['newFile']['name'], 0644);
                    echo "File \"" . htmlentities($_FILES['newFile']['name']) . "\".<br>\n";
                    //Tells the user that there was a error uploading the file
                    echo "There was a error uploading \"" . htmlentities($_FILES['newFile']['name']) . "\" successfully uploaded.<br>\n";
                } else {
                    echo "There was a error uploading \"" . htmlentities($_FILES['newFile']['name']) . "\" .<br>\n";
                }
            }
        }
        //form for the file
        ?>
        <form action="FileUploader.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="25000"/>
            File to Upload:
            <input type="file" name="newFile" /><br>
            (25,000 byte limit)<br>
            <input type="submit" name="upload" value="Upload the File" /><br>
        </form>
    </body>
</html>