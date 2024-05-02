<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="./cal.css">
</head>
<body>
    <center>
        <div>
            <h1>simple Calculator</h1>
            <form action="" method="post">
                <input type="text" placeholder="enter first number" id="num1" name="num1">
                <br>
                <br>
                <input type="text" placeholder="enter second number" id="num2" name="num2">
                <br>
                <br>
                <select name="select" id="done">
                    <option value="+" id="done"  name="select">+</option>
                    <option value="-" id="done" name="select">-</option>
                    <option value="*" id="done" name="select">*</option>
                    <option value="/" id="done" name="select">/</option>
                </select>
                
                <br>
                <br>
                <input type="submit" placeholder="calculate" class="bty" onclick="calc()" name="calculate">
            </form>
            
        </div>
    </center>
<?php
    $num1=$_POST["num1"];
    $num2=$_POST["num2"];
    $operator=$_POST["select"];

    if($_POST){
        if($operator=="+"){
            echo $num1+$num2;
        }else if($operator=="-"){
            echo $num1-$num2;
        }else if($operator=="*"){
            echo $num1*$num2;
        }elseif($operator=="/"){
            echo$num1/$num2;
        }else{
            echo"invalid operation";
        }
    }

?>
</body>
</html>