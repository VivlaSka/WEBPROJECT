<?php
    class Database{
        protected $url;
        protected $username;
        protected $password;
        protected $db;
        protected $connection = null;
        public function __construct($url,$username,$password,$db){
            $this->url = $url;
            $this->username = $username;
            $this->password = $password;
            $this->db = $db;
        }
        
        protected function makeConnection(){
            $this->connection = new mysqli($this->url,
            $this->username,
            $this->password,
            $this->db);
        }
        protected function closeConnection(){
            if($this->connection == null){
                $this->connection->close();
                $this->connection = null;
            }
        }
        
        public function __destruct(){
            if($this->connection != null){
                $this->closeConnection();
            }
        }
        
        protected function cleanParameters($p){
            $result = $this->connection->real_escape_string($p);
            return $result;
        }
        
        public function executeQuery($q, $params = null){

//        Is there a DB connection?
        $this->makeConnection();        
//        Adjust query with params if available
        if ($params != null) {
//            Change ? to values from parameter Array           
            $queryParts = preg_split("/\?/", $q);
//            If amount of ? is not equel to amount of values => error!
            if (count($queryParts) != count($params) + 1) {
                return false;
            }
//            Add first part
            $finalQuery = $queryParts[0];
//            loop over all parameters
            for ($i = 0; $i < count($params); $i++) {
//                add clean parameter to query
                $finalQuery = $finalQuery . $this->cleanParameters($params[$i]) . $queryParts[$i + 1];
            }
            $q = $finalQuery;
        }
        
        
//        execute query
        $results = $this->connection->query($q);
       
        return $results;
        
    }
    }
?>