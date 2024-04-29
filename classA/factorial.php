<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial</title>
</head>

<body>

</body>

</html>

<?php
// 0! = 1
// 5! = 1 * 2 * 3 * 4 * 5 = 120
echo "Factorial of 5 is: " . getFacto(5);
function getFacto($num)
{
    $fact = 1;
    if ($num == 0) {
        return $fact;
    } else {
        for ($i = 1; $i <= $num; $i++) {
            $fact *= $i;
        }

        return $fact;
    }
}
?>