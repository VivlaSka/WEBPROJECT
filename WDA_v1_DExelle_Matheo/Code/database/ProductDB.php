<?php
    include_once "Product.php";
    include_once "DatabaseFactory.php";
    class ProductDB {
        private static function getConnection(){
            return DatabaseFactory::getDatabase();
        }
        public static function getAll(){
            $query = "SELECT * FROM Product";
            $conn = self::getConnection(); 
            $results = $conn->executeQuery($query);
            
            $allProds = array();
            for($i = 0; $i < $results->num_rows; $i++){
                $row = $results->fetch_array();
                $prod = self::convertToObject($row);
                $allProds[$i] = $prod;
            }
            return $allProds;
        }
          
        public static function getByCat($cat){
            $con  = self::getConnection();
            $res = 0;
            $prods = array();
            if($cat == "*") {
                $res = $con->executeQuery("SELECT * FROM Product");
            }else{
                $res = $con->executeQuery("SELECT * FROM Product WHERE Id IN
                (SELECT ProductId FROM ProductCategoryId WHERE CategoryId = " . $cat .")");
            }
            for($i = 0; $i < $res->num_rows; $i++){
                $prods[$i] = self::convertToObject($res->fetch_array());
            }
            return $prods;
        }
        
        public static function getById($id){
            $conn = self::getConnection();
            $q = "SELECT * FROM Product WHERE Id = " . $id;
            $prods = array();
            $res = $conn->executeQuery($q);
            for($i = 0; $i < $res->num_rows; $i++){
                $prods[$i] = self::convertToObject($res->fetch_array());
            }
            return $prods;
        }
        public static function convertToObject($row){
            return new Product(
                $row['Id'],
                $row['Description'],
                $row['Name'],
                $row['Pic'],
                $row['Price']
            );
        } 
    }
?>
