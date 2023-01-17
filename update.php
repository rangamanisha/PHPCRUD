<?php
    /**
     * filename: update.php
     * description: updating a registered user as admin
     */
    include "config.php";
    if(isset($_POST["update"])){
        $fullname = $_POST["fullname"];
        $id = $_POST["id"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $sql = "UPDATE `users` SET`fullname`=`$fullname`,`username`=`$username`,`email`=`$email` WHERE `id`=`$id`";
        $result = $conn->prepare($sql);
        $result->execute();
        if($result == TRUE){
            echo "<div class='alert alert-success' role='alert'>
            Record $username is updated successfully!
          </div>";
        }
        else {
            echo "<div class='alert alert-danger' role='alert'>
            $conn->error
          </div>";
        }
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * from `users` WHERE `id` = `$id`";
        $res = $conn->prepare($sql);
        $res->execute();
        $user_fetched = $res->fetchAll();
        $res->setFetchMode(PDO::FETCH_ASSOC);
        if(count($user_fetched) > 0) {
            foreach ($user_fetched as $user) {
                $fullname = $user["fullname"];
                $id = $user["id"];
                $username = $user["username"];
                $email = $user["email"];
            }
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
                                <input id="email"  class="form-control" type="hidden" aria-describedby="email_help"value="<?php echo"$id"; ?>"/>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Full name</label>
                                    <input id="name" class="form-control" type="text" aria-describedby="firstname_help" value="<?php echo"$fullname";?>"/>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input id="username" class="form-control" type="text" aria-describedby="username_help"value="<?php echo"$username"; ?>"/>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" class="form-control" type="email" aria-describedby="email_help"value="<?php "$email"; ?>"/>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-info">Cancel</button>
                                </div>
                            </fieldset>
                        </form>
                        </div>
                        </div>

                    </div>
                </body>
            </html>
        <?php }
        else {
            header('Location: admin_view_users.php');
        }
    }
    ?>