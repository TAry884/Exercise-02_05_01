<!doctype html>
<!--
Author: Ty Ary 
Date: 10.11.18

Filename: VisitorComments3.php
-->


<html>

<head>
    <title>Visitor Comments 3</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="initial-scale=1.0" />
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <?php
        $dir = "./comments";
        //If the all fields are empty tell the user they are unknown
        if (is_dir($dir)) {
            if (isset($_POST['save'])) {
                if (empty($_POST['name'])) {
                    echo "Uknown visitor\n";
                } else {
                    //else submit and save the file to a directory that contains the information of the user that has submitted their information 
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
                    //creates a filehandle that has the filename thats open, if returned false throw a error else lock it
                    $fileHandle = fopen($saveFileName, "wb");
                    if ($fileHandle === false) {
                        echo "There as an error creating \"" . htmlentities($saveFileName) . "\" . <br>\n";
                    } else {
                        if (flock($fileHandle, LOCK_EX)) {
                        if (fwrite($fileHandle, $saveString) > 0) {
                            echo "successfully wrote to \"" . htmlentities($saveFileName) . "\".<br>\n";
                            //Throws a error saying the file couldnt be written
                        } else {
                            echo "There was an error writing to \"" . htmlentities($saveFileName) . "\".<br>\n";
                        }
                            //unlocks the file if everything was successful
                        flock($fileHandle, LOCK_UN);
                        } else {
                            echo "There was an error locking file \"" . htmlentities($saveFileName) . "\".<br>\n";
                        }
                        //closes the file
                        fclose($fileHandle);
                    }
                }
            }
            //else make the directory and change the directory permissions to 0666
        } else {
            mkdir($dir);
            chmod($dir, 0666);
        }
        ?>
        <h2>Visitor Comments 3</h2>
        <form action="VisitorComments3.php" method="post">
            Your name: <input type="text" name="name" /><br> Your email: <input type="email" name="email" /><br>
            <textarea name="comment" rows="6" cols="100"></textarea><br>
            <input type="submit" name="save" value="Submit Your Comment" />
        </form>
</body>

</html>
