<!DOCTYPE html>
<html>
<head>
    <title>Simple Calculator</title>
</head>
<body>
    <h2>Simple Calculator</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="num1" placeholder="Enter first number" required>
        <input type="text" name="num2" placeholder="Enter second number" required>
        <br><br>
        <button type="submit" name="operator" value="add">+</button>
        <button type="submit" name="operator" value="subtract">-</button>
        <button type="submit" name="operator" value="multiply">*</button>
        <button type="submit" name="operator" value="divide">/</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operator = $_POST['operator'];
        $result = '';

        switch ($operator) {
            case "add":
                $result = add($num1, $num2);
                break;
            case "subtract":
                $result = subtract($num1, $num2);
                break;
            case "multiply":
                $result = multiply($num1, $num2);
                break;
            case "divide":
                $result = divide($num1, $num2);
                break;
            default:
                $result = "Invalid operator";
        }

        echo "<br>"."Result: " . $result;
    }

    function add($num1, $num2) {
        return $num1 + $num2;
    }

    function subtract($num1, $num2) {
        return $num1 - $num2;
    }

    function multiply($num1, $num2) {
        return $num1 * $num2;
    }

    function divide($num1, $num2) {
        if ($num2 == 0) {
            return "Cannot divide by zero!";
        } else {
            return $num1 / $num2;
        }
    }
    ?>
</body>
</html>
