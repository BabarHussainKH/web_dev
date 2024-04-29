<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


</body>
<?php
// Define the array with 6 values
$values = array(15, 7, 22, 9, 13, 18);

// Find the minimum and maximum values
$minValue = min($values);
$maxValue = max($values);

// Calculate the sum of all values
$sum = array_sum($values);

// Sort the array in ascending order
sort($values);
$ascendingSortedArray = $values;

// Sort the array in descending order
rsort($values);
$descendingSortedArray = $values;

// Display the results
echo "Original Array: " . implode(", ", $values) . "\n";
echo "Minimum Value: $minValue\n";
echo "Maximum Value: $maxValue\n";
echo "Sum of Values: $sum\n";
echo "Ascending Sorted Array: " . implode(", ", $ascendingSortedArray) . "\n";
echo "Descending Sorted Array: " . implode(", ", $descendingSortedArray) . "\n";



?>
</html>
