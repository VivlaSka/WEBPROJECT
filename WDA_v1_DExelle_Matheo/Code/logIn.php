<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_SESSION["uMail"])){
    include "database/UserDB.php";
    $u = new User("", "", $_POST["pass"],$_POST["email"], 0);
    $allUsers = UserDB::getAll();
    foreach($allUsers as $uTemp){
        if($uTemp->email == $u->email && $uTemp->password == $u->password){
            session_start();
            $_SESSION["uEmail"] = $uTemp->email;
            $_SESSION["uIsAdmintype"] = $uTemp->isAdmin;
            $_SESSION["uId"] = $uTemp->id;
            if($_SESSION["uIsAdmintype"]){
                header("Location: admin.php");
            }
            
        }
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
        <?php
        echo $log;     
        ?>
        <div class="jumbotron">
            <h1>Log in</h1>
            <br>
            <div class="container">
                
                <form method="post" action="logIn.php">
                    <div class="form-group">
                        <label for="email">Enter your email address <b>*</b>:</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Your email" required>
                    </div>
                    <div class="form-group">
                        <label for="pass">Enter your password <b>*</b>:</label>
                        <input name="pass" type="password" class="form-control" id="pass" placeholder="Your password" required>
                    </div><div class="form-group">
                        <input class="btn btn-success" type="submit" value="Log in">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
