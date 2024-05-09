<?php
    session_start();
    if (!isset($_SESSION['logged'])) {
        header('Location: ../auth/login.php');
    }
    require_once('../../models/seller.php');
    require_once('../../models/cart.php');

    // $_SESSION['name'] = ""; 
    // print_r($_SESSION);

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
                <button class="btn btn-primary btn-sm" onclick="openChangeAmountModal("'.$row2["i_name"].'", '.$row["c_ammount"].')">Change Amount</button>
            </td>
            </tr>';
        }
        // if (!$result) {
        //     return false;
        // }
        // if((mysqli_num_rows($result)) == 0){
        //     return false;
        // }
        // return $result;
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
            <!-- <button class="btn btn-primary" onclick="checkout()">Checkout</button> -->
            <a href="checkout.php" class="btn btn-primary">Checkout</a>
        </div>
    </div>

    <!-- Modal for changing amount -->
    <div class="modal fade" id="changeAmountModal" tabindex="-1" aria-labelledby="changeAmountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changeAmountModalLabel">Change Amount</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="newAmount">New Amount:</label>
                    <input type="number" id="newAmount" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="updateAmount()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
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
        <!-- <script src="../js/cart.js"></script> -->
    </body>
</html>