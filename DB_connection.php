<?php
$serverURL = "localhost:3306";
$database = "mydatatable";
$user = "root";    
$password = "";

$conn = new mysqli($serverURL, $user, $password, $database);

if ($conn->connect_error) {
    die("Error: " . $conn->connect_error);
} else {
    echo "Connected";
    echo "<br> Connection Successfull.";
}

?>