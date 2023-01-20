<?php
    /**
     * filename: admin_view_users.php
     * description: view the registered users as a list
     */

     require_once "session.php";
     if(!isset($login_session)) {
            header("location: admin_view_users.php");
     }
     include "config.php";
     $sql = "SELECT * from users";
     $query = $conn->prepare($sql);
     $query->execute();
     $rows=$query->fetchAll();
     $query->setFetchMode(PDO::FETCH_ASSOC);
?>

<!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            <title>
                Admin|Users List
            </title>
        </head>
        <body>
            <div class="container">
                <h2 class="display-2 text-center">Registered Users</h2>
            <table class="table">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Fullname</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if(count($rows)){
                        foreach($rows as $row){
                    ?>
                    <tr class="text-center">
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fullname']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><a class="btn btn-info" href="update.php?email=<?php echo $row['email']; ?>">Edit</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                    <?php }
                    }
                    ?>
                </tbody>
            </table>
            </div>
        </body>
    </html>
</doctype>
