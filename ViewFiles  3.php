<!doctype html>
<!--
Author: Ty Ary 
Date: 10.1.18

Filename: ViewFiles3.php
-->


<html>
    <head>
        <title>View Files 3</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1.0" />
        <script src="modernizr.custom.65897.js"></script>
    </head>
    <body>
       <h2>View Files 3</h2>
        <?php
        //Variables
        $dir = "../Exercise 02_01_01";
        $dirEntries = scandir($dir);
        echo "<table border='1' width='100%'>\n";
        echo "<tr><th colspan='4'>Directory Listing for <strong>" . htmlentities($dir) . "</strong></th></tr>\n";
        echo "<tr>";
        echo "<th><strong><em>Name</em></strong></th>";
        echo "<th><strong><em>Owner</em></strong></th>";
        echo "<th><strong><em>Permissions</em></strong></th>";
        echo "<th><strong><em>Size</em></strong></th>";
        echo "</tr>\n";
        //Displays the file directories that the variable points to and allows them to be accessed through hyperlinks
        foreach ($dirEntries as $entry) {
            if (strcmp($entry, '.') !== 0 && strcmp($entry, '..') !== 0) {
                $fullEntryName = $dir . "/" . $entry;
                echo "<tr><td>";
                if (is_file($fullEntryName)) {
                    echo "<a href=\"$fullEntryName\">" . htmlentities($entry) . "</a>";    
                } else {
                    echo htmlentities($entry);
                }
                echo "</td><td align='center'>" . fileowner($fullEntryName);
                if (is_file($fullEntryName)) {
                    $perms = fileperms($fullEntryName);
                    $perms = decoct($perms % 01000);
                    echo "</td><td align='center'>0$perms";
                    echo "</td><td align='right'>" . number_format(filesize($fullEntryName), 0) . " bytes";
                } else {
                    echo "</td><td colspan='2' align='center'>&lt;DIR&gt;";
                }
                echo "</td></tr>\n";
            }
        }
        echo "</table>\n";
        ?>
    </body>
</html>