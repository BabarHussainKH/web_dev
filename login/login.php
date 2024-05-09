<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>
<body>
    <?php
    session_start();
    ?>
    <div class="container">
    <form method="POST" action="login_process.php">
        <label for=""> User Name</label>
        <input type="text" name="username" class="form-control"><br>
        <label for=""> Password</label>
        <input type="password" name="password" class="form-control"><br>
        <input type="submit" value="Login" class="btn btn-success">
     
     <?php
        if (isset($_SESSION ['login_error'])){
            echo "Invalid User Or Password";
            $_SESSION['login_error'] = null;
        }
        ?>
    

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>