<?php
    // Database connection details
    $host = 'db'; // Use the service name defined in docker-compose.yml
    $user = 'root'; // Update to match your MySQL user
    $password = 'password'; // Update to match your MySQL password
    $database = 'gorgeous_cupcakes';

    // Connect to database with a try/catch statement
    // If the connection is not successful, display the error message via database_error.php
    // The PDOException class represents the error raised by PDO
    // The PDO error is stored in the variable $e
    // The PDO error is returned as a string via the getMessage() function
    try
    {
        $conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        $error_message = $e->getMessage();
        include('../view/database_error.php');
        exit();
    }
?>