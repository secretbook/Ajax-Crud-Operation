<?php

$servername = 'localhost';
$user = 'root';
$pass = '';
$database = 'ajax_crud_operation';

$conn = mysqli_connect($servername, $user, $pass, $database);

// Check if request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if 'delete_id' is set
    if (isset($_POST['delete_id'])) {
        // Sanitize the input to prevent SQL injection
        $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);
        
        // Delete data from database
        $sql = "DELETE FROM `crud_insert` WHERE `insert_id` = '$delete_id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // If deletion is successful
            echo "Record deleted successfully.";
        } else {
            // If deletion fails
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        // If 'delete_id' is not set
        echo "Delete ID is not set.";
    }
} else {
    // If request method is not POST
    echo "Invalid request method.";
}
