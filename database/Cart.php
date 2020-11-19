<?php


class Cart
{
    public $db = null;

    public  function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public function insertIntoTable($params=null, $table='cart')
    {
        if ($this->db->con != null) {
            if ($params != null) {
                $columns = implode(',', array_keys($params));
                $values = implode(',', array_values($params));

                $query = sprintf("insert into %s (%s) values (%s)", $table, $columns, $values);
                return $this->db->con->query($query);
            }
        }
    }

    public function addToCart($user_id, $item_id)
    {
        if (isset($user_id) && isset($item_id)) {
            $params = ['user_id' => $user_id, 'item_id' => $item_id];
            $result = $this->insertIntoTable($params);
            if ($result) {
                header('Location: ' . $_SERVER['PHP_SELF']);
            }
        }
    }

    public function deleteCart($item_id = null, $table = 'cart') {
        if ($item_id != null) {
            $result = $this->db->con->query("delete from $table where item_id=$item_id");
            if ($result) {
                header("Location: " . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    public function getSum($arr)
    {
        if (isset($arr)) {
            $sum = 0;
            foreach ($arr as $item) {
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f', $sum);
        }
    }

    public function getCartItemIds($cartArray = null, $key = 'item_id')
    {
        if ($cartArray != null) {
            return array_map(fn($item) => $item[$key], $cartArray);
        }
        return [];
    }

    public function saveForLater($item_id = null, $saveTable = 'wishlist', $fromTable = 'cart')
    {
        if ($item_id != null) {
            $query = "insert into $saveTable select * from $fromTable where item_id=$item_id;";
            $query .= "delete from $fromTable where item_id=$item_id;";
            $result = $this->db->con->multi_query($query);
            if ($result) {
                header('Location: ' . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

}