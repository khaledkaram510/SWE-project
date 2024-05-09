<?php
class item

{
  private $itemID;
  private $itemName;
  private $itemDescription;
  private $itemPrice;
  private $itemImage;
  private $itemRate;
  private $itemAmmount;
  private $itemOffer;
  private $itemCatagory;
  function setitemID($itemID)
  {
    $this->itemID = $itemID;
  }
  function getitemID()
  {
    return $this->itemID;
  }
  function setitemName($itemName)
  {
    $this->itemName = $itemName;
  }
  function getitemName()
  {
    return $this->itemName;
  }
  function setitemDescription($itemDescription)
  {
    $this->itemDescription = $itemDescription;
  }
  function getitemDescription()
  {
    return $this->itemDescription;
  }
  function setitemPrice($itemPrice)
  {
    $this->itemPrice = $itemPrice;
  }
  function getitemPrice()
  {
    return $this->itemPrice;
  }
  function setitemImage($itemImage)
  {
    $this->itemImage = $itemImage;
  }
  function getitemImage()
  {
    return $this->itemImage;
  }
  function setitemRate($itemRate)
  {
    $this->itemRate = $itemRate;
  }
  function getitemRate()
  {
    return $this->itemRate;
  }
  function setitemAmmount($itemAmmount)
  {
    $this->itemAmmount = $itemAmmount;
  }
  function getitemAmmount()
  {
    return $this->itemAmmount;
  }
  function setitemOffer($itemOffer)
  {
    $this->itemOffer = $itemOffer;
  }
  function getitemOffer()
  {
    return $this->itemOffer;
  }
  function setitemCatagory($itemCatagory)
  {
    $this->itemCatagory = $itemCatagory;
  }
  function getitemCatagory()
  {
    return $this->itemCatagory;
  }
  function getitem()
  {
    return array(
      "itemID" => $this->itemID,
      "itemName" => $this->itemName,
      "itemDescription" => $this->itemDescription,
      "itemPrice" => $this->itemPrice,
      "itemImage" => $this->itemImage,
      "itemRate" => $this->itemRate,
      "itemAmmount" => $this->itemAmmount,
      "itemOffer" => $this->itemOffer,
      "itemCatagory" => $this->itemCatagory
    );
  }


}


?>