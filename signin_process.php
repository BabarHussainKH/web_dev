<?php 

include("DB_Connection.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $useremail = $_POST['useremail']; 
    $userpass = $_POST['userpasses'];
    $query = "select * from registration where Email = '$useremail' and Password = '$userpass'";
     if ($conn->query($query) == true) {
        header("location:Welcome.php");
    } else {
        echo $conn->error;
    }
}
?>