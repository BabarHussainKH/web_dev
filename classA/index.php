<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
</head>

<body>

    <?php

    // $name = "Ali";
    

    // function printName()
    // {
    //     global $name;
    //     $name = "Hamza";
    //     echo " <br> $name";
    // }
    
    // function print1()
    // {
    //     for ($i = 0; $i < 10; $i++) {
    //         $i;
    //         echo "<br> $i";
    //     }
    
    //     echo "<br> $i";
    // }
    
    // printName();
    // print1();
    // echo "<br>    $name";
    
    // const value = 43;
    
    // Conditional statements
    
    // 1. if
    // 2. else 
    // 3. ifelse
    // 4. switch
    $a = 43;
    $b = 50;

    // if ($b > $a) {
    //     echo "message";
    // }
    
    // $a = 43;
    // $b = 5;
    // if ($b > $a) {
    //     echo "A";
    // } else {
    //     echo "B";
    // }
    
    // $a = 43;
    // $b = 10;
    // if ($b > $a) { // false
    //     echo "A";
    // } elseif ($b > 5) {
    //     echo "B";
    // } elseif (10 > $a) {
    //     echo "C";
    // } else {
    //     echo "nothing";
    // }
    # code...
    
    $a = 5;
    switch ($a) {
        case 1:
        case 2:
        case 3:
        case 4:
            echo "a is between 1 and 4";
            break;
        case 5:
        case 6:
            echo "a > 4";
            break;
        default: {
            echo "A1";
            echo "A2";
            echo "A3";

        }
    }


    ?>



</body>

</html>