<?php
require_once('../../models/seller.php');

session_start();
$_SESSION['name'] = ""; 

if(isset($_GET['item_details'])) {
    $item_details = unserialize(urldecode($_GET['item_details']));

    // Access individual item details
    $item_name = $item_details["i_name"];
    $price = $item_details["price"];
    $amount = $item_details["ammount"];
    $category = $item_details["catagory_name"];
    $rate = $item_details["rate"];
    $image = $item_details["image"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Item</title>
    <!-- Bootstrap core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles -->
    <link href="../css/viewitem.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <!-- Logo and Store Name -->
        <a class="navbar-brand d-flex align-items-center" href="#!">
            <!-- Logo -->
            <img src="logo1.jpg" alt="Logo" class="logo-img">
            <!-- Store Name -->
            <span class="store-name-arabic">الجمعه ستور</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">Order history</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">All Products</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                        <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container custom-container">
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo $image; ?>" class="img-fluid" alt="Item Image">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $item_name; ?></h5>
                    <p class="card-text">Price: $<?php echo $price; ?></p>
                    <p class="card-text">Amount: <?php echo $amount; ?></p>
                    <p class="card-text">Category: <?php echo $category; ?></p>
                    <p class="card-text">Rate: <?php echo $rate; ?></p>
                    <!-- Buy button -->
                    <a href="#" class="btn btn-primary">Buy</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Recommendations -->
    <div class="row recommendations mt-5">
        <div class="col-md-12">
            <h1 class="grey-pill">More Recommendations</h1>
        </div>

        <div class="col-md-4">
            <div class="card">
                <img src="path/to/recommended_item_image.jpg" class="card-img-top" alt="Recommended Item Image">
                <div class="card-body">
                    <h5 class="card-title">Recommended Item Name</h5>
                    <p class="card-text">Price: $XX.XX</p>
                    <a href="#" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        <!-- Add more recommendation cards here -->
    </div>
</div>
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; team ابو جلابيه واعوانه</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="../js/scripts.js"></script>
</body>

</html>

<?php
} else {
    // Item details not provided
    echo "Item details not provided.";
}
?>
