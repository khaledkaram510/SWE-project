<?php
require_once 'database.php';
$db = new database();
$con=$db->openConnection();
if(!$con)
{
  echo "seller Not Connected";
}
// $con=$db->openConnection();
class seller
{ 
  // protected $con =
  // protected 
  // $db->openConnection();
  private $store_name;
  private $quota;
  private $TaxNumber;
  private $phone_number;
  private $SllerID;
  private $registerData;
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
    echo "khaled";
    if((mysqli_num_rows($result)) == 0){
      return false;
    }
    echo "khaled";
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
  public function viewProfitTax()
  {

  }

  public function statisticalReportSoldItems()
  {
    
  }

  public function subscribeForNewQuota()
  {
    
  }

  public function updateProfile()
  {
    
  }

  public function register()
  {
    
  }

  public function forgetPassword()
  {
    
  }



  public function updateItemDescription($discribtion)
  {
    
  }

  public function makeDiscount()
  {
    
  }

  public function getStoreName()
  {
    
  }

  public function getQuota()
  {
    
  }

  public function getTaxNumber()
  {
    
  }

  public function getPhoneNumber()
  {
    
  }

  public function getSellerID()
  {
    
  }

  public function getRegisterData()
  {
    
  }

  public function setStoreName()
  {
    
  }

  public function setQuota()
  {
    
  }

  public function setTaxNumber()
  {
    
  }

  public function setPhoneNumber()
  {
    
  }

  public function setSellerID()
  {
    
  }

  public function setRegisterData()
  {
    
  }
}



?>