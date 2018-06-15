<?php
include_once("Rating.php");
include_once("database/DatabaseFactory.php");
class RatingDB {
    public static function getConnection(){
        return DatabaseFactory::getDatabase();
    }
    public static function getAll(){
        $res = self::getConnection()->executeQuery("SELECT * FROM Rating");
        $ratings = array();
        for($i = 0; $i < $res->num_rows; $i++){
            $ratings[$i] = self::convertToObject($res->fetch_array());
        }
        return $ratings;
    }
    public static function getByUser($userId){
        $conn = self::getConnection();
        $query = "SELECT * FROM Rating WHERE UserId = (
            SELECT Id FROM User WHERE Id = ". $userId .")"; // still need to be finetuned and to add userId
        $res = $conn->executeQuery($query);
        $ratings = array();
        for($i = 0; $i < $res->num_rows; $i++){
            $ratings[$i] = self::convertToObject($res->fetch_array());
        }
        return $ratings;
    }
    public static function insert($r){
        return self::getConnection()->executeQuery
        (
            "INSERT INTO Rating(UserId, ProductId, Comment, Rating) VALUES ('?', '?', '?', '?')",
            array($r->userId, $r->prodId, $r->comment, $r->rating)
        );
    }
    
    public static function getByProdId($prodId){
        $conn = self::getConnection();
        $query = "SELECT * FROM Rating WHERE ProductId = (
            SELECT Id FROM Product WHERE Id = ". $prodId .")"; // still need to be finetuned and to add userId
        $res = $conn->executeQuery($query);
        $ratings = array();
        for($i = 0; $i < $res->num_rows; $i++){
            $ratings[$i] = self::convertToObject($res->fetch_array());
        }
        return $ratings;
    }
    
    public static function convertToObject($row){
        return new Rating(
            $row["Id"],
            $row["UserId"],
            $row["ProdId"],
            $row["Comment"],
            $row["Rating"]);
    }
}
?>