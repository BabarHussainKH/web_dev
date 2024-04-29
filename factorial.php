<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function factorial($num)
    {
        $fact = 1;
        if ($num == 0) {
            return $fact;
        } else {
            for ($i = 1; $i <= $num; $i++) {
                for ($j = 1; $j <= $i; $j++) {
                    $fact =$fact* $j;
                }
                echo "Factorial of " . $i . " is " . $fact . "<br>";
                $fact = 1;
            }
            // return $fact;
        }
    }
    factorial(5);

    ?>
</body>

</html>