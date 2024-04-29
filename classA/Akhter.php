<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
<?php 
function findMaxValue($array) {
    return max($array);
}

$numbers = array(2, 4, 6, 8, 10, 12, 14);
$maxValue = findMaxValue($numbers);
echo $maxValue;



function findmin($number){
    return min($numbers);
}
$numbers = array(2, 4, 6, 8, 10, 12, 14);
$minValue = findmin($numbers);
echo $minValue;

$minval=min($number);
echo"$minval";


function sortDesc($array) {
    rsort($array);
    return $array;
}

$numbers = array(2, 4, 6, 8, 10, 12, 14);
$sortedNumbers = sortDesc($numbers);
print_r($sortedNumbers);

function sortAsc($array) {
    sort($array);
    return $array;
}

$numbers = array(2, 4, 6, 8, 10, 12, 14);
$sortedNumbers = sortAsc($numbers);
print_r($sortedNumbers);




function calculateSum($numbers)
{
    $numberLength = count($numbers);
    $sum = 0;

    for ($i = 0; $i < $numberLength; $i++) {
        $sum += $numbers[$i];
    }

    return $sum;
}


$numbers = array(2, 4, 6, 8, 10, 12, 14);
$totalSum = calculateSum($numbers);
echo "Sum of all numbers: $totalSum";




?>
</html>