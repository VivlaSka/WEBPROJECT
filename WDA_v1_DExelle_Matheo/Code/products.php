<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<!-- Refereren en plagiëre : Dit project maakt gebruik van Bootstrap 4, en componenten gevonden op https://hackerthemes.com/bootstrap-cheatsheet/ -->
<?php
    include_once "database/CategoryDB.php";
    include_once "database/ProductDB.php";
    ?>
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
    <script src="js/category.js"></script>
    <script src="js/addToCart.js"></script>
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
                    <li class="nav-item active">
                        <a class="nav-link" href="products.php">All Products</a>
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
                <h3>All products</h3>
                <form>
                    <?php
                        include_once "functies.php";
                        include_once "database/CategoryDB.php";
                        $cat = CategoryDB::getAll(); 
                    ?>
                    <div class="row">
                        <div style="float:left; margin-right: 2%;margin-top:2%;">
                            <p style="font-size:20px">Category:
                                <select id="categorySelector" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                <option value="*">All products</option>
                                    <?php foreach($cat as $c) { ?>
                                <option value="<?php echo $c->id ?>"> 
                                    <?php echo $c->name ?>      
                                </option>
                                <?php } ?>
                            </select>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <div id="added">
            
            </div>
            <div class="container" id="allItems">
                <?php
                        echo getAllItems();
                ?>
            </div>
        </div>
    </div>

</body>

</html>
