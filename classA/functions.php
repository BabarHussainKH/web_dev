<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Functions</title>
</head>

<body>
    <?php

    function decryptMessage($message){
        return "Hello php developers";
    }
    function message($message, $hashCode, $enc_key){
        echo "<br>$message";  echo "<br>$hashCode";
        echo "<br>$enc_key";
        return decryptMessage($message);
    }

    $result = message("(*%$%^%&*&*(^$&JHG&$&%&^", "32$4TR34F5", 43242342);
    echo "<br> $result ";

    ?>


</body>

</html>