<?php
require_once('../../models/seller.php');
require_once('../../models/cart.php');

session_start();
$_SESSION['name'] = ""; 

if(isset($_GET['item_details']) && !empty($_GET['item_details'])) {
    $item_details = unserialize(urldecode($_GET['item_details']));

    // Access individual item details
    $item_id = $item_details["i_id"]; // Assuming 'i_id' is the ID of the item
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#!"> store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">History</a></li>
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
            <!-- Cart button -->
            <form class="d-flex ms-auto">
            <a href="cart.php" class="btn btn-outline-dark">
                <i class="bi-cart-fill me-1"></i>
                Cart
                <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
            </a>
            </form>

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
                    <form id="addToCartForm" method="post">
                        <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
                        <input type="hidden" name="action" value="add_to_cart">
                        <button type="button" class="btn btn-primary" id="openModal">Add to Cart</button>
                    </form>
                    <!-- Green bubble for success -->
                    <div id="successBubble" class="alert alert-success mt-3" style="display: none;" role="alert">
                        Item added to cart successfully!
                    </div>
                    <!-- Red bubble for failure -->
                    <div id="errorBubble" class="alert alert-danger mt-3" style="display: none;" role="alert">
                        Failed to add item to cart. Please try again.
                    </div>
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

<!-- Add this modal popup inside the body tag -->
<div class="modal fade" id="quantityModal" tabindex="-1" aria-labelledby="quantityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quantityModalLabel">Select Quantity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="quantityForm">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" min="1" value="1" required>
                    <div class="invalid-feedback" id="quantityErrorMessage"></div> <!-- Error message -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addToCart">Add to Cart</button>
            </div>
        </div>
    </div>
</div>


<script>
    document.getElementById('openModal').addEventListener('click', function() {
        $('#quantityModal').modal('show');
    });

    document.getElementById('addToCart').addEventListener('click', function() {
        var quantity = parseInt(document.getElementById('quantity').value);
        var availableQuantity = <?php echo $amount; ?>; // Retrieve the available quantity from PHP
        if (quantity > availableQuantity) {
            $('#quantity').addClass('is-invalid'); // Add 'is-invalid' class to highlight the input box in red
            $('#quantityErrorMessage').text("Quantity selected exceeds available quantity."); // Update error message
            return;
        }

        // AJAX request to submit the form data
        $.ajax({
            type: "POST",
            url: "../../models/cart.php", // Replace with the actual path to your PHP script
            data: $('#addToCartForm').serialize(), // Serialize form data
            success: function(response) {
                if (response == "success") {
                    // Show green bubble for success
                    $('#successBubble').show(); // Assuming you have an element with id 'successBubble' for the green bubble
                    // Hide red bubble if it's currently visible
                    $('#errorBubble').hide();
                } else {
                    // Show red bubble for failure
                    $('#errorBubble').show(); // Assuming you have an element with id 'errorBubble' for the red bubble
                    // Hide green bubble if it's currently visible
                    $('#successBubble').hide();
                }
            }
        });
    });
</script>


</body>
</html>

<?php
} else {
    // Item details not provided
    echo "Item details not provided.";
}
?>
