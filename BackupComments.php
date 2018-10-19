<!doctype html>
<!--
Author: Ty Ary 
Date: 10.12.18

Filename: BackupComments.php
-->


<html>
    <head>
        <title>Backup Comments</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1.0" />
        <script src="modernizr.custom.65897.js"></script>
    </head>
    <body>
       <h2>Backup Comments</h2>
        <?php
        //source of backup folder and source of the comment folder
        $source = "./comments";
        $destination = "./backups";
        //if the destination doesnt exist create it and change the permissions
        if (!is_dir($destination)) {
            mkdir($destination);
            chmod($destination, 0757);
        }
        //if the source folder doesnt exist create it and change the permissions
        if (!is_dir($source)) {
            echo "The source directory did not exist, created it, no filse to backup.<br>\n";
            mkdir($source);
            chmod($source, 0757);
            //else scan the comments directory and copy the files into the backup folder
        } else {
            $totalFiles = 0;
            $filescopied = 0;
            $dirEntries = scandir($source);
            foreach ($dirEntries as $entry) {
                if ($entry != "." && $entry != "..") {
                    ++$totalFiles;
                    if (copy("$source/$entry", "$destination/$entry")) {
                        ++$filescopied;
                    } else {
                        echo "Could not copy file \"" . htmlentities($entry) . "\".<br>\n";
                    }
                }
            }
            //echo the amount of files copied
            echo "<p>$filescopied of $totalFiles sucessfully backed up</p>\n";
        }
        ?>
    </body>
</html>