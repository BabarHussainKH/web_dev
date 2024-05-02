<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
<body>
    <h1>welcome to my site</h1>
    <h3>Login</h3>
    <form method="post">
        <input type="text" name="userID" id="userID">
        <input type="password" name="userpass" id="userpass">
        <button type="submit" name="login" value=" login">login</button>
    </form>

    <?php
  session_start();
  // session_destroy();

  $userID =$_SESSION["username"];
  $userPasword = $_SESSION["userpassword"];

  if (isset($_SESSION["userID"])) {
     header("Location:profile.php");
  }


  if ($_SERVER['REQUEST_METHOD'] == "POST") {
      if (isset($_POST["login"])) {
          if ($userID == $_POST["userID"] && $userPasword == $_POST["userpass"]) {
              $_SESSION["userID"] = $userID;
              header("Location:profile.php");
              exit();
          } else {
              echo "<br> Invalid";
          }
      }
  }

    ?>
    
</body>
</html>