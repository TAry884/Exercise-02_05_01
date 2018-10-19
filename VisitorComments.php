<!doctype html>
<!--
Author: Ty Ary 
Date: 10.5.18

Filename: VisitorComments.php
-->


<html>
    <head>
        <title>Visitor Comments</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1.0" />
        <script src="modernizr.custom.65897.js"></script>
    </head>
    <body>
        <?php
        //directory for comments
        $dir = "./comments";
        //if the $dir is a directory and if uploaded but the name was empty tell the user unknown visitor
        if (is_dir($dir)) {
            if (isset($_POST['save'])) {
                if (empty($_POST['name'])) {
                    echo "Uknown visitor\n";
                } else {
                    //else save each of the items the user input and catalog the time at which it was submitted then use that for part of the file name
                    $saveString = stripslashes($_POST['name']) . "\n";
                    $saveString .= stripslashes(($_POST['email'])) . "\n";
                    $saveString .= date('r') . "\n";
                    $saveString .= stripslashes($_POST['comment']) . "\n";                    
                    echo "\$saveString: $saveString<br>";
                    $currentTime = microtime();
                    echo "\$currentTime: $currentTime<br>";
                    $timeArray = explode(" ", $currentTime);
                    echo var_dump($timeArray) . "<br>";
                    $timeStamp = (float)$timeArray[1] + (float)$timeArray[0];
                    echo "\$timeStamp: $timeStamp<br>";
                    $saveFileName = "$dir/Comment.$timeStamp.txt";
                    echo "\$saveFileName: $saveFileName<br>";
                    if (file_put_contents($saveFileName, $saveString) > 0) {
                        echo "File \"" . htmlentities($saveFileName) . "\"successfully saved.<br>\n";
                    } else {
                        echo "There was an error writing\"" . htmlentities($saveFileName) . "\".<br>\n";
                    }
                }
            }
            //if directory doesnt exist make it and set its permissions
        } else {
            mkdir($dir);
            chmod($dir, 0757);
        }
        //form for the user
        ?>
        <h2>Visitor Comments</h2>
        <form action="VisitorComments.php" method="post">
            Your name: <input type="text" name="name" /><br>
            Your email: <input type="email" name="email" /><br>
            <textarea name="comment" rows="6" cols="100"></textarea><br>
            <input type="submit" name="save" value="Submit Your Comment" />
        </form>
    </body>
</html>