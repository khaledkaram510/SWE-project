<?php

class cart
{
    private $c_id;
    private $userId;
    private $db;
    public $ammount;


    public function __construct()
    {
      $this->db = new database;
      $con = $this->db->openConnection();
      if(!$con)
      {
        echo "seller Not Connected";
      }
    }


    public function addToCart($i_id, $userId, $ammount)
    {
        $str = "INSERT INTO `user_oreder_items`(`user_id`, `item_id`, `c_ammount`) VALUES ('$userId', '$i_id', '$ammount')";
        $upd = "UPDATE `items` SET ,`ammount`='' WHERE `i_id`= '$i_id'";
        $result = $this->db->query($str);
        if($result) {
            return true;
        } else {
            return "Query failed: " . $this->db->error();
        }
    }
}

?>