<?php
// Assuming you already have a database connection established
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all necessary fields are set
    if (isset($_POST['edit_id'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['mobile'])) {
        $edit_id = $_POST['edit_id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];

        // Update user details in the database
        $sql = "UPDATE crud_insert SET firstname = '$firstname', lastname = '$lastname', email = '$email', mobile = '$mobile' WHERE insert_id = $edit_id";

        if (mysqli_query($conn, $sql)) {
            echo "User details updated successfully";
        } else {
            echo "Error updating user details: " . mysqli_error($conn);
        }
    } else {
        echo "Missing required fields";
    }
} else {
    echo "Invalid request method";
}
?>
