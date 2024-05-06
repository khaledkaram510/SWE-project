<?php

require '../models/database.php';

//khaled111


class test 
{
    private $con;

    function __construct()
    {
        $this->con = new mysqli('localhost', 'root', '', 'database');
        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }
    }

    function getConnection()
    {
        return $this->con;
    }
}

// Test the database connection
$database = new test();
$con = $database->getConnection();

if ($con->connect_error) {
    echo "Failed to connect to MySQL: " . $con->connect_error;
} else {
    echo "Connected successfully!";
    $con->close();
}
// ?>
