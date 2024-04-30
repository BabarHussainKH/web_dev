<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess</title>
</head>

<body>

    <form method="post">
        <label for="guess">Enter Your Guess (Between 1 and 100 )</label>
        <input type="number" min=1 max=100 id="guess" name="guess">
        <button type="submit" name="check">Guess</button>
        <button type="submit" name="reset">Reset</button>
    </form>

    <?php
    session_start();
    //  reSetSession();


    function getRandNum()
    {
        return rand(1, 100);
    }

    function reSetSession()
    {
        $_SESSION["sec_number"] = getRandNum();
        $_SESSION["messages"] = [];
        $_SESSION["attempts"] = 5;
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userGuess = $_POST["guess"];

        if (isset($_POST["reset"])) {
            reSetSession();
        } else {

            if ($userGuess == $_SESSION["sec_number"]) {
                $message = "Congratz! you guessed correct";
                echo "<br> $message ";
                exit();
            } elseif ($userGuess > $_SESSION["sec_number"]) {
                $_SESSION["attempts"]--;
                $message = "your guess  $userGuess is high  [Attempts left:". $_SESSION["attempts"] ."]";
                array_push($_SESSION["messages"], $message);
            } elseif ($userGuess < $_SESSION["sec_number"]) {
                $_SESSION["attempts"]--;
                $message = "your guess $userGuess is low  [Attempts left:". $_SESSION["attempts"] ."]";;
                array_push($_SESSION["messages"], $message);
            }
        }

        if ($_SESSION["attempts"] == 0) {
            $message = "Attempts completed, Secret number is. " . $_SESSION["sec_number"];
            echo "<br> $message ";
            exit();
        }

        echo "<ul>";
        foreach ($_SESSION["messages"] as $message) {
            echo "<li> $message </li>";

        }
        echo "</ul>";

    }

    ?>

</body>

</html>