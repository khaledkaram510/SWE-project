<?php
class manger{
  private $mangerID;
  private $mangerName;
  private $mangerEmail;
  private $mangerPassword;
  private $db;

  public function __construct()
  {
    $this->db = new database();
    $con = $this->db->openConnection();
    if(!$con)
    {
      echo "seller Not Connected";
    }
  }
  public function listItem($cat)
  { 
    $str="SELECT * from items where category='$cat'";
    $result = $this->db->query($str);
    if (!$result) {
      return false;
    }
    if((mysqli_num_rows($result)) == 0){
      return false;
    }
    return $result;
  }
  public function deleteItem($item_id)
  {
    $str="DELETE FROM items WHERE i_id='$item_id'";
    $this->db->query($str);
  }
  public function addItem($name ,$description,$price,$image,$rate ,$ammount,$offer,$catagory_name)
  {
    $str="INSERT INTO items VALUES  ('$name','$description','$price' , '$image' , '$rate','$ammount','$offer','$catagory_name')";
    $this->db->query($str);
  }
  public function updateItem($id,$row_name,$new_value)
  {
    $str="UPDATE `item` SET `$row_name`=$new_value WHERE i_id= '$id'";
    $this->db->query($str);
  }
  public function makeDiscount($item_id,$discount) {
    $str="UPDATE `item` SET `discount`=$discount WHERE i_id= '$item_id'";
    $this->db->query($str);
  }
  public function setmangerID($mangerID) {
    $this->mangerID = $mangerID;
  }
  public function getMangerID() {
    return $this->mangerID;
  }
  public function setMangerName($mangerName) {
    $this->mangerName = $mangerName;
  }
  public function getMangerName() {
    return $this->mangerName;
  }
  public function setMangerEmail($mangerEmail) {
    $this->mangerEmail = $mangerEmail;
  }
  public function getMangerEmail() {
    return $this->mangerEmail;
  }
  public function setMangerPassword($mangerPassword) {
    $this->mangerPassword = $mangerPassword;
  }
  public function getMangerPassword() {
    return $this->mangerPassword;
  }
  public function viewReports() {

  }
}


?>