<?php 

include("DB_Connection.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $useremail = $_POST['useremail']; 
    $userpass = $_POST['userpasses'];
    $userpasscon = $_POST['userpassconfirm'];
    $query = "insert into registration(Name, Email, Password, ConfirmPassword) 
    values('$username','$useremail','$userpass','$userpasscon')";
    if ($conn->query($query) == true) {
        echo "Registration Successful";
    } else {
        echo $conn->error;
    }
}
?>