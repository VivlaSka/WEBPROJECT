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
    <?php
            include_once("functies.php");
            $randProds = getFourRandom();
            $newProds = getFourLast();
        ?>
        <!-- Navigatie bar met links naar de andere pagina's (is sticky, niet fixed on purpose) -->
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">GoodIdea: Goodie store</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-muted" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-muted" href="products.php">All Products</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="contact.php">Contact us</a>
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
                <h2>Leave us a message</h2>
                <h5>Give us some feedback on your experience when using the shop !</h5>
                <br>
                <div class="container">
                    <form method="post" name="contact_form" action="contact-form.php">
                        <div class="form-group">
                            <label for="fullName">Full name:</label>
                            <input required type="text" class="form-control" name="fullName" id="fullName" placeholder="Your full name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input required type="email" class="form-control" name="email" id="email" placeholder="Your email address">
                        </div>
                        <div class="form-group">
                            <label for="msg">Message:</label>
                            <textarea required class="form-control" id="msg" name="msg" placeholder="Give us your feedback"></textarea>
                        </div>
                        <input type="submit" class="btn btn-info" value="Send!">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
