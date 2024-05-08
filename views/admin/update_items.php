<?php 
require_once('../../models/seller.php');
$seller = new seller();
$db = new database();
$con=$db->openConnection();
if(!$con)
{
  echo "seller Not Connected";
}

@$id = $_GET['id'];
if(isset($_GET['submit'])){
  $name = $_GET['name'];
  $name = stripslashes($name);
  $name = addslashes($name);
  $description = $_GET['description'];
  $description = stripslashes($description);
  $description = addslashes($description);
  $price = $_GET['price'];
  $price = (float) $price;

  // Image upload logic
  $image = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  $image_path = '../images' . $image;
  move_uploaded_file($image_tmp, $image_path); // Upload the image to specified directory

  $rate = 0;
  $ammount = $_GET['ammount'];
  $ammount = (int) $ammount;
  $offer = $_GET['offer'];
  $offer = (int)$offer;
  $catagory_name = $_GET['catagory_name'];
  $catagory_name = stripslashes($catagory_name);
  $catagory_name = addslashes($catagory_name);

  // Update database query
  $error=$seller->updateItem($id, 'i_name', $name);
  $error=$seller->updateItem($id, 'i_description', $description);
  $error=$seller->updateItem($id, 'price', $price);
  $error=$seller->updateItem($id, 'image', $image_path); // Update image path
  $error=$seller->updateItem($id, 'ammount', $ammount);
  $error=$seller->updateItem($id, 'discount', $offer);
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
                          <input type="text" id="name" name="name" placeholder="Enter Product name" value="<?=$_GET['name']?>" required> 
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                          <label class="form-control-label px-3">Price<span class="text-danger"> *</span></label> 
                          <input type="number" id="price" step="0.01" name="price" min="0" placeholder="Enter product Price" value="<?=$_GET['price']?>" required> 
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                      <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">offer<span class="text-danger"> *</span></label> <input type="number" id="offer" min="0" max="100" name="offer" placeholder="" value="<?=$_GET['offer']==null ?0:$_GET['offer']?>" required> </div>
                      <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">ammount<span class="text-danger"> *</span></label> <input type="number" min="0" id="ammount" name="ammount" placeholder="" value="<?=$_GET['ammount']==null ?0:$_GET['ammount']?>" required> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                      <div class="form-group col-sm-6 flex-column d-flex"> 
                          <label class="form-control-label px-3">Image</label> 
                          <input type="file" id="image" name="image" accept="image/*" required> 
                      </div>
                      <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">catagory<span class="text-danger"> *</span></label> <input type="text" id="catagory_name" name="catagory_name" placeholder="" value="<?=$_GET['catagory_name']?>" required> </div>
                      <input type="hidden" name="id" value="<?=$_GET['id']?>">
                    </div>
                    <div class="row justify-content-between text-left">
                      <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Write the product description<span class="text-danger"> *</span></label> <textarea id="description" name="description" cols="50" rows="10" required><?=$_GET['description']?></textarea></div>
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
