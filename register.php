<?php
/**
 * filename: register.php
 * description: register a  new user
 */
    $pdo = require "connect.php";
    if(isset($_POST["redirect_to_login"])){ 
        header("location: login.php");
    }
    if(isset($_POST['submit'])) {
        $fullname = $_POST["fullname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        // query to database after submit button, insert the data
        $sql = "insert into users(fullname, username, email, password) values(?,?,?,?)"; 
        $result = $pdo->prepare($sql);
        $result->execute([$fullname, $username, $email, $password]);
        if($result == TRUE) {
            header('Location: admin_view_users.php');
        }
        else {
            echo "Error: " . $sql ."<br>".$conn->error;
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
    <script type="text/javascript">
   function login_redirect() {
    console.log(window)
   }
   function resetForm()
   {
       var myForm = document.getElementById("register-form");

       for (var i = 0; i < myForm.elements.length; i++)
       {
           if ('submit' != myForm.elements[i].type && 'reset' != myForm.elements[i].type)
           {
               myForm.elements[i].checked = false;
               myForm.elements[i].value = '';
               myForm.elements[i].selectedIndex = 0;
           }
       }
   }
</script>
</head>
<body>
    <div class="contianer mt-2 mb-2">
    <h2 class="display-2 text-center">Join with us for nirvana</h2>
        <div class="row justify-content-center">
        <div class="col-sm-10 col-md-4 col-lg-4 p-4 ">
        <form id="register-form" action="" method="POST">
            <fieldset>
                <legend>Register for new account</legend>
                <div class="mb-3">
                    <label for="fullname" class="form-label">Full name</label>
                    <input id="fullname" class="form-control" type="text" aria-describedby="fullname_help" name="fullname"/>
                    <div class="form-text" id="fullname">Enter your full name.</div>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input id="username" class="form-control" type="text" aria-describedby="username_help" name="username"/>
                    <div id="username_help" class="form-text">You can use username to login next time.</div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" class="form-control" type="email" aria-describedby="email_help" name="email"/>
                    <div id="email_help" class="form-text">A verification will be sent to this email</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" class="form-control" type="password" aria-describedby="password_help" name="password"/>
                    <div id="password_help" class="form-text">Choose a strong password</div>
                </div>
                <!-- <div class="mb-3">
                    <label for="cnf-password" class="form-label">Confirm Password</label>
                    <input id="cnf-password" class="form-control" type="password" aria-describedby="cnf-password_help"/>
                    <div id="cnf_password_help" class="form-text"></div>
                </div> -->
                <div class="d-grid">
                    <input type="submit" class="btn btn-primary btn-block" value="Register" name="submit"/>
                </div>
                <div class="d-grid mt-3 row align-items-center">
                    <p>Already have an account?
                        <button type="submit" class="btn btn-link p-0" onclick="login_redirect()" name="redirect_to_login">Login</button>
                    </p>
                </div>
            </fieldset>
        </form>
        </div>
        </div>
</div>
</body>
</html>