<?php

require 'database/DBController.php';
require 'database/Product.php';
require 'database/Cart.php';

$db = new DBController();

$product = new Product($db);

$productList = $product->getData();

$cart = new Cart($db);
