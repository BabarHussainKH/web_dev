<?php
function fact($num){
    $factorial=1;
    if($num==0){
        return $factorial;
    
    }else{
        for($i=1;$i<=$num;$i++){
            // $factorial *=$i;
            for($j=$i;$j<=$i;$j++){
                $factorial = $factorial * $j;
            }
            echo "<br>".$factorial;
            
        }
    }

}
echo fact(5);




?>