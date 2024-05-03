<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes and Objects</title>
</head>
<body>
    <?php
class employee{
    var $name;
    var $age;
    var $salary;
    function __construct($name, $age, $salary){
        $this->name=$name;
        $this->age=$age;
        $this->salary=$salary;
    }
    function work(){
        echo $this->name. " is working";
        echo "<br>";
    }
}
$obj1=new employee("wasim", 27, 40000);
$obj1->work();
print_r($obj1);
echo"<br>";
$obj2=new employee("zubair", 25, 35000);
 echo "<br>";
 $obj2->work();
 print_r ($obj2);


    ?>
</body>
</html>