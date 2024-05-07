<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
<form method="get">
    <input type="text" name="num1" placeholder="Number 1">
    <input type="text" name="num2" placeholder="Number 2">
    <br>
    <button type="submit" name="operator" value="add">+</button>
    <button type="submit" name="operator" value="subtract">-</button>
    <button type="submit" name="operator" value="multiply">*</button>
    <button type="submit" name="operator" value="divide">/</button>
    <input type="hidden" name="calculate" value="true">
</form>
<p>The Answer is:</p>
<?php
if (isset($_GET['operator'])) {
    $result1 = $_GET['num1'];
    $result2 = $_GET['num2'];
    $operator = $_GET['operator'];
    switch ($operator) {
        case "add":
            echo $result1 + $result2;
            break;
        case "subtract":
            echo $result1 - $result2;
            break;
        case "multiply":
            echo $result1 * $result2;
            break;
        case "divide":
            echo $result1 / $result2;
            break;
    }
}
?>
</body>
</html>