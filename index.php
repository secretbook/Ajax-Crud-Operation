<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajax Crud Operation</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container ">
    <h1 class="text-primary text-uppercase text-center">Ajax Crud Operation</h1>

    <div class="d-flex justify-content-end">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Open modal
      </button>
    </div>

    <h2 class="text-danger">All Records</h2>
    <div id="record_content">
    </div>



    <!-- Start Modal for Insert  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Ajax Crud Operation</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="firstname" class="form-label">Firstname<span style="color:red;">*</span></label>
              <input type="text" class="form-control" id="firstname">
            </div>
            <div class="mb-3">
              <label for="lastname" class="form-label">Lastname<span style="color:red;">*</span></label>
              <input type="text" class="form-control" id="lastname">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email<span style="color:red;">*</span></label>
              <input type="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
              <label for="mobile" class="form-label">Mobile<span style="color:red;">*</span></label>
              <input type="text" maxlength="10" class="form-control" id="mobile">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="insertDetails();">Save</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal for Insert -->

    <!-- Start Update data at Edit time -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Ajax Crud Operation</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="firstnameupd" class="form-label">Firstname</label>
              <input type="text" class="form-control" id="firstnameupd">
            </div>
            <div class="mb-3">
              <label for="lastnameupd" class="form-label">Lastname</label>
              <input type="text" class="form-control" id="lastnameupd">
            </div>
            <div class="mb-3">
              <label for="emailupd" class="form-label">Email</label>
              <input type="email" class="form-control" id="emailupd">
            </div>
            <div class="mb-3">
              <label for="mobileupd" class="form-label">Mobile</label>
              <input type="text" maxlength="10" class="form-control" id="mobileupd">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success" onclick="updateDetails();">Update</button>
         <input type="hidden" name="" id="hidden_user_id">
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal for Update -->
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
<script>
  $(document).ready(function() {
    readRecords();
  })

  function readRecords() {
    var readrecords = "readrecords";
    $.ajax({
      url: 'ajax_backend1.php',
      method: 'post',
      data: {
        readrecords: readrecords
      },
      success: function(response) {
        $('#record_content').html(response);
      }
    });
  }
</script>
<script>
  function insertDetails() {
    // Get form data
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var email = $('#email').val();
    var mobile = $('#mobile').val();

    if (firstname === "") {
      Swal.fire({
        title: "Error!",
        text: "Firstname cannot be blank!",
        icon: "error"
      });
      return; // Prevent further execution of the function
    }

    if (lastname === "") {
      Swal.fire({
        title: "Error!",
        text: "Lastname cannot be blank!",
        icon: "error"
      });

      return; // Prevent further execution of the function
    }
    if (email === "") {
      Swal.fire({
        title: "Error!",
        text: "Email cannot be blank!",
        icon: "error"
      });

      return; // Prevent further execution of the function
    }
    if (mobile === "") {
      Swal.fire({
        title: "Error!",
        text: "Mobile cannot be blank!",
        icon: "error"
      });

      return; // Prevent further execution of the function
    }
    // Make Ajax request
    $.ajax({
      url: 'backend.php', // Replace 'insert.php' with the actual server-side script URL
      method: 'POST',
      data: {
        firstname: firstname,
        lastname: lastname,
        email: email,
        mobile: mobile,
      },
      success: function(response) {
        readRecords();
        // if (response == 1) {
        //     Swal.fire({
        //       title: "Saved Success?",
        //       text: "Data saved successfully?",
        //       icon: "success"
        //       // });
        //     }).then(() => {
        //       window.location.href = 'index.php'; // with this redirect to home.php after saved
        //     });
        //   }

        // Handle success response
        $('#exampleModal').modal('hide'); // Hide modal after successful insertion

        // Clear form fields
        $('#firstname').val('');
        $('#lastname').val('');
        $('#email').val('');
        $('#mobile').val('');
      },
      error: function(xhr, status, error) {
        // Handle error response
        console.error(xhr.responseText); // Log error response for debugging
        // Optionally, display an error message to the user
      }
    });
  }


  function deleteUserDetails(delete_id) {
    $.ajax({
      url: 'ajax_delete_data.php',
      method: 'POST',
      data: {
        delete_id: delete_id
      },
      success: function(response) {
        alert(response); // Alert the response message
        readRecords();
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText); // Log error response for 
      }
    });
  }

  function getUserDetails(edit_id) {
    // Set the value of the hidden input field with the edit ID
    $('#hidden_user_id').val(edit_id);
    
    // Make an AJAX request to fetch user details
    $.ajax({
        url: 'ajax_edit_data.php',
        method: 'POST',
        data: {
            edit_id: edit_id
        },
        success: function(response) {
            // Parse the JSON response
            var user = JSON.parse(response);
            // Populate modal fields with user details
            $('#firstnameupd').val(user.firstname);
            $('#lastnameupd').val(user.lastname);
            $('#emailupd').val(user.email);
            $('#mobileupd').val(user.mobile);          
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText); // Log error response
            // Optionally, display an error message to the user
        }
    });
    
    // Show the modal
    $('#updateModal').modal('show');
}


function updateDetails() {
    // Get form data
    var firstname = $('#firstnameupd').val();
    var lastname = $('#lastnameupd').val();
    var email = $('#emailupd').val();
    var mobile = $('#mobileupd').val();
    var edit_id = $('#hidden_user_id').val();

    // Make sure all fields are filled
    if (firstname === "" || lastname === "" || email === "" || mobile === "") {
        Swal.fire({
            title: "Error!",
            text: "All fields are required!",
            icon: "error"
        });
        return;
    }

    // Make AJAX request to update user details
    $.ajax({
        url: 'update_details.php',
        method: 'POST',
        data: {
            edit_id: edit_id,
            firstname: firstname,
            lastname: lastname,
            email: email,
            mobile: mobile
        },
        success: function(response) {
          readRecords();
          $('#updateModal').modal('hide');
        },
       
    });
}


</script>


</html>