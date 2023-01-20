<?php
    /**
     * filename: update.php
     * description: updating a registered user as admin
     */
    $pdo = require "connect.php";
    if(isset($_POST["update"])){
        $fullname = $_POST["fullname"];
        $id = $_POST["id"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $sql = "UPDATE `users` SET`fullname`= \"$fullname\",`username`=\"$username\",`email`=\"$email\" WHERE id=\"$id\"";
        $result = $pdo->prepare($sql);
        $result->execute();
        if($result == TRUE){
            echo "<div class='alert alert-success' role='alert'>
            Record $username is updated successfully!
          </div>";
        header("Location: admin_view_users.php");
        }
        else {
            echo "<div class='alert alert-danger' role='alert'>
            $conn->error
          </div>";
        }
    }
    if(isset($_GET['email'])){
        $id = $_GET['email'];
        $sql = "SELECT * from `users` WHERE email = :email limit 1";
        $res = $conn->prepare($sql);
        $res -> bindParam(":email", $id);
        $res->execute();
        $user = $res->fetch(PDO::FETCH_ASSOC);
                $fullname = $user["fullname"];
                $id = $user["id"];
                $username = $user["username"];
                $email = $user["email"];
            // }
            ?>
            <!doctype html>
            <html>
                <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
                    <title>
                        <?php echo "$username"?> | update
                    </title>
                </head>
                <body>
                    <div class="container">
                        <h2 class="display-2 text-center">
                            Update User Record
                        </h2>
                <div class="row justify-content-center">
                        <div class="col-sm-10 col-md-4 col-lg-4 p-4 ">
                        <form action="" method="POST">
                            <fieldset>
                                <legend>Important information</legend>
                                <!-- hidden id input element only for the update sql operation -->
                                <input id="id"  class="form-control" type="hidden" name="id" value="<?php echo"$id"; ?>"/>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full name</label>
                                    <input id="name" name="fullname" class="form-control" type="text" aria-describedby="firstname_help" value="<?php echo"$fullname";?>"/>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input id="username"  name="username" class="form-control" type="text" aria-describedby="username_help"value="<?php echo"$username"; ?>"/>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" name="email" class="form-control" type="email" aria-describedby="email_help"value="<?php echo"$email"; ?>"/>
                                </div>
                                <div class="row">
                                    <button type="submit" class="btn btn-success col m-3" name="update">Update</button>
                                    <button type="button" class="btn btn-warning col m-3">Cancel</button>
                                </div>
                            </fieldset>
                        </form>
                        </div>
                        </div>

                    </div>
                </body>
            </html>
        <?php }
    // }
    ?>