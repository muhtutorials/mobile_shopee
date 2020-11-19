<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete-cart-submit'])) {
        $deletedCart = $cart->deleteCart($_POST['item_id'], 'wishlist');
    }

    if (isset($_POST['cart-submit'])) {
        $cart->saveForLater($_POST['item_id'], 'cart', 'wishlist');
    }
}
?>

<!-- Shopping cart -->
<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Wishlist</h5>

        <!-- Shopping cart items -->
        <div class="row">
            <div class="col-sm-9">
                <?php
                foreach ($product->getData('wishlist') as $item):
                    $cartItem = $product->getProduct($item['item_id']);
                    $subTotal[] = array_map(function($product) {
                ?>
                <!-- cart item -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?= $product['item_image'] ?>" alt="" style="height: 120px;" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?= $product['item_name'] ?></h5>
                        <small>by <?= $product['item_brand'] ?></small>
                        <!-- product rating -->
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="" class="px-2 font-raleway font-size-14">20,565 ratings</a>
                        </div>
                        <!-- !product rating -->

                        <!-- product quantity -->
                        <div class="quantity d-flex pt-2">

                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $product['item_id'] ?>">
                                <button class="btn font-baloo text-danger px-3 border-right" name="delete-cart-submit">
                                    Delete
                                </button>
                            </form>

                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $product['item_id'] ?>">
                                <button name="cart-submit" class="btn font-baloo text-danger">
                                    Add To Cart
                                </button>
                            </form>
                        </div>
                        <!-- !product quantity -->
                    </div>
                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 font-baloo text-danger">
                            $<span class="product-price" data-id="<?= $product['item_id'] ?>"><?= $product['item_price'] ?></span>
                        </div>
                    </div>
                </div>
                <!-- !cart item -->
                <?php
                        return $product['item_price'];
                    }, $cartItem); endforeach;
                ?>
            </div>

        </div>
        <!-- !Shopping cart items -->

    </div>
</section>
<!-- !Shopping cart -->
