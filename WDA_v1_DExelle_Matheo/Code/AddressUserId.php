<?php
class AddressUserId {
    public $userId;
    public $prodId;
    
    public function __construct($userId, $prodId){
        $this->userId = $userId;
        $this->prodId = $prodId;
    }
}
?>