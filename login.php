<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <label for="userID">Enter Your ID: </label>
        <input type="text" name="userID" id="UserID"><br><br>
        <label for="userpass">Enter Your Password: </label>
        <input type="password" name="userpass" id="Userpass"><br><br>
        <input type="submit" value="Login" name="login">

    </form>
    <?php 
    session_start();
    session_destroy();
    $userID= "Demo";
    $userpass = "demos1234";
    if(isset($_SESSION["userID"])){
        header("Location:profile.php");
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($userID == $_POST["userID"] && $userpass == $_POST["userpass"]){
            $_SESSION["userID"] = $userID;
            header("Location:profile.php");
            exit();
        }else{
            echo"<br>Invalid Login Credentials";
        }
    }
     ?>
</body>
</html>