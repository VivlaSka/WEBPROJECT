<?php
    include_once "DatabaseFactory.php";
    include_once "User.php";
    class UserDB {
        public static function getConnection(){
            return DatabaseFactory::getDatabase();
        }
        public static function getAll(){
            $conn = self::getConnection();
            $query = "SELECT * FROM User";
            $users = array();
            $res = $conn->executeQuery($query);
            for($i = 0; $i < $res->num_rows; $i++){
                $users[$i] = self::convertToObject($res->fetch_array());
            }
            return $users;
        }
        public static function insert($u){
            return self::getConnection()->executeQuery("INSERT INTO User(Pass,FirstName,LastName,Email,isAdmin) VALUES('?','?','?','?','?')",
                array($u->password, $u->firstName, $u->lastName, $u->email, $u->isAdmin));
        }
        public static function convertToObject($row){
            return new User(
                $row["FirstName"],
                $row["LastName"],
                $row["Pass"],
                $row["Email"],
                $row["isAdmin"]
            );
        }
    }
?>

