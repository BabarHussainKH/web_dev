<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asso Arrays</title>
</head>

<body>

    <?php

    $students = ["name" => "Ali", "email" => "ali@gmail.com", "age" => 43];

    // echo "<br>" . count($students) . "<br>";
    // echo "<br>" . $students["name"];
    $students["name"] = "Hamza";
    $students["developer"] = "Php Developer";
    $students[50] = "score";
    $students["skills"] = array("HTML", "CSS", "Java", "Flutter");


    $value = ["java"];
    $value[] = 43;
    $value[] = [true, false];
    
    var_dump($value);
    echo "<br>";
    print_r($value);

    if (is_array($value)) {
        echo "<br>value is an array";
    } else {
        echo "<br>value is not an array";
    }

    // echo "<br>" . count($students) . "<br>";
    
    // foreach ($students as $k => $v) {
    //     if (is_array($v)) {
    //         print_r($v);
    //     } else {
    //         echo "<br>$k  :$v ";
    //     }
    // }
    
    ?>



</body>

</html>