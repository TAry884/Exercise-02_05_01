<!doctype html>
<!--
Author: Ty Ary 
Date: 10.1.18

Filename: ViewFiles2.php
-->


<html>
    <head>
        <title>View Files 2</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1.0" />
        <script src="modernizr.custom.65897.js"></script>
    </head>
    <body>
       <h2>View Files 2</h2>
        <?php
        //Variables
        $dir = "../Exercise 02_01_01";
        $dirEntries = scandir($dir);
        //Displays the file directories that the variable points to and allows them to be accessed through hyperlinks
        foreach ($dirEntries as $entry) {
            if (strcmp($entry, '.') !== 0 && strcmp($entry, '..') !== 0) {
                echo "<a href=\"$dir/$entry\">$entry</a><br>\n";
            }
        }
        ?>
    </body>
</html>