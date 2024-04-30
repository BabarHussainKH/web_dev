<?php 
function factorial($num){
   if($num==0){
        return 1;
   }  
    else{
     return $num * factorial($num-1);
   }

}
function factorialRange($num1, $num2) {
    for ($a = $num1; $a <= $num2; $a++) {
        echo "Factorial of $a: " . factorial($a) . "<br>";
    }
}

$num1=1;
$num2=5;
factorialRange($num1,$num2);





?>