<?php
    $pdo = require "connect.php";
    $message = "";
    session_start();
    if(isset($_POST["redirect_to_register"])){ 
        header("location: register.php");
    }
    if(isset($_POST['submit'])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
            if(empty($username) || empty($password)) {
                $message = '<label>All fields are required</label>';
            }
            else {
                $sql = "SELECT * FROM listusers WHERE username = \"$username\" AND password = \"$password\""; 
                $result = $pdo->prepare($sql);
                $result->execute();
                $count = $result->rowCount();
                echo "$count";
                if($count > 0) {
                    $_SESSION["username"] = $_POST["username"];
                    //header("Location: admin_view_users.php");
                    header("Location: profile.php");
                }
                else {
                    $message = '<label>Worng Data</lable>';
                }
            }
    }

$title = "My Assignment";                   
include "./include/header.php";                 
?>

    <div class="contianer mt-2 mb-2">
        <h2 class="display-4 text-center">Login</h2>
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-4 col-lg-3 p-4 ">
                <form action="" method="post">
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
                            <div class="d-grid mt-3 row align-items-center">
                                <p>New Registration is easy
                                    <button type="submit" class="btn btn-link p-0" name="redirect_to_register">Register</button>
                                </p>
                            </div>
                        </fieldset>
                    <?php 
                        if(isset($message)) {
                            echo "<label class=\"text-danger\">" .$message."</label>";
                        }
                    ?>
                    </form>
            </div>
        </div>
    </div>
    <?php
$title = "My Assignment";                   
include "./include/footer.php";                 
?>
