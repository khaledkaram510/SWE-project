<?php 
require_once('../../models/seller.php');
$seller = new seller();
$db = new database();
$con=$db->openConnection();
if(!$con)
{
  echo "seller Not Connected";
}
// print_r($_GET);
@$id = $_GET['id'];
@$id = $_POST['id'];
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $name = stripslashes($name);
  $name = addslashes($name);
  $description = $_POST['description'];
  $description = stripslashes($description);
  $description = addslashes($description);
  $price = $_POST['price'];
  $price = (float) $price;
  $rate = 0;
  $ammount = $_POST['ammount'];
  $ammount = (int) $ammount;
  $offer = $_POST['offer'];
  $offer = (int)$offer;
  $catagory_name = $_POST['catagory_name'];
  $catagory_name = stripslashes($catagory_name);
  $catagory_name = addslashes($catagory_name);

  if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    @$tmp_name = $_FILES["image"]["tmp_name"];
    $upload_dir = "../images/"; // Directory where images will be stored
    @$file_name = basename($_FILES["image"]["name"]);
    @$target_path = $upload_dir . $file_name;
    // Move the uploaded file to the target directory
    if (move_uploaded_file($tmp_name, $target_path)) {
      $image = $target_path; // Set image path to the target path
    } else {
      echo "Error uploading file.";
    }
  }else{
    $image = $_POST['image1'];
  }
  // Update database query
  $error=$seller->updateItem($id, 'i_name', $name);
  $error=$seller->updateItem($id, 'i_description', $description);
  $error=$seller->updateItem($id, 'price', $price);
  $error=$seller->updateItem($id, 'image', $image); // Update image path
  $error=$seller->updateItem($id, 'ammount', $ammount);
  $error=$seller->updateItem($id, 'offer', $offer);
  $error=$seller->updateItem($id, 'catagory_name', $catagory_name);
  if($error == true){
    header('location:index.php?s=2');
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>update <?=$_GET['name']?></title>
  <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
  
  <script type="text/javascript" src="../bootstrap-5.3.3-dist/js/bootstrap.min.js"> </script>


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
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
                <form action="update_items.php" class="form-card"  method="post" enctype="multipart/form-data">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                          <label class="form-control-label px-3">Product name<span class="text-danger"> *</span></label> 
                          <input type="text" id="name" name="name" placeholder="Enter Product name" value="<?php if(isset($_GET['name'])){echo $_GET['name'];} ?>" required> 
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                          <label class="form-control-label px-3">Price<span class="text-danger"> *</span></label> 
                          <input type="number" id="price" step="0.01" name="price" min="0" placeholder="Enter product Price" value="<?php if(isset($_GET['price'])){echo $_GET['price'];}?>" required> 
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                      <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">offer<span class="text-danger"> *</span></label> <input type="number" id="offer" min="0" max="100" name="offer" placeholder="" value="<?php if(isset($_GET['offer'])){echo $_GET['offer']==null ?0:$_GET['offer'];}?>" required> </div>
                      <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">ammount<span class="text-danger"> *</span></label> <input type="number" min="0" id="ammount" name="ammount" placeholder="" value="<?php if(isset($_GET['ammount'])){echo $_GET['ammount']==null ?0:$_GET['ammount'];}?>" required> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                      <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Image Upload<span class="text-danger"> *</span></label> <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)" value="<?php if(isset($_GET['image'])){echo $_GET['image'];}?>" > </div>
                      <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">catagory<span class="text-danger"> *</span></label> <input type="text" id="catagory_name" name="catagory_name" placeholder="" value="<?php if(isset($_GET['catagory_name'])){echo $_GET['catagory_name'];}?>" required> </div>
                      <input type="hidden" name="id" value="<?php if(isset($_GET['id'])){echo $_GET['id'];}?>">
                      <input type="hidden" name="image1" value="<?php if(isset($_GET['image'])){echo $_GET['image'];}?>">
                    </div>
                    <div class="row justify-content-between text-left">
                      <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Write the product description<span class="text-danger"> *</span></label> <textarea id="description" name="description" cols="50" rows="10" required><?php if(isset($_GET['description'])){echo $_GET['description'];}?></textarea></div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="form-group col-sm-6"> <button type="submit" name="submit" class="button_s btn-block btn-primary">Update Product</button> </div>
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
