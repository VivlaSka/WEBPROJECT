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
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
        <!-- End navbar -->
        <br>
        <br>
        <!-- De container die de basis kaarten bevat namelijk de 4 nieuwste items en de 4 random items-->
        <!-- New items -->
        <div class="container">
            <div class="jumbotron">
                    <h1>Newest items</h1>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <img class="card-img-top" src='<?php echo $newProds[count($newProds) - 1]->pic ?>' alt="Card image cap">
                            <div class="card-body">
                              <h4 class="card-title"><?php echo $newProds[count($newProds) - 1]->name ?></h4></div>
                              <div class='card-footer'><form method='post' action='product-detail.php'>
                            
                                <input type=number name='prodId' hidden value='<?php echo $newProds[count($newProds) - 1]->id ?>'>
                                    <input type='submit' class='btn btn-primary' placeholder='More ...'>
                        </form>
                            </div>
                          </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img class="card-img-top" src='<?php echo $newProds[count($newProds) - 2]->pic ?>' alt="Card image cap">
                            <div class="card-body">
                              <h4 class="card-title"><?php echo $newProds[count($newProds) - 2]->name ?></h4></div>
                              <div class='card-footer'><form method='post' action='product-detail.php'>
                            
                                <input type=number name='prodId' hidden value='<?php echo $newProds[count($newProds) - 2]->id ?>'>
                                    <input type='submit' class='btn btn-primary' placeholder='More ...'>
                        </form>
                            </div>
                          </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <img class="card-img-top" src='<?php echo $newProds[count($newProds) - 3]->pic ?>' alt="Card image cap">
                            <div class="card-body">
                              <h4 class="card-title"><?php echo $newProds[count($newProds) - 3]->name ?></h4></div>
                              <div class='card-footer'><form method='post' action='product-detail.php'>
                            
                                <input type=number name='prodId' hidden value='<?php echo $newProds[count($newProds) - 3]->id ?>'>
                                    <input type='submit' class='btn btn-primary' placeholder='More ...'>
                        </form>
                            </div>
                          </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img class="card-img-top" src='<?php echo $newProds[count($newProds) - 4]->pic ?>' alt="Card image cap">
                            <div class="card-body">
                              <h4 class="card-title"><?php echo $newProds[count($newProds) - 4]->name ?></h4></div>
                              <div class='card-footer'><form method='post' action='product-detail.php'>
                            
                                <input type=number name='prodId' hidden value='<?php echo $newProds[count($newProds) - 4]->id ?>'>
                                    <input type='submit' class='btn btn-primary' placeholder='More ...'>
                        </form>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <br>
        <br>

        <!-- Highlighted items -->
        <div class="container">
            <div class="jumbotron">
                    <h1>Highlighted items</h1>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <img class="card-img-top" src='<?php echo $randProds[0]->pic ?>' alt="Card image cap">
                            <div class="card-body">
                              <h4 class="card-title"><?php echo $randProds[0]->name ?></h4></div>
                              <div class='card-footer'><form method='post' action='product-detail.php'>
                            
                                <input type=number name='prodId' hidden value='<?php echo $randProds[0]->id ?>'>
                                    <input type='submit' class='btn btn-primary' placeholder='More ...'>
                        </form></div>
                            
                          </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img class="card-img-top" src='<?php echo $randProds[1]->pic ?>' alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $randProds[1]->name ?></h4></div>
                              <div class='card-footer'><form method='post' action='product-detail.php'>
                            
                                <input type=number name='prodId' hidden value='<?php echo $randProds[1]->id ?>'>
                                    <input type='submit' class='btn btn-primary' placeholder='More ...'>
                        </form>
                            </div>
                          </div>
                    </div>
                    
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <img class="card-img-top" src='<?php echo $randProds[2]->pic ?>' alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $randProds[2]->name ?></h4></div>
                              <div class='card-footer'><form method='post' action='product-detail.php'>
                            
                                <input type=number name='prodId' hidden value='<?php echo $randProds[2]->id ?>'>
                                    <input type='submit' class='btn btn-primary' placeholder='More ...'>
                        </form>
                            </div>
                          </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img class="card-img-top" src='<?php echo $randProds[3]->pic ?>' alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $randProds[3]->name?></h4></div>
                              <div class='card-footer'><form method='post' action='product-detail.php'>
                            
                                <input type=number name='prodId' hidden value='<?php echo $randProds[3]->id ?>'>
                                    <input type='submit' class='btn btn-primary' placeholder='More ...'>
                        </form>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>