<?php
include ("DB_Connection.php");
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

            $qry = "INSERT INTO github.github_users
            (login, id, node_id, avatar_url, gravatar_id, url, html_url, followers_url, following_url, gists_url, starred_url, subscriptions_url, organizations_url, repos_url, events_url, received_events_url, `type`, site_admin)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
            $stmt = $conn->prepare($qry);
            $stmt->bind_param(
                "sissssssssisssssss",
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
                echo $count . "record Inserted <br>";
            }
            ;
        }

    } else {
        echo "<br> API error";
    }
}

getAPI();
?>