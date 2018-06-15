<?php
    include_once "database/ProductDB.php";
    include_once "database/RatingDB.php";
    function getAllItems(){
        $res = ProductDB::getAll();
        $countAllItems = count($res);
        $card = "";
        $toAddDivs = 0;
        $notFound = '<div class="alert alert-warning alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h6>No items where found ... :(</h6></div>';;
        // Indien items terugkomen, print ze als cards op de pagina
        if($countAllItems > 0){
            for($i = 0; $i < $countAllItems; $i++)
            {
                //indien er al 3 items zijn toegevoegd, voeg een nieuwe row toe, de volgende items worden aan de volgende toegevoegd, enz
                if($i % 3 == 0){
                    if($i > 0){
                        $card .= "</div><br>";
                    }
                    $card .= "<div class='row'>";
                }
                $card .= '<div class="col"><div id=' . $res[$i]->id .' class="card" style="height:320px;">';
                $card .= '<img class="card-img-top" src="'.$res[$i]->pic.'" alt="">';
                $card .= '<div class="card-body">';
                $card .= "<div class='card-title'><h4><i>".$res[$i]->name."</i></h4></div>";
                $card .= "<div class='card-title' style='text-align:center'><h3>€ ".$res[$i]->price."</h3></div><div class='cartbtn' style='display:none;text-align:center'>
                                <button type='button' class='btn btn-success'>
                                  Add to cart
                                </button>
                                </div></div>";
                $card .= "<div class='card-footer'><form method='post' action='product-detail.php'>                 
                                <input type=number name='prodId' hidden value='". $res[$i]->id ."'>
                                <input type='submit' class='btn btn-primary' value='More ...'>
                        </form>
                        </div>";
                $toAddDivs += 2;
                for($j = 0; $j < $toAddDivs; $j++){
                    $card .= '</div>';
                }
                $toAddDivs = 0;
            }
            
            //indien $countAllItems niet een deler is van drie, add <div class="col"></div> voor opmaak 
                while($countAllItems % 3 != 0){
                    $card .= '<div class="col"></div>';
                    $countAllItems++;
                }
            return $card;
        }
        else{
            //indien er geen items zijn komt er een alert tevoorschijn
            return $notFound;
        }
    }
    function getFourRandom(){
        $res = ProductDB::getAll();
        while(count($res) > 5){
            shuffle($res);
            array_pop($res);
        }
        return $res;
    }
    function getFourLast(){
        $res = ProductDB::getAll();
        return $res;
    }
    function getAllRatingsItem($id){
        $res = RatingDB::getByProdId($id);
        return $res;
    }
?>
