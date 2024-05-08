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
    $this->db = new database;
    $con = $this->db->openConnection();
    if(!$con)
    {
      echo "seller Not Connected";
    }
  }
  public function listItem($cat)
  { 
    if ($cat == null){
      $str="SELECT * from items";
    }else
    $str="SELECT * from items where catagory_name='$cat'";
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
    // echo 'hello add item <br>';
    // echo $image;
    // echo $name;
    // echo $description;
    // echo $price;
    // echo $rate;
    // echo $ammount;
    // echo $offer;
    // echo $catagory_name;

    // echo $image != null && $name != null && $description != null && $price != null && $rate != null && $ammount != null && $offer != null && $catagory_name != null;
    // if ($image != null && $name != null && $description != null && $price != null && $rate != null && $ammount != null && $offer != null && $catagory_name != null){
      // echo 'hello add item <br>';
      $str="INSERT INTO items (`i_name`, `i_description`, `price`, `image`, `rate`, `ammount`, `discount`, `catagory_name`)  VALUES  ('$name','$description',$price ,'$image' , $rate,$ammount,$offer,'$catagory_name')";
      $result = $this->db->query($str);
      if($result){
        return true;
        
      } else {
        return "Query failed: " . $this->db->error();
        
      }
      // echo 'hello after add item <br>'; 
    // }else 
    //   return false;
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