<?php
/* filename: config.php
 description: configuration of the database
* update the username, database_name, password according to your config
*/
    $servername = "localhost";
    $username = "deadman";
    $password = "deadmanzone";
    $database_name = "3bu1_views";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database_name", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
