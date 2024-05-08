<?php
include("DB_connection.php");

if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $confirmPassword=$_POST["confirmPassword"];
    if($password==$confirmPassword){
        $query="insert into info(name,email,password) values('$name','$email','$password')";
        // echo "$query";
        if($conn->query($query)){
            echo "data has been saved and registred in info";
        }else{
            echo $conn->error;
        }
    }else{
        echo "enter feilds correctly";
    }
    
}



?>