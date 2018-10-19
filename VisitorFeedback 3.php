<!doctype html>
<!--
Author: Ty Ary 
Date: 10.9.18

Filename: VisitorFeedback3.php
-->


<html>
    <head>
        <title>Visitor Feedback 3</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1.0" />
        <script src="modernizr.custom.65897.js"></script>
    </head>
    <body>
       <h2>Visitor Feedback 3</h2>
        <?php
        //directory for the comments folder
        $dir = "./comments";
        if (is_dir($dir)) {
            $commentFiles = scandir($dir);
            //for each file echo who its from, the email, date and the message that they made
            foreach ($commentFiles as $fileName) {
                if ($fileName !== "." && $fileName !== "..") {
                    echo "From <strong>$fileName</strong><br>";    
                    $comment = file($dir . "/" . $fileName);
                    echo "From: " . htmlentities($comment[0]) . "<br>\n";
                    echo "Email Address: " . htmlentities($comment[1]) . "<br>\n";
                    echo "Date: " . htmlentities($comment[2]) . "<br>\n";
                    $commentLines = count($comment);
                    for($i = 3; $i < $commentLines; $i++) {
                        echo htmlentities($comment[$i]) . "<br>\n";
                    }
                    echo "<hr>\n";
                    
                }
            }
        }
        ?>
    </body>
</html>