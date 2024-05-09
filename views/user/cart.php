khale sssss
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> Home</title>
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
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
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
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="cart-body">
                <!-- Cart items will be appended here dynamically -->
            </tbody>
        </table>
        <div class="cart-buttons">
            <button class="btn btn-primary" onclick="checkout()">Checkout</button>
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

    <!-- JavaScript to handle cart functionality -->
    <script>
        // Sample data for the cart
        const cartItems = [
            { name: "Item 1", amount: 1, price: 10 },
            { name: "Item 2", amount: 2, price: 20 },
            { name: "Item 3", amount: 3, price: 30 }
        ];

        // Function to display cart items
        function displayCart() {
            const cartBody = document.getElementById("cart-body");
            cartBody.innerHTML = "";
            cartItems.forEach(item => {
                const row = document.createElement("tr");
                row.innerHTML = `
                    <td>${item.name}</td>
                    <td>${item.amount}</td>
                    <td>${item.price}</td>
                    <td>
                        <button class="btn btn-danger btn-sm" onclick="removeItem('${item.name}')">Remove</button>
                        <button class="btn btn-primary btn-sm" onclick="openChangeAmountModal('${item.name}', ${item.amount})">Change Amount</button>
                    </td>
                `;
                cartBody.appendChild(row);
            });
        }

        // Function to remove item from cart
        function removeItem(name) {
            const index = cartItems.findIndex(item => item.name === name);
            if (index !== -1) {
                cartItems.splice(index, 1);
                displayCart();
            }
        }

        // Function to open modal for changing amount
        function openChangeAmountModal(name, currentAmount) {
            const modal = new bootstrap.Modal(document.getElementById('changeAmountModal'), {
                keyboard: false
            });
            document.getElementById('newAmount').value = currentAmount;
            modal.show();
        }

        // Function to update amount of item in cart
        function updateAmount() {
            const name = ''; // Get the name of the item from somewhere
            const newAmount = parseInt(document.getElementById('newAmount').value);
            if (!isNaN(newAmount) && newAmount >= 0) {
                const index = cartItems.findIndex(item => item.name === name);
                if (index !== -1) {
                    cartItems[index].amount = newAmount;
                    displayCart();
                    const modal = bootstrap.Modal.getInstance(document.getElementById('changeAmountModal'));
                    modal.hide();
                }
            } else {
                alert("Invalid amount!");
            }
        }

        // Function to handle checkout
        function checkout() {
            // Add your checkout logic here
            alert("Checkout button clicked!");
        }

        // Initial display of cart
        displayCart();
    </script>

    <!-- Bootstrap JavaScript bundle -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        
    
    
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
    </body>
</html>