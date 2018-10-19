<!doctype html>
<!--
Author: Ty Ary 
Date: 10.1.18

Filename: TheGame.php
-->


<html>
    <head>
        <title>The Game</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="initial-scale=1.0" />
        <link rel="stylesheet" href="TheGame.css" />
        <script src="modernizr.custom.65897.js"></script>
    </head>
    <body>
        <h2 align="center">The Game</h2>
        <form action="TheGame.php" method="post">
           <table>
            <tr><td>Username:</td> <td><input type="text" name="username" class="formFields" required/></td></tr>
            <tr><td>Password:</td> <td><input type="password" name="password" class="formFields" required/></td></tr>
            <tr><td>Full name:</td> <td><input type="text" name="fullname" class="formFields" /></td></tr>
            <tr><td>Email:</td> <td><input type="email" name="email" class="formFields" /></td></tr>
            <tr><td>Age:</td> <td><input type="number" name="age" class="formFields" /></td></tr>
            <tr><td>Screen name:</td> <td><input type="text" name="screenName" class="formFields" /></td></tr>
            <tr><td valign='top'>Comments:</td> <td><textarea name="comments" cols="30" rows="10" class="formFields" ></textarea></td></tr>
            </table>
            <input type="submit" name="submit" value="Submit the Form" id="submit"/>
        </form>
        <hr>
        <table id="styling">
        <h2>Registered Gamers</h2>
        <?php
        function regUser($saveString) {
            $user = explode("^", $saveString);
            foreach ($user as $someone) {
                $someone = explode("|", $someone);
                echo "<tr><td><hr></td></tr>";
                echo "<tr><td><strong>Username </strong>$someone[0]</td></tr>";
                echo "<tr><td><strong>Screen Name </strong>$someone[5]</td></tr>";
                echo "<tr><td><strong>Comments </strong>$someone[6]</td></tr>";
            }
        }
            $fileName = "TheGame.txt";
        if (!file_exists($fileName)) {
            $fileHandle = fopen($fileName, 'w') or die('Sorry the file cannot be opened'. $fileName);
            chmod($fileName, 0757);
            fclose($fileHandle);
        } else {
            if (isset($_POST['submit'])) {
                if (empty($_POST['username'])) {
                echo "Sorry gamer, your an unknown visitor\n";
            } else {
                if (empty(file_get_contents($fileName))) {
                    $saveString = "";
                } else {
                    $saveString = "^";
                }
                $saveString .= stripslashes($_POST['username']) . "|";
                $saveString .= stripslashes(md5($_POST['password'])) ."|";
                $saveString .= stripslashes($_POST['fullname']) . "|";
                $saveString .= stripslashes($_POST['email']) . "|";
                $saveString .= stripslashes($_POST['age']) . "|";
                $saveString .= stripslashes($_POST['screenName']) . "|";
                $saveString .= stripslashes($_POST['comments']) . "\n";
                    $fileHandle = fopen($fileName, "a");
                    if ($fileHandle === false){
                        echo "There was a error reading \"$fileName\"<br>\n";
                    } else {
                        fwrite($fileHandle, $saveString);
                        regUser(file_get_contents($fileName));
                    }
                    echo "<br>\n";
                    fclose($fileHandle);
                }
            }
        }
        ?>
        </table>
    </body>
</html>