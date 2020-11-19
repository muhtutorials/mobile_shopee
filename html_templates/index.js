$(document).ready(function () {
    // banner owl carousel
    $("#banner-area .owl-carousel").owlCarousel({ items: 1 });

    // top-sale owl carousel
    $("#top-sale .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0: { items: 1 },
            600: { items: 3 },
            1000: { items: 5 }
        }
    });

    // isotope filter
    var $grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
    });
    // filter items on button click
    $('.button-group').on('click', 'button', function () {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
    });

    // new phones owl carousel
    $("#new-phones .owl-carousel").owlCarousel({
        loop: true,
        responsive: {
            0: { items: 1 },
            600: { items: 3 },
            1000: { items: 5 }
        }
    });

    // new phones owl carousel
    $("#blogs .owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0: { items: 1 },
            600: { items: 3 }
        }
    });

    // product quantity
    let $qtyUp = $('.quantity .quantity-up');
    let $qtyDown = $('.quantity .quantity-down');
    // let $qtyInput = $('.quantity .quantity-input');

    $qtyUp.click(function() {
        let $qtyInput = $(`.quantity-input[data-id=${$(this).data('id')}]`);
        if ($qtyInput.val() >= 1 && $qtyInput.val() <= 9) {
            $qtyInput.val(function(i, val) {
                return ++val;
            })
        }
    });

    $qtyDown.click(function() {
        let $qtyInput = $(`.quantity-input[data-id=${$(this).data('id')}]`);
        if ($qtyInput.val() > 1 && $qtyInput.val() <= 10) {
            $qtyInput.val(function(i, val) {
                return --val;
            })
        }
    });
})