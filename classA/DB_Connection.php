<?php

$serverURL = "localhost:3306";
$database = "ems";
$user = "root";
$password = "";

$conn = new mysqli($serverURL, $user, $password, $database);

if ($conn->connect_error) {
    die("Error: " . $conn->connect_error);
} else {
    echo "<br> Connection Successfull.";
}

?>