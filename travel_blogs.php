<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Travel | Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="container-md">
<div class="mt-5">
<h1 class="display-1 text-black">
    Must travel places in 2023
</h1>
</div>
<?php
    $user = "deadman";
    $password = "deadmanzone";
    $database = "3bu1_views";
    $table = "travel_blogs";
    try {
        $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
        echo "<ul class='list-group'>";
        foreach ($db->query("select * from $table") as $travelled_places) {
            echo "<li class='list-group-item'>". $travelled_places["city"] . "</li>"; 
        }
        echo "</ul>";
    }
    catch (PDOException $e) {
        print "Error!: " .$e->getMessage() . "<br/>";
        die();
    }
?>

</div>
</body>
</html>