<?php
    include_once "DatabaseFactory.php";
    include_once "User.php";
    class AddressUserIdDB {
        public static function getConnection(){
            return DatabaseFactory::getDatabase();
        }
        public static function insert($a){
            return self::getConnection()->executeQuery("INSERT INTO AddressUserId(AddressId, UserId) VALUES('?','?')",
                array($a->userId, $a->prodId));
        }
    }
?>

