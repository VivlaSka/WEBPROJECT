<?php
function checkUserInfo(){
    
    $firstName = $_POST["first"];
    $lastName = $_POST["last"];
    $pass = $_POST["pass"];
    $confPass = $_POST["confPass"];
    $email = $_POST["email"];
    //checken of posts niet leeg zijn, anders return false
    if(empty($firstName) || empty($lastName) || empty($email) || empty($pass) || empty($confPass)){
        return false;
    }
    //checken of passwoord en passwoord confirmatie gelijk zijn, anders return false
    if(strcmp($pass, $confPass)){
        return false;
    }
    //checken of de email adres nog niet wordt gebruikt, return anders false
    $users = UserDB::getAll();
    foreach($users as $u){
        if($email == $u->email){
            return false;
        }
    }
    return true;
}
    function checkAddress(){
        //indien er een geen adres wordt meegegeven, return false
        $country = $_POST["country"];
        $city  = $_POST["city"];
        $street  = $_POST["street"];
        $number = $_POST["number"];
        if(empty($country) || empty($city) || empty($street) || empty($number)){
            return false;   
        }
        return true;    
    }
?>