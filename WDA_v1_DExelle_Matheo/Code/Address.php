<?php
class Address {
    public $id;
    public $street;
    public $number;
    public $country;
    public $isDelivery;
    public $city;
    
    public function __construct($id,$street,$number,$country,$isDelivery,$city){
        $this->id = $id;
        $this->street = $steet;
        $this->number = $number;
        $this->country = $country;
        $this->isDelivery = $isDelivery;
        $this->city = $city;

    }
}
?>