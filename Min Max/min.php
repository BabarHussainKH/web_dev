<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minimum User Defined Function</title>
</head>
<body>
    
</body>
<?php
    $myArray=array(5,9,35,9,3,34,21,65,23,45,66);
    function findMin($myArray){
        $min = $myArray[0];
        foreach($myArray as $value){
            if($value<$min){
                $min = $value;
            }
        }
        return $min;
        
    }
    print_r($myArray);
    echo "<br>";
    echo "Minimum Value in Array is:" .findMin($myArray);


?>
</html>