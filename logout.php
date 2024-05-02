<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>

    <h1> Logout Page</h1>
    <?php
    session_start();
    session_destroy();
    header("Location:login.php");
    exit();


    ?>
</body>

</html>