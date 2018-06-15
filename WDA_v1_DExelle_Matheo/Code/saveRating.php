<?php
include_once "Rating.php";
include_once "database/RatingDB.php";
if(isset($_POST["number"]) && isset($_POST["msg"])){
    $newR = new Rating(null, 1,$_POST["prodId"],$_POST["number"],$_POST["msg"]);
    RatingDB::insert($newR);
    //header('Location: product-detail.php');
}

 
?>