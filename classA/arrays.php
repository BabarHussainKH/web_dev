<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrsys</title>
</head>

<body>
    <?php

    // used for sum array [single line comment]
    /*
        fsf  [block level comment]
        sdf
        sdfsd
        fsdf
        sdf
    */


    // Taks
    //  - Array = [5,3,56,2,663,6]
    // - min value
    // - max value
    // - sum
    // - sort in ascending and descending
    // - 2nd largest value
    // [How to auto refresh php page changes in browser]
    
    function YOU3553($myArray)
    {
        $sumArray = 0;
        foreach ($myArray as $value) {
            $sumArray += $value;
        }

        return $sumArray;
    }


    $value = 5;
    $arr1 = array(11, 2, 3);
    // sort($arr1);
    // $arr2 = [];
    // $arr2[0] = 55;
    
    // $minValue = min($arr1);
    // echo "$minValue";
    // $minValue = max($arr1);
    // echo "$minValue";
    // var_dump( $value );
    // echo"<br>";
    // print_r( $arr1);
    // $arr1[3]  =100;
    // echo"<br>";
    // var_dump( $arr1);
    // echo"<br>";
    // print_r($arr1);
    // $sum1 =array_sum($arr1);
    
    // print_r($arr1);
    // echo "". count($arr1);
    
    $sum = sumArray($arr1);
    echo"$sum";
    ?>


</body>

</html>