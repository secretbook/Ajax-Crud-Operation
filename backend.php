<?php

$servername = 'localhost';
$user = 'root';
$pass = '';
$database = 'ajax_crud_operation';

$conn = mysqli_connect($servername, $user, $pass, $database);

// extract($_POST);

// $data = '';

// if (isset($_POST['readrecords'])) {
//   $readrecords = $_POST['readrecords'];

//   $data = '<table class="table table-bordered table-striped">
//              <tr>
//              <th>No.</th>
//              <th>First Name</th>
//              <th>Last Name</th>
//              <th>Email Address</th>
//              <th>Mobile No.</th>
//              <th>Edit Action</th>
//              <th>Delete Action</th>
//               </tr>';

//   $displayquery = "select * from crud_insert";
//   $result = mysqli_query($conn, $displayquery);

//   if (mysqli_num_rows($result) > 0) {
//     $sno = 0;
//     while ($row = mysqli_fetch_array($result)) {

//       $data .= '<tr>
//                     <td>' . ++$sno . '</td>
//                     <td>' . $row['firstname'] . '</td>
//                     <td>' . $row['lastname'] . '</td>
//                     <td>' . $row['email'] . '</td>
//                     <td>' . $row['mobile'] . '</td>
//                     <td><button onclick="getUserDetails(' . $row['insert_id'] . ')">Edit</button></td>
//                     <td><button onclick="deleteUserDetails(' . $row['insert_id'] . ')">Edit</button></td>
//                     </tr>';
//     }
//   }
// }
// $data .= '</table>';
// echo $data;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if form fields are set
  if (isset($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['mobile'])) {
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $mobile = $_POST['mobile'];
  } else {
      // Handle if form fields are not set
      echo "Form fields are not set.";
      exit; // Stop script execution
  }

  // Code for inserting details
  if ($firstname != '' && $lastname != '' && $email != '' && $mobile != '') {
      $sql = "INSERT INTO `crud_insert` (`firstname`, `lastname`,`email`, `mobile`) VALUES ('$firstname', '$lastname','$email', '$mobile');";
      $result = mysqli_query($conn, $sql);

      if ($result) {
          echo 1; // Echoing 1 if insertion is successful
      } else {
          echo 0; // Echoing 0 if insertion failed
      }
  }
}
