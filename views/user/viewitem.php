<?php
require_once('../../models/seller.php');
require_once('../../models/cart.php');

session_start();
// $_SESSION['name'] = ""; 
print_r($_SESSION);
$seller = new seller();
$db = new database();
$con=$db->openConnection();
if(!$con)
{
  echo "seller Not Connected";
}
if(isset($_GET['item_details']) && !empty($_GET['item_details'])) {
  echo 'khaled';
  $item_details = unserialize(urldecode($_GET['item_details']));
    // Access individual item details
    $item_id = $item_details["i_id"]; 
    $item_name = $item_details["i_name"];
    $price = $item_details["price"];
    $ammount = $item_details["ammount"];
    $category = $item_details["catagory_name"];
    $rate = $item_details["rate"];
    $image = $item_details["image"];
    $description = $item_details["i_description"];
} else
if(isset($_GET['quantity']) && !empty($_GET['quantity'])) {
    $quantity = $_GET['quantity'];
    $item_id = $_GET["i_id"]; 
    $item_name = $_GET["i_name"];
    $price = $_GET["price"];
    $ammount = $_GET["ammount"];
    $category = $_GET["catagory_name"];
    $rate = $_GET["rate"];
    $image = $_GET["image"];
    $description = $_GET["i_description"];
    $cart = new cart();
    if($cart->addToCart($item_id, $_SESSION['id'],$quantity)){
      echo "Item added to cart successfully.";
    }else{
      echo "Failed to add item to cart. or the item is already in the cart.";
    
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/addstyl.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!"> store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="">history</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="account.php">update account</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex ms-auto">
                        <a href="cart.php" class="btn btn-outline-dark">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </a>
                    </form>
            </div>
        </nav>
        <!-- Section-->
        <section class="py-5">
            <div class="container container_i px-4 px-lg-5 mt-5">
              <div class="product_info">
                <div class="image">
                  <img src="<?=$image?>" alt="">
                </div>
                <div class="info">
                  <h4 class="card-title"><?php echo $item_name; ?></h4>
                  <p class="card-text">Price: $<?php echo $price; ?></p>
                  <p class="card-text">In stock: <?php echo $ammount; ?></p>
                  <p class="card-text">Category: <?php echo $category; ?></p>
                  <p class="card-text">Rate: <?php echo $rate; ?></p>
                  <form action="viewitem.php" class="qnt" method="get">
                    <input type="hidden" name="i_id" value="<?=$item_id?>" >
                    <input type="hidden" name="i_name" value="<?=$item_name?>" >
                    <input type="hidden" name="price" value="<?=$price ?>" >
                    <input type="hidden" name="ammount" value="<?=$ammount?>">
                    <input type="hidden" name="catagory_name"  value="<?=$category?>">
                    <input type="hidden" name="rate" value="<?=$rate?>">
                    <input type="hidden" name="image" value="<?=$image?>">
                    <input type="hidden" name="i_description" value="<?=$description?>">
                    <input type="number" id="quantity" class="qnt outline-dark" name="quantity" min="1" max="<?=$ammount?>" value="1" required>
                    <input type="submit" class="btn align-conter btn-outline-dark" value="Add to Cart">
                  </form>
                </div>
                <div class="description">
                  <p class="card-text">Description:<br> <?php echo $description; ?></p>
                </div>
              </div>
              <div class="recommendation">
              </div>
              <?php //sy_hello()
                // $catTmp = null;
                // while ($arr = mysqli_fetch_array($result)) {
                //     if($catTmp != $arr["catagory_name"]){
                //         create_cards($seller,$arr["catagory_name"]);
                //         echo $arr != null ?'<hr>':'';
                //     }
                    
                //     $catTmp = $arr["catagory_name"];
                // }
                ?>
            <!-- <h1>hello</h1> -->
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; team ابو جلابيه واعوانه</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
    </body>
</html>

