<?php 
    $user = "manisha";
    $password = "thribhu1996";
    $database = "firstdb";
    $table = "petnames";

    try {
        $db =new PDO("mysql:host=localhost;dbname=$database", $user, $password);
        echo "<h1> The pets I have </h1><ol>";
        foreach($db->query("select * from $table") as $pets) {
            echo "<li>". $pets["name"] . "</li>";
        }
        echo "</ol>";
    }
    catch(PDOException $e) {
        print "Error!: ". $e->getMessage() . "<br/>";
        die();
    }
?>