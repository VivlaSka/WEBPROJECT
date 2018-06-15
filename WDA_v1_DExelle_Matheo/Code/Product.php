<?php
    class Product{
        public $id;
        public $desc;
        public $name;
        public $pic;
        public $price;
        
        public function __construct($id,$desc,$name,$pic,$price){
            $this->id = $id;
            $this->desc = $desc;
            $this->name = $name;
            $this->pic = $pic;
            $this->price = $price;
        }
    }
?>