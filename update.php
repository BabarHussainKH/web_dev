<?php
include("DB_connection.php");
if(isset($_GET['up'])){
    $id=$_GET['up'];


$query="select * from users where id = '$id'";
$result=mysqli_query($conn, $query);
if(!$result){
    die("query failde".mysqli_error());

}
else{
    $row = mysqli_fetch_assoc($result);
    // print_r($row);
}
}

if(isset($_POST['update'])){
    
        $idnew= $_GET['id'];
    
    $login=$_POST['login'];

    $query = "update users set login = '$login' id = '$idnew'";
    $result=mysqli_query($conn, $query);
    if(!$result){
        die("query failde".mysqli_error());
    
    }else{
        header("location:api.php?update_msg=succesfully updated");
    }
}



?>


<form action="update.php" method="post">
    <input type="text" name="login" value="<?php echo $row['login']; ?>" >
    <button type="submit" name="update" value="updatetable">update</button>
</form>
