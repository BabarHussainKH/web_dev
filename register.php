<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>
<body>
    <h1>register</h1>
    <form method="POST">
        <input type="text" placeholder="enter username" name="username" id="username">
        <br>
        <br>
        <input type="password" placeholder="enter password" name="userpassword" id="userpassword">
        <br>
        <button type="submit" name="register" Value="register">save</button>
    </form>
    <?php
    session_start();
    session_destroy();
    // session_destroy();

    $_SESSION["username"] = $_POST["username"];
    $_SESSION["userpassword"]= $_POST["userpassword"];

    // if (isset($_SESSION["userID"])) {
    //    header("Location:profile.php");
    // }


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST["register"])) {
            // if ($username == $_POST["username"] && $userSecurity == $_POST["userpassword"]) {
            //     $_SESSION["username"] = $username;
                header("Location:login.php");
                exit();
            // } else {
            //     echo "<br> Invalid login credentials";
            // }
        }
    }

    ?>

</body>
</html>