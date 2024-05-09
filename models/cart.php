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
        echo "cart Not Connected";
      }
    }


    public function addToCart($i_id, $userId, $ammount)
    {
        $str = "INSERT INTO `user_oreder_items`(`user_id`, `item_id`, `c_ammount`) VALUES ('$userId', '$i_id', '$ammount')";
        // $upd = "UPDATE `items` SET ,`ammount`='' WHERE `i_id`= '$i_id'";
        $result = $this->db->query($str);
        if($result) {
            return true;
        } else {
            return "Query failed: " . $this->db->error();
        }
    }
    public function removeFromCart($i_id, $userId)
    {
        $str = "DELETE FROM `user_oreder_items` WHERE `user_id` = '$userId' AND `item_id` = '$i_id'";
        $result = $this->db->query($str);
        if($result) {
            return true;
        } else {
            return "Query failed: " . $this->db->error();
        }
    }
    public function updateCart($i_id, $userId, $ammount)
    {
        $str = "UPDATE `user_oreder_items` SET `c_ammount` = '$ammount' WHERE `user_id` = '$userId' AND `item_id` = '$i_id'";
        $result = $this->db->query($str);
        if($result) {
            return true;
        } else {
            return "Query failed: " . $this->db->error();
        }
    }
    public function getCart($userId)
    {
        $str = "SELECT * FROM `user_oreder_items` WHERE `user_id` = '$userId'";
        $result = $this->db->query($str);
        if (!$result) {
            return false;
        }
        if((mysqli_num_rows($result)) == 0){
            return false;
        }
        return $result;
    }
    public function createCart($userEmail)
    {
        $sttr="SELECT `ID` FROM `user` WHERE `email` = '$userEmail'";
        $result = $this->db->query($sttr);
        $result = mysqli_fetch_array($result);
        $str = "INSERT INTO `cart`(`user_id`) VALUES $result[0]";
        $result = $this->db->query($str);
        if($result) {
            return true;
        } else {
            return "Query failed: " . $this->db->error();
        }
    }
}

?>