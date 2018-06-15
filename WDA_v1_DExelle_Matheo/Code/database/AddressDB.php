<?php
include_once "Address.php";
include_once "database/DatabaseFactory.php";
class AddressDB{
    public static function getConnection(){
        return DatabaseFactory::getDatabase();
    }
    public static function getAll(){
        $res = self::getConnection()->executeQuery("SELECT * FROM Address");
        $addresses = array();
        for($i = 0; $i < $res->num_rows; $i++){
            $addresses[$i] = self::convertToObject($res->fetch_array());
        }
        return $addresses;
    }
    
    public static function insert($a){
        return self::getConnection()->executeQuery(
            "INSERT INTO Address(Street, HouseNumber, Country, City, isDeliveryAddress) VALUES ('?','?','?','?', 1)",
            array($a->street, $a->number, $a->country, $a->city)
        );
    }
    public static function getFromUser($id){
        $res = self::getConnection()->executeQuery
        (
            "SELECT * FROM Address WHERE Id = (SELECT AddressId FROM AddressUserId WHERE UserId = ". $id .")"
        );
        $addresses = array();
        for($i = 0; $i < $res->num_rows; $i++){
            $addresses[$i] = self::convertToObject($res->fetch_array());
        }
        return $addresses;
    }
    public static function convertToObject($row){
        return new Address
        (
            $row["Id"],
            $row["Street"],
            $row["Number"],
            $row["Country"],
            $row["isDelivery"],
            $row["City"]

            
        );
    }
}
?>