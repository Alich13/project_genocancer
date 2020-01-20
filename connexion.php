


<?php
try {
    $con = new PDO('mysql:host=localhost;port=3301;dbname=aymen', 'root', '');
    // set the PDO error mode to exception
    echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>