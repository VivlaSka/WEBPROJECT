<?php
    include_once "database/UserDB.php";
    include_once "validate.php";
    include_once "database/AddressDB.php";
    include_once "database/AddressUserIdDB.php";
    include_once "Address.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $validate = checkUserInfo();
        $aVal = checkAddress();
        if($validate){
            $u = new User($_POST["first"],$_POST["last"],$_POST["pass"],$_POST["email"], 0);
            UserDB::insert($u);
            $html = "<div class='alert alert-success' role='alert'><strong>Your account has been created !</strong></div>";
            if($aVal){
                $allU= UserDB::getAll();
                $lastU = $allU[count($all) - 1];
                $address = new Address(0,$_POST["country"],$_POST["city"], $_POST["street"],$_POST["number"], 1);
                AddressDB::insert($address);
                $allA = AddressDB::getAll();
                $lastA = $allA[count($allA) - 1];

                AddressUserIdDB::insert($lastA,$lastU);
            }
        }
        else{
            $html = "<div class='alert alert-danger' role='alert'>Something went wrong ... :(<strong> Try again.</strong></div>";
        }
    }
     
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
    <script src="js/validateNewUser.js"></script>
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
                    <li class="nav-item ">
                        <a class="nav-link text-muted" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-muted" href="products.php">All Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-muted" href="contact.php">Contact us</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="signUp.php">Sign up</a>
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
            <h1>Create an account</h1>
            <br>            
            <div class="container">
                <?php
                    echo $html;
                    echo $userInfo;
                ?>
            </div>
            <div class="container">
                <div class="alert alert-info" role="alert">
                    <strong>All the fields marked with a * must be filled in!</strong>
                </div>
            </div>
            <div class="container">
                <form action="signUp.php" method="post">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="firstName">First name <b>*</b>:</label>
                            <input name="first" type="text" class="form-control" id="firstName" placeholder="Your first name" required>
                        </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="lastName">Last name <b>*</b>:</label>
                            <input name="last" type="text" class="form-control" id="lastName" placeholder="Your last name" required>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="pass">Enter your password <b>*</b>:</label>
                                <input name="pass" type="password" class="form-control" id="pass" placeholder="Your password" required>
                            </div>
                        </div>
                        <div class="col">  
                            <div class="form-group">
                                <label for="confPass">Confirm your password <b>*</b>:</label>
                                <input name="confPass" type="password" class="form-control" id="confPass" placeholder="..." required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail address <b>*</b>:</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Your email address name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="country">Country:</label>
                        <input name="country" type="text" class="form-control" id="country" placeholder="Country">
                    </div>
                     <div class="form-group">
                        <label for="city">City:</label>
                        <input name="city" type="text" class="form-control" id="city" placeholder="City">
                    </div>
                    <div class="form-group">
                        <label for="street">Street:</label>
                        <input name="street" type="text" class="form-control" id="street" placeholder="Street">
                    </div>
                    <div class="form-group">
                        <label for="number">Housenumber:</label>
                        <input name="number" type="text" class="form-control" id="number" placeholder="Housenumber">
                    </div>
                    <input type="submit" class="btn btn-info" value="Send!">
                </form>
            </div>
            <br>
            
        </div>
    </div>


</body>

</html>