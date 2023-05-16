<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?></title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="Brancy - Cosmetic & Beauty Salon Website Template">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="bootstrap, ecommerce, ecommerce html, beauty, cosmetic shop, beauty products, cosmetic, beauty shop, cosmetic store, shop, beauty store, spa, cosmetic, cosmetics, beauty salon" />
    <meta name="author" content="codecarnival" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.webp">

    <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->

    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <link rel="stylesheet" href="../../assets/css/vendor/bootstrap.min.css">

    <!-- Plugins CSS (All Plugins Files) -->
    <link rel="stylesheet" href="../../assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="../../assets/css/plugins/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/plugins/fancybox.min.css">
    <link rel="stylesheet" href="../../assets/css/plugins/nice-select.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="../../assets/css/style.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $("#header").load("header.php");
            $("#footer").load("footer.php");
        })
    </script>

</head>

<body>

    <!--== Wrapper Start ==-->
    <div class="wrapper">
        <header id="header">

        </header>
        <!--== End Header Wrapper ==-->

        <main class="main-content">

            <!--== Start Page Header Area Wrapper ==-->
            <nav aria-label="breadcrumb" class="breadcrumb-style1">
                <div class="container">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div>
            </nav>
            <!--== End Page Header Area Wrapper ==-->

            <!--== Start Shopping Checkout Area Wrapper ==-->
            <section class="shopping-checkout-wrap section-space">
                <div class="container">
                    <div class="checkout-page-coupon-wrap">
                        <!--== Start Checkout Coupon Accordion ==-->
                        <div class="coupon-accordion" id="CouponAccordion">
                            <div class="card">
                                <h3>
                                    <i class="fa fa-info-circle"></i> Have a Coupon?
                                    <a href="#/" data-bs-toggle="collapse" data-bs-target="#couponaccordion">Click here to enter your code</a>
                                </h3>
                                <div id="couponaccordion" class="collapse" data-bs-parent="#CouponAccordion">
                                    <div class="card-body">
                                        <div class="apply-coupon-wrap">
                                            <p>If you have a coupon code, please apply it below.</p>
                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" placeholder="Coupon code">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button type="button" class="btn-coupon">Apply coupon</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--== End Checkout Coupon Accordion ==-->
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <!--== Start Billing Accordion ==-->
                            <div class="checkout-billing-details-wrap">
                                <h2 class="title">Billing details</h2>
                                <div class="billing-form-wrap">
                                    <form action="#" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="f_name">First name <abbr class="required" title="required">*</abbr></label>
                                                    <input id="f_name" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="l_name">Last name <abbr class="required" title="required">*</abbr></label>
                                                    <input id="l_name" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="com_name">Company name (optional)</label>
                                                    <input id="com_name" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-4">
                                                <div class="form-group">
                                                    <label for="country">Country <abbr class="required" title="required">*</abbr></label>
                                                    <select id="country" class="form-control wide">
                                                        <option>Bangladesh</option>
                                                        <option>Afghanistan</option>
                                                        <option>Albania</option>
                                                        <option>Algeria</option>
                                                        <option>Armenia</option>
                                                        <option>India</option>
                                                        <option>Pakistan</option>
                                                        <option>England</option>
                                                        <option>London</option>
                                                        <option>London</option>
                                                        <option>China</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="street-address">Street address <abbr class="required" title="required">*</abbr></label>
                                                    <input id="street-address" type="text" class="form-control" placeholder="House number and street name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="street-address2" class="visually-hidden">Street address 2 <abbr class="required" title="required">*</abbr></label>
                                                    <input id="street-address2" type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="town">Town / City <abbr class="required" title="required">*</abbr></label>
                                                    <input id="town" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-4">
                                                <div class="form-group">
                                                    <label for="district">District <abbr class="required" title="required">*</abbr></label>
                                                    <select id="district" class="form-control wide">
                                                        <option>Afghanistan</option>
                                                        <option>Albania</option>
                                                        <option>Algeria</option>
                                                        <option>Armenia</option>
                                                        <option>India</option>
                                                        <option>Pakistan</option>
                                                        <option>England</option>
                                                        <option>London</option>
                                                        <option>London</option>
                                                        <option>China</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="pz-code">Postcode / ZIP (optional)</label>
                                                    <input id="pz-code" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="phone">Phone (optional)</label>
                                                    <input id="phone" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="email">Email address <abbr class="required" title="required">*</abbr></label>
                                                    <input id="email" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div id="CheckoutBillingAccordion2" class="col-md-12">
                                                <div class="checkout-box" data-bs-toggle="collapse" data-bs-target="#CheckoutTwo" aria-expanded="false" role="toolbar">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input visually-hidden" id="ship-to-different-address">
                                                        <label class="custom-control-label" for="ship-to-different-address">Ship to a different address?</label>
                                                    </div>
                                                </div>
                                                <div id="CheckoutTwo" class="collapse" data-bs-parent="#CheckoutBillingAccordion2">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="f_name2">First name <abbr class="required" title="required">*</abbr></label>
                                                                <input id="f_name2" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="l_name2">Last name <abbr class="required" title="required">*</abbr></label>
                                                                <input id="l_name2" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="com_name2">Company name (optional)</label>
                                                                <input id="com_name2" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mb-4">
                                                            <div class="form-group">
                                                                <label for="country2">Country <abbr class="required" title="required">*</abbr></label>
                                                                <select id="country2" class="form-control wide">
                                                                    <option>Bangladesh</option>
                                                                    <option>Afghanistan</option>
                                                                    <option>Albania</option>
                                                                    <option>Algeria</option>
                                                                    <option>Armenia</option>
                                                                    <option>India</option>
                                                                    <option>Pakistan</option>
                                                                    <option>England</option>
                                                                    <option>London</option>
                                                                    <option>London</option>
                                                                    <option>China</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="street-address2-3">Street address <abbr class="required" title="required">*</abbr></label>
                                                                <input id="street-address2-3" type="text" class="form-control" placeholder="House number and street name">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="street-address2-2" class="visually-hidden">Street address 2 <abbr class="required" title="required">*</abbr></label>
                                                                <input id="street-address2-2" type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="town3">Town / City <abbr class="required" title="required">*</abbr></label>
                                                                <input id="town3" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mb-4">
                                                            <div class="form-group">
                                                                <label for="district2">District <abbr class="required" title="required">*</abbr></label>
                                                                <select id="district2" class="form-control wide">
                                                                    <option>Afghanistan</option>
                                                                    <option>Albania</option>
                                                                    <option>Algeria</option>
                                                                    <option>Armenia</option>
                                                                    <option>India</option>
                                                                    <option>Pakistan</option>
                                                                    <option>England</option>
                                                                    <option>London</option>
                                                                    <option>London</option>
                                                                    <option>China</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="pz-code2">Postcode / ZIP (optional)</label>
                                                                <input id="pz-code2" type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group mb-0">
                                                    <label for="order-notes">Order notes (optional)</label>
                                                    <textarea id="order-notes" class="form-control" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--== End Billing Accordion ==-->
                        </div>
                        <div class="col-lg-6">
                            <!--== Start Order Details Accordion ==-->
                            <div class="checkout-order-details-wrap">
                                <div class="order-details-table-wrap table-responsive">
                                    <h2 class="title mb-25">Your order</h2>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">Product</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-body">
                                            <tr class="cart-item">
                                                <td class="product-name">Satin gown <span class="product-quantity">× 1</span></td>
                                                <td class="product-total">£69.99</td>
                                            </tr>
                                            <tr class="cart-item">
                                                <td class="product-name">Printed cotton t-shirt <span class="product-quantity">× 1</span></td>
                                                <td class="product-total">£20.00</td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="table-foot">
                                            <tr class="cart-subtotal">
                                                <th>Subtotal</th>
                                                <td>£89.99</td>
                                            </tr>
                                            <tr class="shipping">
                                                <th>Shipping</th>
                                                <td>Flat rate: £2.00</td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Total </th>
                                                <td>£91.99</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="shop-payment-method">
                                        <div id="PaymentMethodAccordion">
                                            <div class="card">
                                                <div class="card-header" id="check_payments">
                                                    <h5 class="title" data-bs-toggle="collapse" data-bs-target="#itemOne" aria-controls="itemOne" aria-expanded="true">Direct bank transfer</h5>
                                                </div>
                                                <div id="itemOne" class="collapse show" aria-labelledby="check_payments" data-bs-parent="#PaymentMethodAccordion">
                                                    <div class="card-body">
                                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="check_payments2">
                                                    <h5 class="title" data-bs-toggle="collapse" data-bs-target="#itemTwo" aria-controls="itemTwo" aria-expanded="false">Check payments</h5>
                                                </div>
                                                <div id="itemTwo" class="collapse" aria-labelledby="check_payments2" data-bs-parent="#PaymentMethodAccordion">
                                                    <div class="card-body">
                                                        <p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="check_payments3">
                                                    <h5 class="title" data-bs-toggle="collapse" data-bs-target="#itemThree" aria-controls="itemTwo" aria-expanded="false">Cash on delivery</h5>
                                                </div>
                                                <div id="itemThree" class="collapse" aria-labelledby="check_payments3" data-bs-parent="#PaymentMethodAccordion">
                                                    <div class="card-body">
                                                        <p>Pay with cash upon delivery.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header" id="check_payments4">
                                                    <h5 class="title" data-bs-toggle="collapse" data-bs-target="#itemFour" aria-controls="itemTwo" aria-expanded="false">PayPal Express Checkout</h5>
                                                </div>
                                                <div id="itemFour" class="collapse" aria-labelledby="check_payments4" data-bs-parent="#PaymentMethodAccordion">
                                                    <div class="card-body">
                                                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="p-text">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#/">privacy policy.</a></p>
                                        <div class="agree-policy">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" id="privacy" class="custom-control-input visually-hidden">
                                                <label for="privacy" class="custom-control-label">I have read and agree to the website terms and conditions <span class="required">*</span></label>
                                            </div>
                                        </div>
                                        <a href="account-login.php" class="btn-place-order">Place order</a>
                                    </div>
                                </div>
                            </div>
                            <!--== End Order Details Accordion ==-->
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Shopping Checkout Area Wrapper ==-->

        </main>

        <!--== Start Footer Area Wrapper ==-->
        <footer class="footer-area">
            <!--== Start Footer Main ==-->
            <div class="footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="widget-item">
                                <div class="widget-about">
                                    <a class="widget-logo" href="index.php">
                                        <img src="assets/images/mainlogone.png" width="95" height="68" alt="Logo">
                                    </a>
                                    <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-5 mt-md-0 mt-9">
                            <div class="widget-item">
                                <h4 class="widget-title">Information</h4>
                                <ul class="widget-nav">
                                    <li><a href="blog.php">Blog</a></li>
                                    <li><a href="about-us.php">About us</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="faq.php">Privacy</a></li>
                                    <li><a href="account-login.php">Login</a></li>
                                    <li><a href="product.php">Shop</a></li>
                                    <li><a href="my-account.php">My Account</a></li>
                                    <li><a href="faq.php">FAQs</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 mt-lg-0 mt-6">
                            <div class="widget-item">
                                <h4 class="widget-title">Social Info</h4>
                                <div class="widget-social">
                                    <a href="https://twitter.com/" target="_blank" rel="noopener"><i class="fa fa-twitter"></i></a>
                                    <a href="https://www.facebook.com/" target="_blank" rel="noopener"><i class="fa fa-facebook"></i></a>
                                    <a href="https://www.pinterest.com/" target="_blank" rel="noopener"><i class="fa fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--== End Footer Main ==-->

            <!--== Start Footer Bottom ==-->
             
            <!--== End Footer Bottom ==-->
        </footer>
        <!--== End Footer Area Wrapper ==-->

        <!--== Scroll Top Button ==-->
        <div id="scroll-to-top" class="scroll-to-top"><span class="fa fa-angle-up"></span></div>

        <!--== Start Product Quick Wishlist Modal ==-->
        <aside class="product-action-modal modal fade" id="action-WishlistModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="product-action-view-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                <i class="fa fa-times"></i>
                            </button>
                            <div class="modal-action-messages">
                                <i class="fa fa-check-square-o"></i> Added to wishlist successfully!
                            </div>
                            <div class="modal-action-product">
                                <div class="thumb">
                                    <img src="assets/images/shop/modal1.webp" alt="Organic Food Juice" width="466" height="320">
                                </div>
                                <h4 class="product-name"><a href="product-details.php">Readable content DX22</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!--== End Product Quick Wishlist Modal ==-->

        <!--== Start Product Quick Add Cart Modal ==-->
        <aside class="product-action-modal modal fade" id="action-CartAddModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="product-action-view-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                <i class="fa fa-times"></i>
                            </button>
                            <div class="modal-action-messages">
                                <i class="fa fa-check-square-o"></i> Added to cart successfully!
                            </div>
                            <div class="modal-action-product">
                                <div class="thumb">
                                    <img src="assets/images/shop/modal1.webp" alt="Organic Food Juice" width="466" height="320">
                                </div>
                                <h4 class="product-name"><a href="product-details.php">Readable content DX22</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!--== End Product Quick Add Cart Modal ==-->

        <!--== Start Aside Search Form ==-->
        <aside class="aside-search-box-wrapper offcanvas offcanvas-top" tabindex="-1" id="AsideOffcanvasSearch" aria-labelledby="offcanvasTopLabel">
            <div class="offcanvas-header">
                <h5 class="d-none" id="offcanvasTopLabel">Aside Search</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa fa-close"></i></button>
            </div>
            <div class="offcanvas-body">
                <div class="container pt--0 pb--0">
                    <div class="search-box-form-wrap">
                        <div class="search-note">
                            <p>Bắt đầu nhập và nhấn Enter để tìm kiếm</p>
                        </div>
                        <form action="#" method="post">
                            <div class="aside-search-form position-relative">
                                <label for="SearchInput" class="visually-hidden">Search</label>
                                <input id="SearchInput" type="search" class="form-control" placeholder="Tìm kiếm toàn bộ cửa hàng…">
                                <button class="search-button" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </aside>
        <!--== End Aside Search Form ==-->

        <!--== Start Product Quick View Modal ==-->
        <aside class="product-cart-view-modal modal fade" id="action-QuickViewModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="product-quick-view-content">
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                <span class="fa fa-close"></span>
                            </button>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <!--== Start Product Thumbnail Area ==-->
                                        <div class="product-single-thumb">
                                            <img src="assets/images/shop/quick-view1.webp" width="544" height="560" alt="Image-HasTech">
                                        </div>
                                        <!--== End Product Thumbnail Area ==-->
                                    </div>
                                    <div class="col-lg-6">
                                        <!--== Start Product Info Area ==-->
                                        <div class="product-details-content">
                                            <h5 class="product-details-collection">Premioum collection</h5>
                                            <h3 class="product-details-title">Offbline Instant Age Rewind Eraser.</h3>
                                            <div class="product-details-review mb-5">
                                                <div class="product-review-icon">
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                                <button type="button" class="product-review-show">150 reviews</button>
                                            </div>
                                            <p class="mb-6">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus, repellendus. Nam voluptate illo ut quia non sapiente provident alias quos laborum incidunt, earum accusamus, natus. Vero pariatur ut veniam
                                                sequi amet consectetur.</p>
                                            <div class="product-details-pro-qty">
                                                <div class="pro-qty">
                                                    <input type="text" title="Quantity" value="01">
                                                </div>
                                            </div>
                                            <div class="product-details-action">
                                                <h4 class="price">$254.22</h4>
                                                <div class="product-details-cart-wishlist">
                                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--== End Product Info Area ==-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!--== End Product Quick View Modal ==-->

        <!--== Start Aside Cart ==-->
        <aside class="aside-cart-wrapper offcanvas offcanvas-end" tabindex="-1" id="AsideOffcanvasCart" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h1 class="d-none" id="offcanvasRightLabel">Shopping Cart</h1>
                <button class="btn-aside-cart-close" data-bs-dismiss="offcanvas" aria-label="Close">Shopping Cart <i class="fa fa-chevron-right"></i></button>
            </div>
            <div class="offcanvas-body">
                <ul class="aside-cart-product-list">
                    <li class="aside-product-list-item">
                        <a href="#/" class="remove">×</a>
                        <a href="product-details.php">
                            <img src="assets/images/shop/cart1.webp" width="68" height="84" alt="Image">
                            <span class="product-title">Leather Mens Slipper</span>
                        </a>
                        <span class="product-price">1 × £69.99</span>
                    </li>
                    <li class="aside-product-list-item">
                        <a href="#/" class="remove">×</a>
                        <a href="product-details.php">
                            <img src="assets/images/shop/cart2.webp" width="68" height="84" alt="Image">
                            <span class="product-title">Quickiin Mens shoes</span>
                        </a>
                        <span class="product-price">1 × £20.00</span>
                    </li>
                </ul>
                <p class="cart-total"><span>Subtotal:</span><span class="amount">£89.99</span></p>
                <a class="btn-total" href="product-cart.php">View cart</a>
                <a class="btn-total" href="product-checkout.php">Checkout</a>
            </div>
        </aside>
        <!--== End Aside Cart ==-->

        <!--== Start Aside Menu ==-->
        <aside class="off-canvas-wrapper offcanvas offcanvas-start" tabindex="-1" id="AsideOffcanvasMenu" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h1 class="d-none" id="offcanvasExampleLabel">Aside Menu</h1>
                <button class="btn-menu-close" data-bs-dismiss="offcanvas" aria-label="Close">menu <i class="fa fa-chevron-left"></i></button>
            </div>
            <div class="offcanvas-body">
                <div id="offcanvasNav" class="offcanvas-menu-nav">
                    <ul>
                        <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="#">home</a>
                            <ul>
                                <li><a href="index.php">Home One</a></li>
                                <li><a href="index-two.php">Home Two</a></li>
                            </ul>
                        </li>
                        <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="about-us.php">about</a></li>
                        <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="#">shop</a>
                            <ul>
                                <li><a href="#" class="offcanvas-nav-item">Shop Layout</a>
                                    <ul>
                                        <li><a href="product.php">Shop 3 Column</a></li>
                                        <li><a href="product-four-columns.php">Shop 4 Column</a></li>
                                        <li><a href="product-left-sidebar.php">Shop Left Sidebar</a></li>
                                        <li><a href="product-right-sidebar.php">Shop Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" class="offcanvas-nav-item">Single Product</a>
                                    <ul>
                                        <li><a href="product-details-normal.php">Single Product Normal</a></li>
                                        <li><a href="product-details.php">Single Product Variable</a></li>
                                        <li><a href="product-details-group.php">Single Product Group</a></li>
                                        <li><a href="product-details-affiliate.php">Single Product Affiliate</a></li>
                                    </ul>
                                </li>
                                <li><a href="#" class="offcanvas-nav-item">Others Pages</a>
                                    <ul>
                                        <li><a href="product-cart.php">Shopping Cart</a></li>
                                        <li><a href="product-checkout.php">Checkout</a></li>
                                        <li><a href="product-wishlist.php">Wishlist</a></li>
                                        <li><a href="product-compare.php">Compare</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="#">Blog</a>
                            <ul>
                                <li><a class="offcanvas-nav-item" href="#">Blog Layout</a>
                                    <ul>
                                        <li><a href="blog.php">Blog Grid</a></li>
                                        <li><a href="blog-left-sidebar.php">Blog Left Sidebar</a></li>
                                        <li><a href="blog-right-sidebar.php">Blog Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li><a href="blog-details.php">Blog Details</a></li>
                            </ul>
                        </li>
                        <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="#">Pages</a>
                            <ul>
                                <li><a href="account-login.php">My Account</a></li>
                                <li><a href="faq.php">Frequently Questions</a></li>
                                <li><a href="page-not-found.php">Page Not Found</a></li>
                            </ul>
                        </li>
                        <li class="offcanvas-nav-parent"><a class="offcanvas-nav-item" href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </aside>
        <!--== End Aside Menu ==-->

    </div>
    <!--== Wrapper End ==-->

    <!-- JS Vendor, Plugins & Activation Script Files -->

    <!-- Vendors JS -->
    <script src="./assets/js/vendor/modernizr-3.11.7.min.js"></script>
    <script src="./assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="./assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="./assets/js/vendor/bootstrap.bundle.min.js"></script>

    <!-- Plugins JS -->
    <script src="./assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="./assets/js/plugins/fancybox.min.js"></script>
    <script src="./assets/js/plugins/jquery.nice-select.min.js"></script>

    <!-- Custom Main JS -->
    <script src="./assets/js/main.js"></script>

</body>

</html>