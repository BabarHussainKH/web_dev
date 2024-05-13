<?php 

if (isset($_GET['id'])){
    include ("DB_Connection.php");
    global $conn;
$id = $_GET['id'];
$del = "delete from github_users where id = $id";
$res = $conn->query($del);
}
header("location:data.php");
exit();
?>