<!doctype html>
<!--
Author: Ty Ary 
Date: 10.1.18

Filename: ViewFiles.php
-->


<html>
    <head>
        <title>View Files</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1.0" />
        <script src="modernizr.custom.65897.js"></script>
    </head>
    <body>
       <h2>View Files</h2>
        <?php
        //Variables
        $dir = "../Exercise 02_01_01";
        $opendir = opendir($dir);
        //Displays the file directories that the variable points to and allows them to be accessed through hyperlinks
        while ($curFile = readdir($opendir)) {
            if (strcmp($curFile, '.') !== 0 && strcmp($curFile, '..') !== 0) {
                echo "<a href=\"$dir/$curFile\">$curFile</a><br>\n";
            }
        }
        closedir($opendir);
        ?>
    </body>
</html>