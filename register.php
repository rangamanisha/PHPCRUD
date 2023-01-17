<?php
/**
 * filename: register.php
 * description: register a  new user
 */
    include "config.php";
    if(isset($_POST['submit'])) {
        $fullname = $_POST["fullname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "INSERT INTO `users`(`fullname`, `username`, `email`, `password`)VALUES(:fullname, :username,:email, :password)"; 
        echo "$sql";
        $result = $conn->prepare($sql);
        $result->execute([
            ":fullname" => $fullname,
            ":username" => $username,
            ":email"=>$email,
            ":password"=>$password
        ]);
        if($result == TRUE) {
            echo "New record created successfully.";
        }
        else {
            echo "Error: " . $sql ."<br>".$conn->errorInfo();
        }
        $conn->close();
    }
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="contianer mt-2 mb-2">
    <h2 class="display-2 text-center">Join with us for nirvana</h2>
        <div class="row justify-content-center">
        <div class="col-sm-10 col-md-4 col-lg-4 p-4 ">
        <form action="" method="POST">
            <fieldset>
                <legend>Register for new account</legend>
                <div class="mb-3">
                    <label for="name" class="form-label">Full name</label>
                    <input id="name" class="form-control" type="text" aria-describedby="firstname_help"/>
                    <div class="form-text">Enter your full name.</div>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input id="username" class="form-control" type="text" aria-describedby="username_help"/>
                    <div id="username_help" class="form-text">You can use username to login next time.</div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" class="form-control" type="email" aria-describedby="email_help"/>
                    <div id="email_help" class="form-text">A verification will be sent to this email</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" class="form-control" type="password" aria-describedby="password_help"/>
                    <div id="password_help" class="form-text">Choose a strong password</div>
                </div>
                <div class="mb-3">
                    <label for="cnf-password" class="form-label">Confirm Password</label>
                    <input id="cnf-password" class="form-control" type="password" aria-describedby="cnf-password_help"/>
                    <div id="cnf_password_help" class="form-text"></div>
                </div>
                <div class="d-grid">
                    <input type="submit" class="btn btn-primary btn-block" value="submit"/>
                </div>
                <div class="d-grid mt-3 row align-items-center">
                    <p>Already have an account?
                        <button class="btn btn-link p-0">Login</button>
                    </p>
                </div>
            </fieldset>
        </form>
        </div>
        </div>
</div>
</body>
</html>