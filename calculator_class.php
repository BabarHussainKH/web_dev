<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Calculator Using class</h1>
    <?php 
    class Calculator{
        public function add($num1,$num2){
            return $num1+$num2;
        }
        public function sub($num1,$num2){
            return $num1-$num2;
        }
        public function multiply($num1,$num2){
            return $num1*$num2;
        }
        public function divide($num1,$num2){
            if($num2==0){
                return "Can't divide by zero";
            }else{
            return $num1/$num2;
        }
    }
    }
    $addition = new Calculator();
    $subtraction = new Calculator();
    $multiplication = new Calculator();
    $division = new Calculator();
    echo "Addition is: ".$addition->add(2,3)."<br>";
    echo "Subtraction is: ".$subtraction->add(44,4)."<br>";
    echo "Multiplication is: ".$multiplication->add(3,5)."<br>";
    echo "Division is: ".$division->add(3,6);
    
     ?>
     
</body>
</html>