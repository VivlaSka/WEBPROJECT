<?php
    include_once "Category.php";
    include_once "DatabaseFactory.php";
    class CategoryDB {
        private static function getConnection(){
            return DatabaseFactory::getDatabase();
        }
        public static function getAll(){
            $query = "SELECT * FROM Category";
            $conn = self::getConnection(); 
            $results = $conn->executeQuery($query);
            
            $cats = array();
            for($i = 0; $i < $results->num_rows; $i++){
                $row = $results->fetch_array();
                $prod = self::convertToObject($row);
                $cats[$i] = $prod;
            }
            return $cats;
        }
        public static function getByProdId($id){
            $conn = self::getConnection();
            $query = "SELECT * FROM Category WHERE Id IN (SELECT CategoryId FROM ProductCategoryId WHERE ProductId = " . $id ." )";
            $cats = array();
            $res = $conn->executeQuery($query);
            for($i = 0; $i < $res->num_rows; $i++){
                $cats[$i] = self::convertToObject($res->fetch_array());
            }
            return $cats;
        }
        public static function convertToObject($row){
            return new Category(
                $row['Id'],
                $row['Name']
            );
        } 
    }
?>
