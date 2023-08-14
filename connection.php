<?php 
try {
    $db = mysqli_connect('localhost', 'root', null, 'inventory_db');
    
    if ($db) {
        // echo("Database connection Created: ");
    }
    

    
} catch (Exception $e) {
    // Handle the exception
    echo "Error: " . $e->getMessage();
}

?>