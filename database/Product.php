<?php


class Product
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function getData($table='product')
    {
        $result = $this->db->con->query("select * from $table");
        $resultArray = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $resultArray[] = $row;
        }
        return $resultArray;
    }

    public function getProduct($item_id=null, $table='product')
    {
        if (isset($item_id)) {
            $result = $this->db->con->query("select * from $table where item_id=$item_id");
            while ($row = mysqli_fetch_assoc($result)) {
                $resultArray[] = $row;
                return $resultArray;
            }
        }
    }
}