<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $conn = mysqli_connect('localhost', 'root', '', 'test1') or die("Connection Failed:" .mysqli_connect_error());
        if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['gender'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $gender = $_POST['gender'];

            $sql = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`, `gender`) VALUES ('$firstname', '$lastname', '$email', '$password', '$gender')";
            $query = mysqli_query($conn,$sql);
            if($query){
                echo 'Entry Successful';

            }
            else {
                echo 'Error Occurred';
            }


        }
    }

?>