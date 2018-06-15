<?php
session_start();
include_once "database/ProductDB.php";
include_once "Product.php";
include_once "database/AddressDB.php";
//f(!isset($_SESSION["uEmail"]) && !isset($_SESSION["uIsAdmintype"]) && !isset($_SESSION["uId"])){
//   header("Location: index.php");
//}
?>

<!DOCTYPE html>
<html lang="en">
<!-- Refereren en plagiëre : Dit project maakt gebruik van Bootstrap 4, en componenten gevonden op https://hackerthemes.com/bootstrap-cheatsheet/ -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- MaxCDN libraries for Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
        <!-- Navigatie bar met links naar de andere pagina's (is sticky, niet fixed on purpose) -->
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">GoodIdea: Goodie store</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-muted" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-muted" href="products.php">All Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-muted" href="contact.php">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-muted" href="signUp.php">Sign up</a>
                    </li>
                </ul>
                <form>
                    <a class="btn btn-success" href="logIn.php">Log in</a>
                    <a class="btn btn-info" href="shopCart.php">My cart</a>
                </form>
            </div>
        </nav>
    
    <br>
    <br>

    <div class="container">
        <div class="jumbotron">
            <div class="container">
                <h2>My cart's content</h2>
                <br>
                <div class="container-fluid">
                    <?php
                    for($i = 1; $i < count($_SESSION["cart"]); $i++){
                        $actProd = ProductDB::getById($i)
                        ?><img src="<?php echo $actProd[0]->pic?>"><p><strong><?php echo $actProd[0]->name; ?></strong> QUANTITY: <?php echo $_SESSION["cart"][$i] ?></p><br><?php
                    }
                    ?>
                </div>
                <form>
                    <strong>Choose a facturation address:</strong>
                    <?php
                        $allA = AddressDB::getFromUser($_SESSION["uId"]);
                    foreach($allA as $a){
                        ?><p><?php echo $a->country ?> <?php echo $a->city ?> <?php echo $a->street ?><?php echo $a->street ?><?php echo $a->number ?>
                        </p><input type="radio" value="<?php $a->id ?>"><?php
                    }
                    ?>
                    <br>
                    </form>
                <form>
                    <strong>Choose a delivery address:</strong>
                    <?php
                        $allA = AddressDB::getFromUser($_SESSION["uId"]);
                    foreach($allA as $a){
                        ?><p><?php echo $a->country ?> <?php echo $a->city ?> <?php echo $a->street ?><?php echo $a->street ?><?php echo $a->number ?>
                        </p><input type="radio" value="<?php $a->id ?>"><?php
                    }
                    ?>
                    </form>
                <form>
                    <strong>Choose a delivery method:</strong><br>
                    <input type="radio" value="BPost"> BPost<br>
                    <input type="radio" value="Shipping"> Shipping<br>
                    <input type="radio" value="Pick it up"> Pick it up<br>
                    <input type="radio" value="Express FedEx"> Express FedEx<br>
                </form>
                <br>
                <form>
                    <strong>Choose a payement method:</strong><br>
                    <input type="radio" value="Paypal"> Paypal<br>
                    <input type="radio" value="Credit Card"> Credit Card<br>
                    <input type="radio" value="Bank transfer"> Bank transfer<br>
                </form>
                <br>
                Do you accept the general terms of services: <input type="checkbox" value="TOS"> ?
            </div>
        </div>
    </div>
</body>

</html>
