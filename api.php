<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border:2px solid yellow ;
        }
        td{
            border:2px solid green;
        }
        th{
            border:2px solid blue;
        }
    </style>
</head>
<body>
<!-- <center><h1>update from here</h1>
<form>
    <input type="text" placeholder="inter login" name = "login">
</form></center> -->


    <?php
    // header('content-type: application/json');
    include("DB_connection.php");

   function getapi(){
    $context = stream_context_create(
        array(
            "http" => array(
                "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
            )
            )
    );

    $url = "https://api.github.com/users?per_page=100";
    $data = file_get_contents($url, false ,$context);
    $data =json_decode($data, true);

    if($data != null){
        echo"<br> data fetched";
        echo"". count($data);

        global $conn;
        $count = 0;
        foreach ($data as $record) {
            // echo "" . $record['login'] . ": " . $record["node_id"] . "<br>";

            $query = "INSERT INTO my_users.users 
    (login, id, node_id, avatar_url, gravatar_id, url, html_url, followers_url, following_url, gists_url, starred_url, subscriptions_url, organizations_url, repos_url, events_url, received_events_url, type, site_admin) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($query);

$stmt->bind_param(
    "sissssssssssssssss",
    $record["login"],
    $record["id"],
    $record["node_id"],
    $record["avatar_url"],
    $record["gravatar_id"],
    $record["url"],
    $record["html_url"],
    $record["followers_url"],
    $record["following_url"],
    $record["gists_url"],
    $record["starred_url"],
    $record["subscriptions_url"],
    $record["organizations_url"],
    $record["repos_url"],
    $record["events_url"],
    $record["received_events_url"],
    $record["type"],
    $record["site_admin"]
);


        


            if ($stmt->execute() == true) {
                $count++;
                echo "<br>".$count . "record Inserted <br>";
            }
            ;
        }
    } else {
        echo "<br> API error";
    }

 
}


//    getapi();
   getAllUsers();

    
   function getAllUsers()
   {
       global $conn;

       $query = "select * from users";

       $result = $conn->query($query);

       if ($result->num_rows > 0) {
           echo "<table>";
           echo "<tr><th>login</th> <th>id</th> <th>node_id</th> <th>avator_url</th> <th>gravatar_id</th> <th>url</th> <th>html_url</th> <th>delete</th><th>update</th></tr>";

           foreach ($result as $row) {
               echo "<tr>";
               echo "<td>". $row["login"] ."</td><td>". $row["id"] ."</td><td>". $row["node_id"] ."</td><td>". $row["avatar_url"] ."</td><td>".$row["gravatar_id"]."</td><td>".$row["url"]."</td><td>".$row["html_url"]."</td><td>
               <a href='api.php?rn=$row[id]'>delete</a>"."</td><td><a href='update.php?up=$row['id']'>update</a></td>";
               echo "</tr>";
           }

           echo "</table>";


       }
    //    $id=(isset($_GET['up']));
    //    $id=$_GET['up'];
    //    $query="update from user set login where id = $id ";
       $id=$_GET['rn'];
       $query= "delete from users where id ='$id'";
       $result=mysqli_query($conn,$query);
   }
    
    
    
    
    
    ?>
</body>
</html>