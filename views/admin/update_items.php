<?php 
require_once('../../models/seller.php');
$seller = new seller();
$db = new database();
$con=$db->openConnection();
if(!$con)
{
  echo "seller Not Connected";
}
print_r($_GET);
$id = $_GET['id'];
// echo isset($_GET['id'])
if(isset($_GET['submit'])){
  $name = $_GET['name'];
  $name = stripslashes($name);
  $name = addslashes($name);
  $description = $_GET['description'];
  $description = stripslashes($description);
  $description = addslashes($description);
  $price = $_GET['price'];
  $price = (float) $price;
  $image = $_GET['image'];
  $image = stripslashes($image);
  $image = addslashes($image);
  $rate = 0;
  $ammount = $_GET['ammount'];
  $ammount = (int) $ammount;
  $offer = $_GET['offer'];
  $offer = (int)$offer;
  $catagory_name = $_GET['catagory_name'];
  $catagory_name = stripslashes($catagory_name);
  $catagory_name = addslashes($catagory_name);
  $error=$seller->updateItem($id,$description,$price,$image,$rate,$ammount,$offer,$catagory_name);
  // echo $error;
  if($error == true){
    header('location:index.php?done=2');
  }
  // echo mysqli_num_rows($result);
  // echo 'hello after';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="../css/additems.css">
</head>
  <body>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <!-- <p class="blue-text">Just answer a few questions<br> so that we can personalize the right experience for you.</p> -->
                <div class="card">
                    <!-- <h5 class="text-center mb-4">Powering world-class companies</h5> -->
                    <form action="update_items.php" class="form-card"  method="get" >
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> 
                              <label class="form-control-label px-3">Product name<span class="text-danger"> *</span></label> 
                              <input type="text" id="name" name="name" placeholder="Enter Product name" onblur="validate(1)" value="<?=$_GET['name']?>" required> 
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                              <label class="form-control-label px-3">Price<span class="text-danger"> *</span></label> 
                              <input type="number" id="price" step="0.01" name="price" min="0" placeholder="Enter product Price" onblur="validate(2)" value="<?=$_GET['price']?>" required> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">offer<span class="text-danger"> *</span></label> <input type="number" id="offer" min="0" max="100" name="offer" placeholder="" onblur="validate(3)" value="<?=$_GET['offer']==null ?0:$_GET['offer']?>" required> </div>
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">ammount<span class="text-danger"> *</span></label> <input type="number" min="0" id="ammount" name="ammount" placeholder="" onblur="validate(4)" value="<?=$_GET['ammount']==null ?0:$_GET['ammount']?>" required> </div>
                          
                        </div>
                        <div class="row justify-content-between text-left">
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Image src <span class="text-danger"> *</span></label> <input type="text" id="image" name="image" placeholder="" onblur="validate(5)" value="<?=$_GET['image']?>" required> </div>
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">catagory<span class="text-danger"> *</span></label> <input type="text" id="catagory_name" name="catagory_name" placeholder="" onblur="validate(6)" value="<?=$_GET['catagory_name']?>" required> </div>
                        </div>
                        <div class="row justify-content-between text-left">
                          <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Write the product description<span class="text-danger"> *</span></label> <textarea id="description" name="description" cols="50" rows="10" onblur="validate(7)" required><?=$_GET['description']?></textarea></div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="form-group col-sm-6"> <button type="submit" name="submit" class="btn-block btn-primary">add product</button> </div>
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