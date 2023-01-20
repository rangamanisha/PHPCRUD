<?php
    include "session.php";
    if(!isset($login_session)) {
        header("location: admin_view_users.php");
    }
    else {
        header("location: login.php");
    }
 ?>