<?php
/* filename: config.php
 description: configuration of the database
* update the username, database_name, password according to your config
*/
    $host = "localhost";
    $user = "deadman";
    $password = "deadmanzone";
    $db = "3bu1_views";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
