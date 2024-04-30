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
    $myArray=array(5,9,3,34,21,65,23,45,66);
    function findMax($myArray){
        $max = $myArray[0];
        foreach($myArray as $value){
            if($value>$max){
                $max = $value;
            }
        }
        return $max;
        
    }
    print_r($myArray);
    echo "<br>";
    echo "Maximum Value in Array is:" .findMax($myArray);


?>
</html>