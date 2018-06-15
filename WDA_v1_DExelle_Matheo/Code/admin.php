<?php
if(isset($_SESSION["uIsAdmin"]) && $_SESSION["uIsAdmin"] == 1){
    
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
        <a class="navbar-brand" href="../index.html">GoodIdea: Goodie store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-muted" href="../index.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted" href="products.php">All Products<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted" href="#">Contact us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted" href="#">Log in</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Sign up</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <br>
    <div class="container">
        <div class="jumbotron">
            <h1>Admin page</h1>
            <br>
            <div class="container">
                <?php
                    include_once("functies.php");
                    //get All users
                    //get All orders
                ?>
            </div>
        </div>
    </div>


</body>

</html>
