<?php
require_once('../../models/database.php'); //database connection

$db = new database;

$db->openConnection();

session_start();

if (isset($_POST['submit'])) {
    $email = trim($_POST['email']); // Sanitize email input
    $pass = $_POST['password'];

    $email = mysqli_real_escape_string($db->connection, $email);
    $pass = mysqli_real_escape_string($db->connection, $pass);

    $str = "SELECT * FROM user WHERE email='$email' AND password='$pass'";
    $result = $db->query($str);

    if (mysqli_num_rows($result) != 1) {
        $errorMessage = "Invalid email or password. Please try again."; // User-friendly message
    } else {
        $_SESSION['logged'] = $email;
        $row = mysqli_fetch_array($result);
        $_SESSION['id'] = $row["ID"];
        $_SESSION['first_name'] = $row["first_name"];
        $_SESSION['last_name'] = $row["last_name"];
        $_SESSION['username'] = $row["username"];
        $_SESSION['email'] = $row["email"];
        $_SESSION['password'] = $row["password"];
        $_SESSION['phone'] = $row["phone"];
        $_SESSION['address'] = $row["address"];
        header('location: ../user/index.php'); // Edit to user page
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title> <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../scripts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../css/form.css">
</head>
<body>
<section class="login first grey">
    <div class="container">
        <div class="box-wrapper">
            <div class="box box-border">
                <div class="box-body">
                    <center>
                        <h5 style="font-family: Noto Sans;">Login to </h5>
                        <h4 style="font-family: Noto Sans;">jomعa store</h4>
                    </center><br>
                    <form method="post" action="login.php" enctype="multipart/form-data">
                        <?php
                        if (isset($errorMessage)) {
                            echo "<div class='alert alert-danger' role='alert'>$errorMessage</div>";
                        }
                        ?>
                        <div class="form-group">
                            <label>Enter Your Email:</label>
                            <input type="email" name="email" class="form-control <?php echo isset($errorMessage) && strpos($errorMessage, 'email') !== false ? 'is-invalid' : ''; ?>"> </div>
                        <div class="form-group">
                            <label class="fw">Enter Your Password:</label>
                            <input type="password" name="password" class="form-control <?php echo isset($errorMessage) ? 'is-invalid' : ''; ?>"> </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary btn-block" name="submit">Login</button>
                        </div>
                        <div class="form-group text-center">
                            <span class="text-muted">Don't have an account?</span>
                            <a href="register.php">Register</a> Here..
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
