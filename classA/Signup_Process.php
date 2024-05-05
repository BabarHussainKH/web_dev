<?php
include ("DB_Connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userName = $_POST["username"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $repPasword = $_POST["rep_password"];

    $query = "insert into employee(name, roll, email, mobile, password) 
    values('$userName','Developer','$email','$mobile','$password')";
    if ($conn->query($query) == true) {
        echo "Registration Successful";
    } else {
        echo $conn->error;
    }


}



?>