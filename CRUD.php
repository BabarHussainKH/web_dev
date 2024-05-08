<?php
include("DB_connection.php");

// insertRecord("abdullah","abdullah@gmail.com","abdullah123","abdullah123");

function insertRecord($name,$email,$password){
    global $conn;
    $query= "insert into employee (name,email,password) values('$name','$email','$password')";
    if ($conn->query($query) == true) {
        echo "<br> New Record Inserted";
    } else {
        echo $conn->error;
    }
}
function getAll(){
    $query = "select * from employee";
    global $conn;
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<br> name:" . $row["name"] . ", email: " . $row["email"] . "<br>";
        }
    } else {
        echo "No data available";
    }
}
// getall();
function deleteRecord($name){
    global $conn;
    $query = "delete from employee where id = '$name'";

    if ($conn->query($query) == true) {
        echo "Record Deleted";
    } else {
        echo $conn->error;
    }

}
// deleteRecord(2);
function updateRecord($name, $password)
{
    global $conn;
    $query = "update employee set name = '$name' ";

    if ($conn->query($query) == true) {
        echo "Record Updated";
    } else {
        echo $conn->error;
    }
}
updateRecord("Asif Ali Khan", 12345);
?>