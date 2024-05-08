<?php 
require_once('../../models/seller.php');
$seller = new seller();
$db = new database();
$con=$db->openConnection();
if(!$con)
{
  echo "seller Not Connected";
}
echo 'hello';
// echo $_POST['name'];
echo isset($_GET['name']);
print_r($_GET);
  if(isset($_GET['name'])){
    // echo 'hello from get';
    // $id=uniqid();
    $name = $_GET['name'];
    $name = stripslashes($name);
		$name = addslashes($name);
    $description = $_GET['description'];
    $description = stripslashes($description);
		$description = addslashes($description);
    $price = $_GET['price'];
    $price = (float) $price;
		// $price = addslashes($price);
    $image = $_GET['image'];
    $image = stripslashes($image);
		$image = addslashes($image);
    $rate = 0;
    $ammount = $_GET['ammount'];
    $ammount = (int) $ammount;
		// $ammount = addslashes($ammount);
    $offer = $_GET['offer'];
    $offer = (int)$offer;
		// $offer = addslashes($offer);
    $catagory_name = $_GET['catagory_name'];
    $catagory_name = stripslashes($catagory_name);
		$catagory_name = addslashes($catagory_name);
    $error=$seller->addItem($name ,$description,$price,$image,$rate ,$ammount,$offer,$catagory_name);

    // echo $error;
    if($error == true){
      header('location: index.php');
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
                <!-- <h3>Request a Demo</h3> -->
                <!-- <p class="blue-text">Just answer a few questions<br> so that we can personalize the right experience for you.</p> -->
                <div class="card">
                    <!-- <h5 class="text-center mb-4">Powering world-class companies</h5> -->
                    <form action="add_items.php" class="form-card" method="get" >
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> 
                              <label class="form-control-label px-3">Product name<span class="text-danger"> *</span></label> 
                              <input type="text" id="fname" name="name" placeholder="Enter Product name" onblur="validate(1)"> 
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                              <label class="form-control-label px-3">Price<span class="text-danger"> *</span></label> 
                              <input type="number" id="lname" step="0.01" name="price" placeholder="Enter product Price" onblur="validate(2)"> 
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">offer<span class="text-danger"> *</span></label> <input type="number" id="email" name="offer" placeholder="" onblur="validate(3)"> </div>
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">ammount<span class="text-danger"> *</span></label> <input type="number" id="mob" name="ammount" placeholder="" onblur="validate(4)"> </div>
                          
                        </div>
                        <div class="row justify-content-between text-left">
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Image src <span class="text-danger"> *</span></label> <input type="text" id="job" name="image" placeholder="" onblur="validate(5)"> </div>
                          <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">catagory<span class="text-danger"> *</span></label> <input type="text" id="mob" name="catagory_name" placeholder="" onblur="validate(7)"> </div>
                        </div>
                        <div class="row justify-content-between text-left">
                          <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Write the product description<span class="text-danger"> *</span></label> <textarea id="ans" name="description" cols="50" rows="10" onblur="validate(6)"></textarea></div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary">add product</button> </div>
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
<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="" method="post">
    <input type="text" name="name" placeholder="name" required>
    <input type="text" name="description" placeholder="description" required>
    <input type="text" name="price" placeholder="price" required>
    <input type="text" name="image" placeholder="image" required>
    <input type="text" name="rate" placeholder="rate">
    <input type="text" name="ammount" placeholder="ammount" required>
    <input type="text" name="offer" placeholder="offer" >
    <input type="text" name="catagory_name" placeholder="catagory_name" required>
    <input type="submit" value="submit">
  </form>
</body>
</html> -->
<!-- https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css -->
<!-- https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js -->
<!-- https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js -->
<!-- https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css -->