<!doctype html>
<!--
Author: Ty Ary 
Date: 10.9.18

Filename: VisitorFeedback2.php
-->


<html>
    <head>
        <title>Visitor Feedback 2</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1.0" />
        <script src="modernizr.custom.65897.js"></script>
    </head>
    <body>
       <h2>Visitor Feedback 2</h2>
        <?php
        //directory for comments
        $dir = "./comments";
        //if the directory is a directory display the file name and their comments
        if (is_dir($dir)) {
            $commentFiles = scandir($dir);
            foreach ($commentFiles as $fileName) {
                if ($fileName !== "." && $fileName !== "..") {
                    echo "From <strong>$fileName</strong><br>";    
                    echo "<pre>\n";
                    $comment = file_get_contents($dir . "/" . $fileName);
                    echo "</pre>\n";
                    echo "<hr>\n";
                }
            }
        }
        ?>
    </body>
</html>