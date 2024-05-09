<?php
session_start();
if (!isset($_SESSION['logged'])) {
    header('Location: ../auth/login.php');
}
require_once('../../models/database.php'); // Database connection

$db = new database;
$db->openConnection();

if (isset($_POST['submit'])) {
    // Retrieve form data
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $username = $_POST['username'];

    // Fetch existing user account data from the database
    $query = "SELECT * FROM user WHERE id=" . $_SESSION['id'];
    $result = $db->query($query);
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $old_fname = $row['first_name'];
        $old_lname = $row['last_name'];
        $old_email = $row['email'];
        $old_password = $row['password'];
        $old_phone = $row['phone'];
        $old_address = $row['address'];
        $old_username = $row['username'];
        // Check if form values are different from the old values
        if ($fname != $old_fname ||$lname != $old_lname || $email != $old_email || $password != $old_password || $phone != $old_phone || $address != $old_address || $username != $old_username) {
            // Update the user's account information in the database
            $query = "UPDATE user SET first_name='$fname',last_name='$lname', email='$email', password='$password', phone='$phone', address='$address', username='$username' WHERE id=" . $_SESSION['id'];
            $db->query($query);

            $_SESSION['id'] = $row["ID"];
            $_SESSION['first_name'] = $fname;
            $_SESSION['last_name'] = $lname;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['phone'] = $phone;
            $_SESSION['address'] = $address;
        }
        // Redirect to the user page after updating account information
        header('Location:index.php');
        exit();
        } else {
            // Handle if user data not found
            // For example, redirect to an error page or display a message
        }
}

// Fetch existing user account data from the database
$query = "SELECT * FROM user WHERE id=" . $_SESSION['id'];
$result = $db->query($query);
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $old_fname = $row['first_name'];
    $old_lname = $row['last_name'];
    $old_email = $row['email'];
    $old_password = $row['password'];
    $old_phone = $row['phone'];
    $old_address = $row['address'];
    $old_username = $row['username'];
} else {
    // Handle if user data not found
    // For example, redirect to an error page or display a message
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Account</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css"> 
  <script type="text/javascript" src="../bootstrap-5.3.3-dist/js/bootstrap.min.js"> </script>
  
  <link rel="stylesheet" href="../bootstrap-icons/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="../css/additems.css">
  <link href="../css/adminStyle.css" rel="stylesheet" />
</head>
<body>
  
<div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <div class="card">
                <form action="account.php" class="form-card" method="post" enctype="multipart/form-data">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                          <label class="form-control-label px-3">First Name<span class="text-danger"> *</span></label> 
                          <input type="text" id="name" name="first_name" placeholder="Enter Full Name" value="<?php echo $old_fname; ?>" required> 
                          <label class="form-control-label px-3">Last Name<span class="text-danger"> *</span></label> 
                          <input type="text" id="name" name="last_name" placeholder="Enter Full Name" value="<?php echo $old_lname; ?>" required> 
                          <label class="form-control-label px-3">Username<span class="text-danger"> *</span></label> 
                          <input type="text" id="username" name="username" placeholder="Enter Username" value="<?php echo $old_username; ?>" required> 
                          <label class="form-control-label px-3">Email<span class="text-danger"> *</span></label> <input type="email" id="email" name="email" placeholder="Enter Email" value="<?php echo $old_email; ?>" required> 
                          <label class="form-control-label px-3">Password<span class="text-danger"> *</span></label> <input type="password" id="password" name="password" placeholder="Enter Password" value="<?php echo $old_password; ?>" required> 
                          <label class="form-control-label px-3">Phone<span class="text-danger"> *</span></label> 
                          <input type="tel" id="phone" name="phone" placeholder="Enter Phone Number" value="<?php echo $old_phone; ?>" required> 
                          <label class="form-control-label px-3">Address<span class="text-danger"> *</span></label> 
                          <input type="text" id="address" name="address" placeholder="Enter Address" value="<?php echo $old_address; ?>" required> 
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group col-sm-6"> <button type="submit" name="submit" class="button_s btn-block btn-primary">Update Account</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../js/addItem.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>
