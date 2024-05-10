<?php

$servername = 'localhost';
$user = 'root';
$pass = '';
$database = 'ajax_crud_operation';

$conn = mysqli_connect($servername, $user, $pass, $database);

extract($_POST);

$data = '';

if (isset($_POST['readrecords'])) {
  $readrecords = $_POST['readrecords'];

  $data = '<table class="table table-bordered table-striped">
             <tr>
             <th>No.</th>
             <th>First Name</th>
             <th>Last Name</th>
             <th>Email Address</th>
             <th>Mobile No.</th>
             <th>Edit Action</th>
             <th>Delete Action</th>
              </tr>';

  $displayquery = "select * from crud_insert";
  $result = mysqli_query($conn, $displayquery);

  if (mysqli_num_rows($result) > 0) {
    $sno = 0;
    while ($row = mysqli_fetch_array($result)) {

      $data .= '<tr>
                    <td>' . ++$sno . '</td>
                    <td>' . $row['firstname'] . '</td>
                    <td>' . $row['lastname'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['mobile'] . '</td>
                    <td class="text-center"><button class="btn btn-danger text-center" onclick="getUserDetails(' . $row['insert_id'] . ')">Edit</button></td>
                    <td class="text-center"><button class="btn btn-primary" onclick="deleteUserDetails(' . $row['insert_id'] . ')">Delete</button></td>
                    </tr>';
    }
  }
}
$data .= '</table>';
echo $data;
