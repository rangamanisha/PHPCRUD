<?php
    $pdo = require_once "connect.php";
    session_start();
    $user_check = $_SESSION['username'];
    if(!isset($_SESSION['username'])) {
        header("location: login.php");
        $pdo = null;
    }
    $sql = "SELECT * from users where username = \"$user_check\"";
    $result = $pdo->prepare($sql);
    $result->execute();
    $user = $result->fetch(PDO::FETCH_ASSOC);
    $login_session = $user["username"];
?>