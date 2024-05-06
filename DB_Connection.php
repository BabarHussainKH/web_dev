<?php 
    $serverurl = "localhost:3306";
    $database = "login_data";
    $user = "root";
    $password = "";

    $conn = new mysqli($serverurl,$user,$password,$database);
    if($conn->connect_error){
        die("Error: ". $conn->connect_error);
    }else{
        echo "Connected <br >";
    }
?>