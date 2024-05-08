<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Some custom styles */
    .item {
      margin-bottom: 10px;
    }
    /* Ensure footer sticks to the bottom */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
    .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      background-color: #343a40; /* Choose your footer background color */
      color: white; /* Choose your footer text color */
      text-align: center;
      padding: 10px 0;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!"> store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">history</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="account.php">update account </a></li>
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

<div class="container">
  <h2>Shopping Cart</h2>
  <ul id="item-list" class="list-group">
    <!-- Sample item -->
    <li class="list-group-item item">
      <div class="row">
        <div class="col-sm-6">Item Name</div>
        <div class="col-sm-2">Price</div>
        <div class="col-sm-2">Quantity</div>
        <div class="col-sm-2">Actions</div>
      </div>
    </li>
    <!-- Example item -->
    <li class="list-group-item item">
      <div class="row">
        <div class="col-sm-6">Product A</div>
        <div class="col-sm-2">$10</div>
        <div class="col-sm-2">
          <input type="number" class="form-control quantity" value="1">
        </div>
        <div class="col-sm-2">
          <button class="btn btn-sm btn-success add-item">+</button>
          <button class="btn btn-sm btn-warning remove-item">-</button>
          <button class="btn btn-sm btn-danger delete-item">Remove</button>
        </div>
      </div>
    </li>
  </ul>
  <button id="checkout-btn" class="btn btn-primary">Checkout</button>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  // Add item to cart
  $(".add-item").click(function(){
    var quantityField = $(this).closest(".item").find(".quantity");
    var quantity = parseInt(quantityField.val());
    quantityField.val(quantity + 1);
  });

  // Remove item from cart
  $(".remove-item").click(function(){
    var quantityField = $(this).closest(".item").find(".quantity");
    var quantity = parseInt(quantityField.val());
    if (quantity > 0) {
      quantityField.val(quantity - 1);
    }
  });

  // Delete item from cart
  $(".delete-item").click(function(){
    $(this).closest(".item").remove();
  });

  // Checkout button action
  $("#checkout-btn").click(function(){
    alert("Checkout functionality to be implemented.");
  });
</script>

<!-- Footer -->
<footer class="footer">
  <div class="container">
    <p class="m-0">Your footer content here</p>
  </div>
</footer>

</body>
</html>
