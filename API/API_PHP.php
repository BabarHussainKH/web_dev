<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API in PHP</title>


    <style>

    table{
            border: 2px solid gray,
    }

    td {
  border: 1px dotted #999;
}

    </style>
</head>

<body>
    <?php

    include ("DB_Connection.php");

    // header("content-type:application/json");
    
 

    getAllUsers();

    function getAllUsers()
    {
        global $conn;

        $qry = "select * from github_users";

        $res = $conn->query($qry);

        if ($res->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>login</th> <th>id</th> <th>node_id</th> <th>avator_url</th></tr>";

            foreach ($res as $row) {
                echo "<tr>";
                echo "<td>". $row["login"] ."</td><td>". $row["id"] ."</td><td>". $row["node_id"] ."</td><td>". $row["avatar_url"] ."</td>";
                echo "</tr>";
            }

            echo "</table>";


        }


    }

    function getAPI()
    {

        $context = stream_context_create(
            array(
                "http" => array(
                    "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
                )
            )
        );

        $url = "https://api.github.com/users?per_page=100";

        $response = file_get_contents($url, false, $context);
        $response = json_decode($response, true);

        if ($response != null) {
            echo "<br> Data Fetched ";
            echo "" . count($response);


            global $conn;
            $count = 0;
            foreach ($response as $record) {
                echo "" . $record['login'] . ": " . $record["node_id"] . "<br>";

                $qry = "INSERT INTO cms.github_users (login, id, node_id, avatar_url)VALUES (?, ?, ?, ?);";
                $stmt = $conn->prepare($qry);

                // echo var_dump($record["login"]);
                // echo var_dump($record["id"]);
                // echo var_dump($record["node_id"]);
    
                $stmt->bind_param(
                    "siss",
                    $record["login"],
                    $record["id"],
                    $record["node_id"],
                    $record["avatar_url"]
                );


                if ($stmt->execute() == true) {
                    $count++;
                    echo $count . "record Inserted <br>";
                }
                ;
            }

        } else {
            echo "<br> API error";
        }
    }


    ?>


</body>

</html>