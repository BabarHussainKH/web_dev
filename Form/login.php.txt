<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <h1> Login Page</h1>


    <form method="post">

        <label for="userID">Enter Your ID</label><br>
        <input type="text" name="userID" id="userID"><br>

        <label for="userPass">Enter Your Password</label><br>
        <input type="password" name="userPass" id="userPass"><br>

        <button type="submit" name="login" value="Login">Login</button>
    </form>

    <?php
    session_start();
    // session_destroy();

    $userID = "demo";
    $userPasword = "demo123";

    if (isset($_SESSION["userID"])) {
       header("Location:profile.php");
    }


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST["login"])) {
            if ($userID == $_POST["userID"] && $userPasword == $_POST["userPass"]) {
                $_SESSION["userID"] = $userID;
                header("Location:profile.php");
                exit();
            } else {
                echo "<br> Invalid login credentials";
            }
        }
    }



    ?>

</body>

</html>