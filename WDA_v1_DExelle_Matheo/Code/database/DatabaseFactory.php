<?php
    include_once "Database.php";
    class DatabaseFactory{
        private static $connection;
        public static function getDatabase(){
            if(self::$connection == null){
                $url = "dt5.ehb.be"; 
                $username = "18WDA058"; 
                $password = "49768153";
                $db =  "18WDA058";
                self::$connection = new Database($url, $username, $password, $db);
            }
            return self::$connection;
        }
    }
?>