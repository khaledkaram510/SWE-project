<?php
    session_start();
    if (!isset($_SESSION['logged'])) {
        header('Location: ../auth/login.php');
    }
    require_once('../../models/seller.php');
    require_once('../../models/cart.php');
    // session_start();

    $seller = new seller();
    $cart = new cart();
    $db = new database();
    $con=$db->openConnection();
    if(!$con)
    {
        echo "seller Not Connected";
    }
    if (isset($_GET['d'])){
        $cart->removeFromCart($_GET['i_d'],$_GET['d']);
        header("refresh:0;url=cart.php");
    }
    function listcart($db){
        $str="SELECT * from user_oreder_items where user_id=".$_SESSION['id']."";
        $result = $db->query($str);
        // $result = $db->query($str);
        
        while ($row = mysqli_fetch_array($result)) {
            $str="SELECT `i_name`,`price` from items where i_id=".$row['item_id']."";
            $result2 = $db->query($str);
            $row2 = mysqli_fetch_array($result2);
            echo'
            <tr>
            <td>'.$row2["i_name"].'</td>
            <td>'.$row["c_ammount"].'</td>
            <td>'.$row2["price"].'</td>
            <td>
                <a class="delete btn  btn-danger" href="cart.php?d='.$_SESSION['id'].'&i_d='.$row['item_id'].'">delete</a>
                <button class="btn btn-primary btn-sm" onclick="openChangeAmountModal(\''.$row2["i_name"].'\', '.$row["c_ammount"].')">Change Amount</button>
            </td>
            </tr>';
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
        <title> Home</title>
        <link rel="stylesheet" href="../css/addstyl.css">
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../bootstrap-icons/font/bootstrap-icons.min.css">
        <script type="text/javascript" src="../bootstrap-5.3.3-dist/js/bootstrap.min.js"> </script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/addstyl.css" rel="stylesheet" />
    </head>
    <body>
        <div class="popup"></div>
        <div class="frame"></div>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!"> store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="">history </a></li>
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
                        <a href="" class="btn btn_edd btn-outline-dark">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                        </a>
                    </form>
            </div>
        </nav>


        <div class="container">
            <h2>Your Cart</h2>
            <table class="table table-striped cart-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Price</th>
                        <th class="action-column">Action</th>
                    </tr>
                </thead>
                <tbody id="cart-body">
                    <?php listcart($db); ?>
                    <!-- Cart items will be appended here dynamically -->
                </tbody>
            </table>
            <div class="cart-buttons">
                <!-- Checkout button with modal -->
                <button class="btn btn-primary" onclick="openCheckoutModal()">Checkout</button>
            </div>
        </div>

        <!-- Checkout modal -->
        <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="checkoutModalLabel">Checkout</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="address">Address:</label>
                        <input type="text" id="address" class="form-control mb-3">
                        <label for="paymentMethod">Payment Method:</label>
                        <select id="paymentMethod" class="form-control mb-3" onchange="showVisaInput()">
                            <option value="onArrival">On Arrival</option>
                            <option value="visa">Visa</option>
                        </select>
                        <div id="visaInput" style="display: none;">
                            <label for="visaNumber">Visa Number:</label>
                            <input type="text" id="visaNumber" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" onclick="openCheckoutModal()">Checkout</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- JavaScript to handle modal and payment method -->
        <script>
            function openCheckoutModal() {
                $('#checkoutModal').modal('show');
            }

            function showVisaInput() {
                var paymentMethod = document.getElementById("paymentMethod").value;
                if (paymentMethod === "visa") {
                    document.getElementById("visaInput").style.display = "block";
                } else {
                    document.getElementById("visaInput").style.display = "none";
                }
            }

            function proceedToCheckout() {
                var address = document.getElementById("address").value;
                var paymentMethod = document.getElementById("paymentMethod").value;
                var visaNumber = "";
                if (paymentMethod === "visa") {
                    visaNumber = document.getElementById("visaNumber").value;
                }
                
                // Here you can perform further actions, like sending data to the server
                // Example: You can use AJAX to send the address, payment method, and visa number to the server for processing.
                // After processing, you can show a success message or redirect the user to a success page.
                // For now, I'm just logging the data to the console.
                console.log("Address: " + address);
                console.log("Payment Method: " + paymentMethod);
                console.log("Visa Number: " + visaNumber);

                // Close the modal
                $('#checkoutModal').modal('hide');
            }
        </script>

    <script src="../js/jquery.min.js"></script>

    </body>
</html>
