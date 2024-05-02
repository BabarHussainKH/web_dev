<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>

<body>
    <center>
        <div>
            <h1>Calculator</h1>
            <form action="" method="post">
                <input type="text" placeholder="Enter First Number" name="num1">
                <br>
                <br>
                <input type="text" placeholder="Enter Second Number" name="num2">
                <br>
                <br>
                <select name="select">
                    <option value="+" name="select">+</option>
                    <option value="-" name="select">-</option>
                    <option value="*" name="select">*</option>
                    <option value="/" name="select">/</option>
                </select>

                <br>
                <br>
                <input type="submit" placeholder="calculate" name="calculate"><br><br>
            </form>

        </div>
    </center>
    <?php


    if ($_POST) {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $operator = $_POST["select"];
        if ($operator == "+") {
            echo "<center>Addition of $num1 & $num2 is: " . $num1 + $num2."</center>";
        } else if ($operator == "-") {
            echo "<center>Subtraction of $num1 & $num2 is: " . $num1 - $num2."</center>";
        } else if ($operator == "*") {
            echo "<center>Multiplication of $num1 & $num2 is: " . $num1 * $num2."</center>";
        } elseif ($operator == "/") {
            if ($num2 == 0) {
                echo "<center>Not divided by zero</center>";

            } else {

                echo "<center>Division of $num1 & $num2 is: " . $num1 / $num2."</center>";
            }
        } else {
            echo "invalid operation";
        }
    }

    ?>
</body>

</html>