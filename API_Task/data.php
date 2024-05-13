<?php
include ("DB_Connection.php");
global $conn;

$qry = "select * from git_data";

$res = $conn->query($qry);
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
    <div class="container">
        <div class="row mt-5">
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
                                <th>Details</th>
                            </tr>
                            <?php
                            if ($res->num_rows > 0) {
                                foreach ($res as $row) {
                                    echo "
                            <tr>
                            <td> $row[login] </td>
                            <td>  $row[id]</td>
                            <td>  $row[node_id]</td>
                            <td>   $row[avatar_url]</td>
                            <td> 
                            <a class='btn btn-primary btn-sm' href='view.php?id=$row[id]'>View</a>
                            <a class='btn btn-danger btn-sm' href='delete.php?id=$row[id]'>Delete</a>
                            
                            </td>
                        
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


?>