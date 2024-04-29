<!DOCTYPE html>
<html lang="en">


<?php
$_SESSION["attempts"] = 5;
$att = 5;

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess</title>
</head>

<body>

    <form method="post">
        <label for="guess">Enter Your Guess</label>
        <input type="number" min=30 max=100 id="guess" name="guess">
        <button type="submit" value="submit" name="submit">Guess</button>
    </form>

    <?php

    $random = rand(30, 100);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userGuess = $_POST["guess"];
        global $att;
        if ($att > 0) {
            if ($userGuess > $random) {
                echo "<br>High Guess";
                $att--;
            } elseif ($userGuess < $random) {
                echo "<br>Low Guess";
                $att--;
            } else {
                echo "Guess match";
            }
        } else {
            echo "<br>attempts completed";
        }

        echo "<br> Attempts left:" . $att--;


    }

    ?>

</body>

</html>