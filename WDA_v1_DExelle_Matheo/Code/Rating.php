<?php
class Rating{
    public $id;
    public $userId;
    public $prodId;
    public $comment;
    public $rating;
    
    public function __construct($id,$userId,$prodId,$comment,$rating){
        $this->id =$id;
        $this->userId = $userId;
        $this->prodId = $prodId;
        $this->comment =$comment;
        $this->rating = $rating;
    }
    
}
?>