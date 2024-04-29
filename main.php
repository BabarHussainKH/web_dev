<?php 
$arr = array(33,54,65,84,34,68);
function mysum($arr){
    $sumarray=0;
    foreach($arr as $value){
        $sumarray += $value;
    }
return $sumarray;
}
function mymin($arr){
    $min = $arr[0];
    for($i = 1; $i < count($arr); $i++){
        if($arr[$i] < $min){
            $min = $arr[$i];
        }
    }
    return $min;
}
function mymax($arr){
    $max = $arr[0];
    for($i = 1; $i < count($arr); $i++){
        if($arr[$i] > $max){
            $max = $arr[$i];
        }
    }
    return $max;
}
function mysortasc($arr){
    $sorted = $arr;
    for($i = 0; $i < count($sorted); $i++){
        for($j = $i + 1; $j < count($sorted); $j++){
            if($sorted[$i] > $sorted[$j]){
                $temp = $sorted[$i];
                $sorted[$i] = $sorted[$j];
                $sorted[$j] = $temp;
            }
        }
    }
    return $sorted;
}
function myrsortdes($arr){
    $sorteddes = $arr;
    for($i = 0; $i < count($sorteddes); $i++){
        for($j = $i + 1; $j < count($sorteddes); $j++){
            if($sorteddes[$i] < $sorteddes[$j]){
                $temp = $sorteddes[$i];
                $sorteddes[$i] = $sorteddes[$j];
                $sorteddes[$j] = $temp;
            }
        }
    }
    return $sorteddes;
}
function secondLargest($arr){
    $max1 = $arr[0];
    $max2 = null;
    for($i = 1; $i < count($arr); $i++){
        if($arr[$i] > $max1){
            $max2 = $max1;
            $max1 = $arr[$i];
        }elseif($arr[$i] > $max2 && $arr[$i] < $max1){
            $max2 = $arr[$i];
        }
    }
    return $max2;
}
echo "Array is: <br>";
print_r($arr);

$arrsum=mysum($arr);
echo"<br>Sum is: $arrsum <br>";
$arrmin=mymin($arr);
echo"Minimum Value is: $arrmin <br>";
$arrmax=mymax($arr);
echo"Minimum Value is: $arrmax <br>";
$arrsortasc=mysortasc($arr);
echo"Sorted Array in Ascending Order <br>";
print_r($arrsortasc);
$arrsortdsc=myrsortdes($arr);
echo"<br>Sorted Array in Descending Order <br>";
print_r($arrsortdsc);
$secondLarge = secondLargest($arr);
echo "<br>Second Largest Number in Array is: $secondLarge <br>";
?>