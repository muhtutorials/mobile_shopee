<?php
    shuffle($productList);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['top-sale-submit'])) {
            $cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }
?>

<!-- Top Sale -->
<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">Top Sale</h4>
        <hr>
        <!-- Owl carousel -->
        <div class="owl-carousel owl-theme">
            <?php foreach ($productList as $item): ?>
            <div class="item py-2">
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
                                if (in_array($item['item_id'], $cart->getCartItemIds($product->getData('cart')))) {
                                    echo '<button class="btn btn-success font-size-12" disabled>In the cart</button>';
                                } else {
                                    echo '<button class="btn btn-warning font-size-12" name="top-sale-submit">Add to cart</button>';
                                }
                            ?>
                        </form>

                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <!-- !Owl carousel -->
    </div>
</section>
<!-- !Top Sale -->
