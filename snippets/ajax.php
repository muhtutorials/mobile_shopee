<?php

require '../database/DBController.php';
require '../database/Product.php';

$db = new DBController();

$product = new Product($db);

$productList = $product->getData();

if (isset($_POST['item_id'])) {
    $product = $product->getProduct($_POST['item_id']);
    echo json_encode($product);
}