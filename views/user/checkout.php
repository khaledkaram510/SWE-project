<?php
  require_once '../../partials/template.php';
  $template = new Template();
  echo $template->render('checkout');
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>checkout</title>
</head>
<body>
  <h1>Checkout Menu</h1>

  <form action="process_checkout.php" method="POST">
    <label for="name">Name:</label>
    <p type="text" id="name" name="name" required><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br>

    <label for="address">Address:</label>
    <textarea id="address" name="address" required></textarea><br>

    <input type="submit" value="Place Order">
  </form>
</body>
</html>