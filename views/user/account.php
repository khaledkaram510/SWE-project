
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>update </title>
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
                          <input type="text" id="name" name="name" placeholder="Enter Product name" value="" required> 
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex">
                          <label class="form-control-label px-3">Price<span class="text-danger"> *</span></label> 
                          <input type="number" id="price" step="0.01" name="price" min="0" placeholder="Enter product Price" value="" required> 
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                      <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">offer<span class="text-danger"> *</span></label> <input type="number" id="offer" min="0" max="100" name="offer" placeholder="" value="" required> </div>
                      <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">ammount<span class="text-danger"> *</span></label> <input type="number" min="0" id="ammount" name="ammount" placeholder="" value="" required> </div>
                    </div>
                    <div class="row justify-content-between text-left">
                      <div class="form-group col-sm-6 flex-column d-flex"> 
                          <label class="form-control-label px-3">Image</label> 
                          <input type="file" id="image" name="image" accept="image/*" required> 
                      </div>
                      <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">catagory<span class="text-danger"> *</span></label> <input type="text" id="catagory_name" name="catagory_name" placeholder="" value=" " required> </div>
                      <input type="hidden" name="id" value="">
                    </div>
                    <div class="row justify-content-between text-left">
                      <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Write the product description<span class="text-danger"> *</span></label> <textarea id="description" name="description" cols="50" rows="10" required></textarea></div>
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
