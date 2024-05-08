<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Glowing Inputs Login Form UI</title>
      <link rel="stylesheet" href="login.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="login-form">
         <div class="text">
            LOGIN
         </div>
         <form action="signin_process.php" method="post">
            <div class="field">
               <div class="fas fa-envelope"></div>
               <input type="text" placeholder="Email or Phone" name="emails">
            </div>
            <div class="field">
               <div class="fas fa-lock"></div>
               <input type="password" placeholder="Password" name="passwords">
            </div>
            <button type="submit" value="login">LOGIN</button>
            <div class="link">
               Not a member?
               <a href="signup.php">Signup now</a>
            </div>
         </form>
      </div>
   </body>
</html>