<?php
    class User{
        public $firstName;
        public $lastName;
        public $password;
        public $email;
        public $isAdmin;
        public function __construct($firstName,$lastName,$password,$email,$isAdmin){
            $this->firstName = $firstName;
            $this->lastName = $lastName;
            $this->password = $password;
            $this->email = $email;
            $this->isAdmin = $isAdmin;
        }
        
    }
?>