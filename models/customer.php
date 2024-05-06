<?php

class customer extends user
{
    private $payment;
    private $id;
    private $phone;
    private $shapping_info;
    

    public function getPayment()
    {
        return $this->payment;
    }
    public function setPayment($payment)
    {
        $this->payment=$payment;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id=$id;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function setPhone($phone)
    {
        $this->phone=$phone;
    }
    public function getShapping_info()
    {
        return $this->shapping_info;
    }
    public function setShapping_info($shapping_info)
    {
        $this->shapping_info=$shapping_info;
    }

    // public add_payment_method(){

    // }

    public function add_payment_method()
    {
    }

    public function remove_payment_method()
    {
    }

    public function search()
    {
    }

    public function filter()
    {
    }

    public function refund()
    {
    }

    public function change_shipping_address()
    {
    }

    public function view_orders_history()
    {
    }

    public function chat_with_ai()
    {
    }

    public function view_recommendation()
    {
    }

    public function update_profile()
    {
    }

    public function register()
    {
    }


    // public function forget_password()
    // {
    // }

    


} 
?>