
<?php
include ("DB_Connection.php");
if (isset($_GET['id']))
{
    global $conn;
    $id = $_GET['id'];

    $qry = "select * from github_users where id = $id";

    $res = $conn->query($qry);


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body class="bg-dark">
    <div>
        <div class="row mt-8">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center"> Data From API</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <th>login</th>
                                <th>Id</th>
                                <th>node_id</th>
                                <th>avator_url</th>
                                <th>gravatar_id</th>
                                <th>url</th>
                                <th>html_url</th>
                                <th>followers_url</th>
                                <th>following_url</th>
                                <th>gists_url</th>
                                <th>starred_url</th>
                                <th>subscriptions_url</th>
                                <th>organizations_url</th>
                                <th>repos_url</th>
                                <th>events_url</th>
                                <th>received_events_url</th>
                                <th>type</th>
                                <th>site_admin</th>

                            </tr>
                            <?php
                            if ($res->num_rows > 0) {
                                foreach ($res as $row) {
                                    echo "
                            <tr>
                            <td> $row[login] </td>
                            <td> $row[id]</td>
                            <td> $row[node_id]</td>
                            <td> $row[avatar_url]</td>
                            <td> $row[gravatar_id] </td>
                            <td> $row[url]</td>
                            <td> $row[html_url]</td>
                            <td> $row[followers_url]</td>
                            <td> $row[following_url] </td>
                            <td> $row[gists_url]</td>
                            <td> $row[starred_url]</td>
                            <td> $row[subscriptions_url]</td>
                        
                            <td> $row[organizations_url]</td>
                            <td> $row[repos_url]</td>
                            <td> $row[events_url] </td>
                            <td> $row[received_events_url]</td>
                            <td> $row[type]</td>
                            <td> $row[site_admin]</td>
                        
                    ";


                                }
                            }





                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


