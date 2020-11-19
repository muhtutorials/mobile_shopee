<!-- Shopping cart -->
<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

        <!-- Shopping cart items -->
        <div class="row">
            <div class="col-sm-9">
            <!-- Empty Cart -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-12 text-center py-2">
                        <img src="assets/blog/empty_cart.png" alt="" class="img-fluid" style="height: 200px">
                        <p class="font-baloo font-size-16 text-black-50">Empty Cart</p>
                    </div>
                </div>
            <!-- !Empty Cart -->
            </div>

            <!-- subtotal -->
            <div class="col-sm-3">
                <div class="sub-total text-center mt-2 border">
                    <h6 class="font-raleway font-size-12 text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE shipping</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal (<?= isset($subTotal) ? count($subTotal) : 0; ?> items):&nbsp;<span class="text-danger">$<span class="text-danger" id="deal-price"><?= isset($subTotal) ? $cart->getSum($subTotal) : 0; ?></span></span></h5>
                        <button class="btn btn-warning">
                            Proceed To Buy
                        </button>
                    </div>
                </div>
            </div>
            <!-- !subtotal -->

        </div>
        <!-- !Shopping cart items -->

    </div>
</section>
<!-- !Shopping cart -->

