<html>
<head>
    <title>Register</title>
</head>

<body>
<form name="form1" method="post" action="">
    <table width="75%" border="0">
        <tr> 
            <td width="10%">Full Name</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr> 
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>			
        <tr> 
            <td>Username</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr> 
            <td>Password</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr> 
            <td> </td>
            <td><input type="submit" name="submit" value="Submit"></td>
        </tr>
    </table>
</form>


</body>
</html>
    <?php
    $usr = "manisha";
    $pass = "thribhu1996";
    $database = "firstdb";
    $table = "login";
   try{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $user = $_POST['username'];
        $password = $_POST['password'];
    $mydb = new PDO("mysql:host=localhost;dbname=$database", $usr, $pass);
    
    $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO login (name, email, username, password)
    VALUES ('$name', '$email', '$username', '$password')";
  // use exec() because no results are returned
  $mydb->exec($sql);
  echo "New record created successfully";
   }
  catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
 
    } 
    
    
    
    ?>
    



<!-- <!DOCTYPE html>

<html>

<body>

<h2>Registration Form</h2> 

 
 <form action="" method="POST">

  <fieldset>

    <legend>Information:</legend>

    First name:<br>

    <input type="text" name="firstname">

    <br>

    Last name:<br>

    <input type="text" name="lastname">

    <br>

    Email:<br>

    <input type="email" name="email">

    <br>

    Password:<br>

    <input type="password" name="password">

    <br>

    Gender:<br>

    <input type="radio" name="gender" value="Male">Male

    <input type="radio" name="gender" value="Female">Female

    <br><br>

    <input type="submit" name="submit" value="submit">

  </fieldset>

</form>  

</body>

</html>  -->
