<?php 
require_once('../../models/seller.php');
$seller = new seller();
$db = new database();
$con = $db->openConnection();
if (!$con) {
  echo "seller Not Connected";
}
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $name = stripslashes($name);
  $name = addslashes($name);
  $description = $_POST['description'];
  $description = stripslashes($description);
  $description = addslashes($description);
  $price = $_POST['price'];
  $price = (float) $price;
  $image = ''; // Initialize image variable
  $rate = 0;
  $ammount = $_POST['ammount'];
  $ammount = (int) $ammount;
  $offer = $_POST['offer'];
  $offer = (int)$offer;
  $catagory_name = $_POST['catagory_name'];
  $catagory_name = stripslashes($catagory_name);
  $catagory_name = addslashes($catagory_name);

  // Check if file is uploaded
  if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $tmp_name = $_FILES["image"]["tmp_name"];
    $upload_dir = "../images/"; // Directory where images will be stored
    $file_name = basename($_FILES["image"]["name"]);
    $target_path = $upload_dir . $file_name;
    // Move the uploaded file to the target directory
    if (move_uploaded_file($tmp_name, $target_path)) {
      $image = $target_path; // Set image path to the target path
    } else {
      echo "Error uploading file.";
    }
  }

  $error = $seller->addItem($name, $description, $price, $image, $rate, $ammount, $offer, $catagory_name);

  if ($error == true) {
    header('location:index.php?s=1');
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>add new item</title>
  <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap-icons/font/bootstrap-icons.min.css">
  <script type="text/javascript" src="../bootstrap-5.3.3-dist/js/bootstrap.min.js"> </script>

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/all.min.css">
  <link rel="stylesheet" href="../css/additems.css">
  <link href="../css/adminStyle.css" rel="stylesheet" />
</head>
  <body>
           
  <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!"> الجمعه ستور</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">

            </div>
        </nav>

    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <!-- <p class="blue-text">Just answer a few questions<br> so that we can personalize the right experience for you.</p> -->
                <div class="card">
                    <!-- <h5 class="text-center mb-4">Powering world-class companies</h5> -->
                    <form action="add_items.php" class="form-card" method="post" enctype="multipart/form-data">
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> 
                              <label class="form-control-label px-3">Product name<span class="text-danger"> *</span></label> 
                              <input type="text" id="name" name="name" placeholder="Enter Product name" onblur="validate(1)" required> 
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                              <label class="form-control-label px-3">Price<span class="text-danger"> *</span></label> 
                              <input type="number" id="price" step="0.01" name="price" min="0" placeholder="Enter product Price" onblur="validate(2)" required> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">offer<span class="text-danger"> *</span></label> <input type="number" id="offer" min="0" max="100" name="offer" placeholder="" onblur="validate(3)" required> </div>
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">ammount<span class="text-danger"> *</span></label> <input type="number" min="0" id="ammount" name="ammount" placeholder="" onblur="validate(4)" required> </div>
                          
                        </div>
                        <div class="row justify-content-between text-left">
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Image Upload<span class="text-danger"> *</span></label> <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)" required> </div>
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">catagory<span class="text-danger"> *</span></label> <input type="text" id="catagory_name" name="catagory_name" placeholder="" onblur="validate(6)" required> </div>
                        </div>
                        <div class="row justify-content-between text-left">
                          <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Write the product description<span class="text-danger"> *</span></label> <textarea id="description" name="description" cols="50" rows="10" onblur="validate(7)" required></textarea></div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="form-group col-sm-6"> <button type="submit" name="submit" class="button_s btn-block btn-primary">Add Product</button> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
  <div class="container">
    <p class="m-0">Your footer content here</p>
  </div>
</footer>
    <script src="../js/addItem.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
      function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
          var output = document.getElementById('imagePreview');
          output.src = reader.result;
          output.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
      }
    </script>
  </body>
</html>
