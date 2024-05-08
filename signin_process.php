<?php 

include("DB_Connection.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $useremail = $_POST['useremail']; 
    $userpass = $_POST['userpass'];
    $query = "select * from registration where Email = '$useremail' and Password = '$userpass'";
    $result = mysqli_query($conn, $query);

    //  if ($conn->query($query) == true) {
    //     if($useremail == $_POST['useremail'] and $userpass == $_POST['userpasses']){
    //         header("location:Welcome.php");
    //     }else{
    //         echo "Invalid User";
    //     }
        
    // } else {
    //     echo $conn->error;
    // }

    // check if user exists
if (mysqli_num_rows($result) > 0) {
    // user exists, login successful
    session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION['email'] = $email;
    header('Location: welcome.php');
    exit;
} else {
    // user does not exist or password is incorrect
   echo"Invalid email or password";
}

// close connection
mysqli_close($conn);
}
?>
