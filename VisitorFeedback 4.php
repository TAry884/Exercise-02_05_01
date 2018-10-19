<!doctype html>
<!--
Author: Ty Ary 
Date: 10.11.18

Filename: VisitorFeedback4.php
-->


<html>
    <head>
        <title>Visitor Feedback 4</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1.0" />
        <script src="modernizr.custom.65897.js"></script>
    </head>
    <body>
       <h2>Visitor Feedback 4</h2>
        <?php
        //comments directory
        $dir = "./comments";
        //if dir is a directory scan it and display the each files uploaded with all the information within them
        if (is_dir($dir)) {
            $commentFiles = scandir($dir);
            foreach ($commentFiles as $fileName) {
                if ($fileName !== "." && $fileName !== "..") {
                    echo "From <strong>$fileName</strong><br>";
                    $fileHandle = fopen($dir . "/" . $fileName, "rb");
                    if ($fileHandle === false) {
                        echo "There was an error reading file \"$fileName\".<br>\n";
                    } else {
                        $from = fgets($fileHandle);
                        echo "From: " . htmlentities($from) . "<br>\n";
                        $email = fgets($fileHandle);
                        echo "Email Address: " . htmlentities($email) . "<br>\n";
                        $date = fgets($fileHandle);
                        echo "Date: " . htmlentities($date) . "<br>\n";
                        while (!feof($fileHandle)) {
                            $comment = fgets($fileHandle);
                            if (!feof($fileHandle)) {
                                echo htmlentities($comment) . "<br>\n";
                            } else {
                                echo htmlentities($comment) . "\n";
                            }
                        }
                        echo "<hr>\n";
                        fclose($fileHandle);
                    }
                }
            }
        }
        ?>
    </body>
</html>