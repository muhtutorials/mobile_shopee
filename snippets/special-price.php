<?php
    $brands = array_map(function($product) { return $product['item_brand']; }, $productList);
    $unique_brands = array_unique($brands);
    // sort brands by name
    sort($unique_brands);
    shuffle($productList);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['special-price-submit'])) {
            $cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }

    $in_cart = $cart->getCartItemIds($product->getData('cart'));
?>

<!-- Special Price -->
<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20">Special Price</h4>
        <div id="filters" class="button-group text-right font-baloo font-size-16">
            <button class="btn is-checked" data-filter="*">All Brands</button>
            <?php
                array_map(function($brand) {
                    printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);
                }, $unique_brands)
            ?>
        </div>
        <div class="grid">
            <?php array_map(function($item) use($in_cart) { ?>
            <div class="grid-item border <?= $item['item_brand'] ?>">
                <div class="item py-2" style="width: 200px;">
                    <div class="product font-raleway">
                        <a href="product.php?item_id=<?= $item['item_id'] ?>">
                            <img src="<?= $item['item_image'] ?>" class="img-fluid" alt="">
                        </a>
                        <div class="text-center">
                            <h6><?= $item['item_name'] ?></h6>
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <div class="price py-2">
                                <span><?= $item['item_price'] ?></span>
                            </div>
                            <form method="post">
                                <input type="hidden" name="user_id" value="1">
                                <input type="hidden" name="item_id" value="<?= $item['item_id'] ?>">
                                <?php
                                if (in_array($item['item_id'], $in_cart)) {
                                    echo '<button class="btn btn-success font-size-12" disabled>In the cart</button>';
                                } else {
                                    echo '<button class="btn btn-warning font-size-12" name="special-price-submit">Add to cart</button>';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php }, $productList) ?>
        </div>
    </div>
</section>
<!-- !Special Price -->
