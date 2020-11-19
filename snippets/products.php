<?php
    $item_id = $_GET['item_id'] ?? 1;
    $items_in_cart = $cart->getCartItemIds($product->getData('cart'));
    foreach ($product->getData() as $product):
        if ($product['item_id'] == $item_id):

?>

<!-- product -->
<section id="product py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?= $product['item_image'] ?>" alt="" class="img-fluid">
                <div class="form-row pt-4 font-size-16 font-baloo">
                    <div class="col">
                        <button class="btn btn-danger form-control">Proceed To Buy</button>
                    </div>
                    <div class="col">
                        <?php
                        if (in_array($product['item_id'], $items_in_cart)) {
                            echo '<button class="btn btn-success form-control" disabled>In the cart</button>';
                        } else {
                            echo '<button class="btn btn-warning form-control" name="top-sale-submit">Add to cart</button>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-baloo font-size-20">
                    <?= $product['item_name'] ?>
                </h5>
                <small>by <?= $product['item_brand'] ?></small>
                <div class="d-flex">
                    <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                        <a href="" class="px-2 font-raleway font-size-14">20,544 ratings | 1000+ answered questions</a>
                    </div>
                </div>
                <hr class="m-0">

                <!-- product price -->
                <table class="my-3">
                    <tr class="font-raleway font-size-14">
                        <td>M.R.P.</td>
                        <td><span class="strike">$162.00</span></td>
                    </tr>
                    <tr class="font-raleway font-size-14">
                        <td>Deal Price:</td>
                        <td class="font-size-20 text-danger"><span>$<?= $product['item_price'] ?></span><small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                    </tr>
                    <tr class="font-raleway font-size-14">
                        <td>You Save:</td>
                        <td><span class="font-size-16 text-danger">$10.00</span></td>
                    </tr>
                </table>
                <!-- !product price -->

                <!-- policy-->
                <div id="policy">
                    <div class="d-flex">
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-secondary">
                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                            </div>
                            <a href="" class="font-raleway font-size-12">10 Days<br>Replacement</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-secondary">
                                <span class="fas fa-truck border p-3 rounded-pill"></span>
                            </div>
                            <a href="" class="font-raleway font-size-12">Igor<br>Delivered</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-secondary">
                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                            </div>
                            <a href="" class="font-raleway font-size-12">1 Year<br>Warranty</a>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- !policy -->

                <!-- order details -->
                <div id="order-details" class="font-raleway d-flex flex-column text-dark">
                    <small>Delivery by: Nov 20 - Nov 25</small>
                    <small>Sold by <a href="">Electronics Corp.</a>(4,5 out of 5 | 18,456 ratings)</small>
                    <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 362532</small>
                </div>
                <!-- order details -->

                <div class="row">
                    <div class="col-6">
                        <div class="color my-3">
                            <div class="d-flex justify-content-between">
                                <h6 class="font-baloo">Color:</h6>
                                <div class="p-2 color-yellow-bg rounded-circle">
                                    <button class="btn font-size-14"></button>
                                </div>
                                <div class="p-2 color-primary-bg rounded-circle">
                                    <button class="btn font-size-14"></button>
                                </div>
                                <div class="p-2 color-secondary-bg rounded-circle">
                                    <button class="btn font-size-14"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="quantity d-flex">
                            <h6 class="font-baloo">Quantity:</h6>
                            <div class="px-4 d-flex font-raleway">
                                <button class="quantity-up border bg-light">
                                    <i class="fas fa-angle-up"></i>
                                </button>
                                <input type="text" class="quantity-input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                                <button class="quantity-down border bg-light">
                                    <i class="fas fa-angle-down"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Size -->
                <div class="size my-3">
                    <h6 class="font-baloo">Size:</h6>
                    <div class="d-flex justify-content w-75">
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">4 GB RAM</button>
                        </div>
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">6 GB RAM</button>
                        </div>
                        <div class="font-rubik border p-2">
                            <button class="btn p-0 font-size-14">8 GB RAM</button>
                        </div>
                    </div>
                </div>
                <!-- !Size -->

            </div>

            <div class="col-12">
                <h6 class="font-rubik">
                    Product Description
                </h6>
                <p class="font-raleway font-size-12">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis commodi consectetur deleniti dolorem dolorum eaque hic illum ipsam iure, labore maiores nihil officia pariatur qui, quia temporibus tenetur veniam, vitae.</p>
                <p class="font-raleway font-size-12">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis commodi consectetur deleniti dolorem dolorum eaque hic illum ipsam iure, labore maiores nihil officia pariatur qui, quia temporibus tenetur veniam, vitae.</p>
            </div>

        </div>
    </div>
</section>
<!-- !product -->

<?php endif; endforeach; ?>