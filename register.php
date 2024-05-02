<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>
<body>
    <h1>Register</h1>
    <form method="POST">
    <label for="">Enter Username:</label>
        <input type="text" placeholder="enter username" name="username" id="username">
        <br><br>
        <label for="">Enter Password:</label>
        <input type="password" placeholder="enter password" name="userpassword" id="userpassword">
        <br><br>
        <button type="submit" name="register" Value="Register">Register</button>
    </form>
    <?php
    session_start();
    session_destroy();


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $_SESSION["username"] = $_POST["username"];
        $_SESSION["userpassword"]= $_POST["userpassword"];
    
        if (isset($_POST["register"])) {
                header("Location:profile.php");
                exit();
            
        }
    }

    ?>

</body>
</html>