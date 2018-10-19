<?php
//directory for the exercise
    $dir = "../Exercise 02_01_01";
    //checks to see if the files actually exists and if it is readable
    if (isset($_GET['fileName'])) {
        $fileToGet = $dir . "/" . stripslashes($_GET['fileName']);
        if (is_readable($fileToGet)) {
            //tells the OS the new file details so the file is a proper txt file
            $errorMsg = "";
            $showErrorPage = false;
            header("Content-Description: File Transfer");
            header("Content-Type: application/force-download");
            header("Content-Disposition: attachment; filename=\"" . $_GET['fileName'] . "\"");
            header("Content-Transfer-Encoding: base64");
            header("Content-Length: " . filesize($fileToGet));
            readfile($fileToGet);
        } else {
            //tells the user that the os could not read the file
            $errorMsg = "Cannot read \"$fileToGet\"";
            $showErrorPage = true;
        }
        //tells the user that the directory the file is downloaded to doesnt exist
    } else {
        $errorMsg = "No filename specified";
        $showErrorPage = false;
       
    }
//shows the web page telling the user there was a error
    if ($showErrorPage) {
?>
<!doctype html>
<!--
Author: Ty Ary 
Date: 10.4.18

Filename: FileDownloader.php
-->


<html>
    <head>
        <title>File Download Error</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1.0" />
        <script src="modernizr.custom.65897.js"></script>
    </head>
    <body>
        <p>There was an error downloading "<?php echo htmlentities($_GET['fileName']); ?>"</p>
        <p><?php echo htmlentities($errorMsg); ?></p>
    </body>
</html>
<?php
    }
?>