<?php
    $pdo = require "connect.php";
    if(isset($_POST['submit'])) {
        $username = $_POST["fullname"];
        $password = $_POST["password"];
        // query to database after submit button, insert the data
        $sql = "select * from users where username=:username and password=:password limit 1"; 
        $result = $pdo->prepare($sql);
        $result->execute([
            ":username"=>$username,
            ":password"=> $password
        ]);
        if($result == TRUE) {
            header('Location: admin_view_users.php');
        }
        else {
            echo "Error: " . $sql ."<br>".$conn->error;
        }
        $conn->close();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="contianer mt-2 mb-2">
<h2 class="display-4 text-center">Login</h2>

        <div class="row justify-content-center">
        <div class="col-sm-10 col-md-4 col-lg-3 p-4 ">
     <form action="" method="post">


        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>

            <fieldset>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input id="username" class="form-control" type="text"  name="username"/>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" class="form-control" type="password" name="password"/>
                </div>

                <div class="d-grid">
                    <input type="submit" class="btn btn-primary btn-block" value="Login" name="submit"/>
                </div>

     </form>
        </div>
        </div>
        </div>

</body>

</html>