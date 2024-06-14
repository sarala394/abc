<?php

class User
{

    protected $db;

    public function __construct()
    {
        $this->db = dbConn();
    }

    public function checkUserName($UserName)
    {
        $sql = "SELECT * FROM users WHERE UserName='$UserName'";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
