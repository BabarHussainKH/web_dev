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
    function work(){
        echo $this->name. " is working";
        echo "<br>----------------";
    }
}
$obj1=new employee();
$obj1->name="Wasim Ahmed";
$obj1->age=27;
$obj1->salary=40000;

$obj1->work();
echo"<br>";
$obj2=new employee();
$obj2->name="Zubair";
$obj2->age=25;
$obj2->salary=35000;
$obj2->work();
echo"<br>";


print_r ($obj1);
echo "<br>";
print_r ($obj2);


    ?>
</body>
</html>