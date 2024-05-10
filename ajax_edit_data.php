<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'ajax_crud_operation';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if edit_id is set and not empty
if (isset($_POST['edit_id']) && !empty($_POST['edit_id'])) {
    $edit_id = $_POST['edit_id'];

    // Prepare SQL statement to select user details based on edit_id
    $sql = "SELECT * FROM crud_insert WHERE insert_id = $edit_id";
    $result = mysqli_query($conn, $sql);

    // Check if query was successful
    if ($result) {
        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
            // Fetch user details as an associative array
            $user = mysqli_fetch_assoc($result);
            // Convert user details to JSON format and echo the response
            echo json_encode($user);
        } else {
            // If no rows were returned, echo an error message
            echo "No user found with the provided edit_id.";
        }
    } else {
        // If query was unsuccessful, echo the MySQL error
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // If edit_id is not set or empty, echo an error message
    echo "edit_id is not set or empty.";
}

// Close connection
mysqli_close($conn);

?>
