<?php
require_once('../../models/seller.php');
$seller = new seller();
$db = new database();
$con=$db->openConnection();
if(!$con)
{
    echo "seller Not Connected";
}
if (isset($_GET['d'])){
    $seller->deleteItem($_GET['d']);
    header("refresh:0;url=index.php");
}
$str="SELECT catagory_name from items ORDER BY catagory_name ASC";
$result = $db->query($str);
function create_cards($selle,$catagoty){
  // $seller = new seller();
    $result = $selle->listItem($catagoty);
    if (!$result) {
    echo '
    <h1>
        No Items In The Store
    </h1>
    ';
    }else{
    echo '<h1>'.$catagoty.'</h1>
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">';
    // $array = mysqli_fetch_array($result);
    // echo $array;
    while($array = mysqli_fetch_array($result)){
    echo '
    <div class="col mb-5">
        <div class="card h-100">
            <!-- Product image-->
            <img class="card-img-top" src="'.$array["image"].'" alt="..." />
            <!-- Product details-->
            <div class="card-body p-4">
                <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder">'.$array["i_name"].'</h5>
                    <!-- Product price-->
                    $'.$array["price"].' </br>
                    ammount: '.$array["ammount"].'</br>
                    catagory: '.$array["catagory_name"].'</br>
                    rate: '.$array["rate"].'
                </div>
            </div>
            <!-- Product actions-->
            <div class="card_button card-footer p-4 pt-0 border-top-0 bg-transparent">
                <a class="delete btn  btn-danger" href="index.php?d='.$array["i_id"].'">delete</a>
                <a class="edit btn btn-secondary" href="update_items.php?image='.@$array["image"].'&name='.@$array["i_name"].'&price='.@$array["price"].'&ammount='.@$array["ammount"].'&offer='.@$array["offer"].'&description='.@$array["i_description"].'&catagory_name='.@$array["catagory_name"].'&rate='.@$array["rate"].'&id='.@$array["i_id"].'">edit</a>
            </div>
        </div>
    </div> ';
    }
    echo '</div>';
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
        <title>admin page</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
  
        <script type="text/javascript" src="../bootstrap-5.3.3-dist/js/bootstrap.min.js"> </script>


        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="../css/adminStyl.css" rel="stylesheet" />
    </head>


      <!-- Navigation-->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!"> الجمعه ستور</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">

            </div>
        </nav>



    <body>
        <div class="done"><?=@$_GET['s']?></div>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Welcome to elgom3a store </h1>
                    <p class="lead fw-normal text-white-50 mb-0">you are the fucking admin</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
              <?php //sy_hello()
                $catTmp = null;
                while ($arr = mysqli_fetch_array($result)) {
                    if($catTmp != $arr["catagory_name"]){
                        create_cards($seller,$arr["catagory_name"]);
                        echo $arr != null ?'<hr>':'';
                    }
                    
                    $catTmp = $arr["catagory_name"];
                }
                ?>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <a class="a" href="add_items.php">
                        <div class="add card">+</div>
                    </a>
                </div>
            <!-- <h1>hello</h1> -->
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/script.js"></script>
    </body>
</html>
