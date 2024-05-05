<?php

include("DB_Connection.php");

    //getAll();
    //insertRecord("Abdullah", "Android Developer", "abdullah43@gmail.com");
    //deleteRecord(2);
    // updateRecord("Asif Ali Khan", 1);
    loginValidate("123", "ali@gmail.com");
    

function insertRecord($name, $roll = "new employee", $email)
{
    global $conn;

    $query = "insert into employee(name, roll, email) values('$name','$roll','$email')";
    if ($conn->query($query) == true) {
        echo "New Record Inserted";
    } else {
        echo $conn->error;
    }
}

function getAll()
{
    $query = "select * from employee";
    global $conn;
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "" . $row["id"] . ", " . $row["name"] . "<br>";
        }
    } else {
        echo "No data available";
    }
}

function deleteRecord($id)
{
    global $conn;
    $query = "delete from employee where id = '$id'";

    if ($conn->query($query) == true) {
        echo "Record Deleted";
    } else {
        echo $conn->error;
    }
}

function updateRecord($name, $id)
{
    global $conn;
    $query = "update employee set name = '$name' ";

    if ($conn->query($query) == true) {
        echo "Record Updated";
    } else {
        echo $conn->error;
    }
}



function loginValidate($password,  $email)
{
    $query = "select * from employee where email = '$email' and password = '$password'";
    global $conn;
    // echo "$query";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "Succesfull";
            
    } else {
        echo "No data available";
    }
}

?>