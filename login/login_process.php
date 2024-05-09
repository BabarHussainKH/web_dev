<?php
session_start();
include ("DB_Connection.php");


$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $_SESSION['username'] = $username;
    header("Location: welcome.php");
} else {
    $_SESSION['login_error'] = "Invalid username or password.";
    header("Location: login.php");
}

mysqli_close($conn);
?>
