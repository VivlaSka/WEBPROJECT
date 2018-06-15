<?php
include_once "database/ProductDB.php";
include_once "database/CategoryDB.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $res = ProductDB::getById($_POST["prodId"]);
    $cat = CategoryDB::getByProdId($res[0]->id);
    $itemsSameCat = ProductDB::getByCat($cat[0]->id);
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
                <div id="added">
                
                </div>
                <div class="container">
                    <h1 style="float:left;">Item: <?php echo $res[0]->name; ?></h1>
                    <h1 style="float:right;">Category: <?php echo $cat[0]->name ?></h1>
                <img src="<?php echo $res[0]->pic; ?>" style="height:90%; width: 90%;border: 5px solid black;">
                </div>
                <br>
                <br>
                <div class="container">
                <h1>Description</h1>
                    <p><?php echo $res[0]->desc; ?></p>
                </div>
                <h2 style="float:right">PRICE: € <?php echo $res[0]->price; ?></h2>
                <form method='post' action="addToCart.php">
                        <div id="<?php echo $res[0]->id; ?>" class='cartbtn' style='text-align:center'>
                            <button type='button' class='btn btn-success'>
                      Add to cart
                    </button>
                </div>
                </form>
                <br>
                <br>
                <div class="container">
                <h1>Rating &amp; comments</h1>
                <form method="post" action="saveRating.php">
                    Give this item a rating: <input type="number" min="0" max="5" name="number"> / 5 Stars.
                    <div class="form-group">
                            <label for="msg">Message:</label>
                            <textarea required class="form-control" id="msg" name="msg" placeholder="Give us your feedback"></textarea>
                        </div>
                    <input type="submit" class="btn btn-info" value="Rate">
                </form>
            </div>
            </div>
            <br>
            <br>
            <div class="container">
                <div class="container">
                <h1>Ratings</h1>
                    <div class='row' style="">
                        <div class="col"><h3> Comment </h3></div> <div class="col"><h3> Ratings</h3></div>
                    </div>
                <?php
                include_once "functies.php";
                $RForThis = getAllRatingsItem($res[0]->id);
                foreach($RForThis as $r){
                    ?>
                    <div class='row' style="border: 1px solid black; border-radius: 3px;">
                        <div class="col"><h5> " <?php echo $r->comment; ?> " </h5></div> <div class="col"><h4> <?php echo $r->rating ?> / 5</h4></div>
                    </div>
                    <br>
                <?php
                }
                ?>
            </div>
                </div>
            <br>
            <br>
            <div class="container">
                <h1>Similar items:</h1>
                <div class="row">
                    <?php
                        $card = "";
                        $highlighted = 4;
                        for($i = 0; $i < $highlighted; $i++){
                            if($itemsSameCat[$i]->id == $res[0]->id){
                                unset($itemsSameCat[$i]);
                                $i++;
                                $highlighted++;
                            }
                            $card .= '<div class="col"><div id=' . $itemsSameCat[$i]->id .' class="card" style="height:320px;">';
                            $card .= '<img class="card-img-top" src="' . $itemsSameCat[$i]->pic .'" alt="">';
                            $card .= '<div class="card-body">';
                            $card .= "<div class='card-title'><h4><i>".$itemsSameCat[$i]->name."</i></h4></div>";
                            $card .= "<div class='card-title' style='text-align:center'><h3>€ " . $itemsSameCat[$i]->price ."</h3></div><div class='cartbtn' style='display:none;text-align:center'>
                                <button type='button' class='btn btn-success'>
                                  <span class='glyphicon glyphicon-shopping-cart'></span> Add to cart
                                </button>
                                </div></div>";
                            $card .= "<div class='card-footer'><form method='post' action='product-detail.php'>                 
                                <input type=number name='prodId' hidden value='". $itemsSameCat[$i]->id ."'>
                                <input type='submit' class='btn btn-primary' value='More ...'>
                        </form>
                        </div></div></div>";
                        }
                    echo $card;
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
