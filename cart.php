<?php

ob_start();

include 'header.php';

count($product->getData('cart')) ? include 'snippets/shopping-cart.php' : include 'snippets/not-found/cart-not-found.php';;

count($product->getData('wishlist')) ? include 'snippets/wishlist.php' : include 'snippets/not-found/wishlist-not-found.php';;

include 'snippets/new-phones.php';

include 'footer.php';
