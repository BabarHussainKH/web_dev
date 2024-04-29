<?php

 $arr1 = array(-32,332,4,55,6,7,8);

 //MIN VALUE

 function minValue($arr1){
       $minValue = INF;
       foreach ($arr1 as $value){
           if($value < $minValue){
             $minValue = $value;
           }
       }
   echo"Min Value is .$minValue";
 }

 //MAX VALUE

 function maxValue($arr1){
    $maxValue = -INF;
    foreach ($arr1 as $value){
        if($value < $arr1){
          $maxValue = $value;
        }
    }
   echo"Max Value is .$maxValue";
}

  //Sum Function

  function sum($arr1){
    $arrSum = 0;
    foreach ($arr1 as $value) {
        $arrSum += $value;
    }
    echo"Sum of array is = .$arrSum";
  }

  //Sorting in Ascending order
    function sortAscend($arr1){
        $n = count($arr1);
  
        for($i = 0; $i < $n-1; $i++) {
            for ($j = 0; $j < $n-$i-1; $j++) {
                
                if ($arr1[$j] > $arr1[$j+1]) {
                    $temp = $arr1[$j];
                    $arr1[$j] = $arr1[$j+1];
                    $arr1[$j+1] = $temp;
                }
            }
        }
        echo "Sorting of array in ascending order: ";
        foreach ($arr1 as $value) {
            echo "$value ";
        }
      }

  //Sorting in Descending order
     function sortDescend($arr1){
      $k = count($arr1);
    for($m = 0; $m < $k-1; $m++) {
        for ($l = 0; $l < $k-$m-1; $l++) {
            if ($arr1[$l] < $arr1[$l+1]) {
                $temp = $arr1[$l];
                $arr1[$l] = $arr1[$l+1];
                $arr1[$l+1] = $temp;
            }
        }
    }
    echo "Sorting of array in descending order: ";
    foreach ($arr1 as $value) {
        echo "$value ";
}
     }

     
  //Finding the Second Largest Number in the Array
     function secondLargest($arr1){
      
        $p = count($arr1);
    
        $largest = 0;
        $secondLargest = 0;

            for ($i = 0; $i < $p; $i++) {
            if ($arr1[$i] > $largest) {
                $secondLargest = $largest;
                $largest = $arr1[$i];
            } elseif ($arr1[$i] > $secondLargest && $arr1[$i] != $largest) {
                $secondLargest = $arr1[$i];
            }
        }
    
        echo "Second Largest Number in the Array: " . $secondLargest;
    }
 
     

     minValue($arr1);
     echo"<br>";
     maxValue($arr1);
     echo"<br>";
     sum($arr1);
     echo"<br>";
     sortAscend($arr1);
     echo"<br>";
     sortDescend($arr1);
     echo"<br>";
     secondLargest($arr1);





?>