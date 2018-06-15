<?php
include_once "database/ProductDB.php";
$id = $_POST['request'];
var_dump($_POST['request']);
$item  = ProductDB::getById($id);
session_start();

if(isset($_SESSION["cart"][$_POST['request']])){
    $_SESSION["cart"][$_POST['request']] += 1;
}

else {
     $_SESSION["cart"][$_POST['request']] = 1;
}
?>