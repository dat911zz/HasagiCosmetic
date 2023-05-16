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
            <section class="page-header-area pt-10 pb-9" data-bg-color="#FFF3DA">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="page-header-st3-content text-center text-md-start">
                                <ol class="breadcrumb justify-content-center justify-content-md-start">
                                    <li class="breadcrumb-item"><a class="text-dark" href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active text-dark" aria-current="page">Product Detail</li>
                                </ol>
                                <h2 class="page-header-title">Product Detail</h2>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h5 class="showing-pagination-results mt-5 mt-md-9 text-center text-md-end">Showing Single Product</h5>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Page Header Area Wrapper ==-->

            <!--== Start Product Details Area Wrapper ==-->
            <section class="section-space">
                <div class="container">
                    <div class="row product-details">
                        <div class="col-lg-6">
                            <div class="product-details-thumb">
                                <img src="../../assets/images/shop/product-details/1.webp" width="570" height="693" alt="Image">
                                <span class="flag-new">new</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details-content">
                                <h5 class="product-details-collection">Premioum collection</h5>
                                <h3 class="product-details-title">Offbline Instant Age Rewind Eraser.</h3>
                                <div class="product-details-review">
                                    <div class="product-review-icon">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                    <button type="button" class="product-review-show">150 reviews</button>
                                </div>
                                <div class="product-details-qty-list">
                                    <div class="qty-list-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="qtyList1" checked>
                                        <label class="form-check-label" for="qtyList1">15 ml bottol <b>$250.00</b></label>
                                    </div>

                                    <div class="qty-list-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="qtyList2">
                                        <label class="form-check-label" for="qtyList2">25 ml bottol <b>$350.00</b> <span class="extra-offer">extra 25%</span></label>
                                    </div>
                                </div>
                                <div class="product-details-pro-qty">
                                    <div class="pro-qty">
                                        <input type="text" title="Quantity" value="01">
                                    </div>
                                </div>
                                <div class="product-details-shipping-cost">
                                    <input class="form-check-input" type="checkbox" value="" id="ShippingCost" checked>
                                    <label class="form-check-label" for="ShippingCost">Shipping from USA, Shipping Fees $4.22</label>
                                </div>
                                <div class="product-details-action">
                                    <h4 class="price">$254.22</h4>
                                    <div class="product-details-cart-wishlist">
                                        <button type="button" class="btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal"><i class="fa fa-heart-o"></i></button>
                                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="nav product-details-nav" id="product-details-nav-tab" role="tablist">
                                <button class="nav-link" id="specification-tab" data-bs-toggle="tab" data-bs-target="#specification" type="button" role="tab" aria-controls="specification" aria-selected="false">Specification</button>
                                <button class="nav-link active" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="true">Review</button>
                            </div>
                            <div class="tab-content" id="product-details-nav-tabContent">
                                <div class="tab-pane" id="specification" role="tabpanel" aria-labelledby="specification-tab">
                                    <ul class="product-details-info-wrap">
                                        <li><span>Weight</span>
                                            <p>250 g</p>
                                        </li>
                                        <li><span>Dimensions</span>
                                            <p>10 x 10 x 15 cm</p>
                                        </li>
                                        <li><span>Materials</span>
                                            <p>60% cotton, 40% polyester</p>
                                        </li>
                                        <li><span>Other Info</span>
                                            <p>American heirloom jean shorts pug seitan letterpress</p>
                                        </li>
                                    </ul>

                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius velit corporis quo voluptate culpa soluta, esse accusamus, sunt quia omnis amet temporibus sapiente harum quam itaque libero tempore. Ipsum, ducimus. lorem
                                    </p>
                                </div>

                                <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                                    <!--== Start Reviews Content Item ==-->
                                    <div class="product-review-item">
                                        <div class="product-review-top">
                                            <div class="product-review-thumb">
                                                <img src="../../assets/images/shop/product-details/comment1.webp" alt="Images">
                                            </div>
                                            <div class="product-review-content">
                                                <span class="product-review-name">Tomas Doe</span>
                                                <span class="product-review-designation">Delveloper</span>
                                                <div class="product-review-icon">
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra amet, sodales faucibus nibh. Vivamus amet potenti ultricies nunc gravida duis. Nascetur scelerisque massa sodales.</p>
                                        <button type="button" class="review-reply"><i class="fa fa fa-undo"></i></button>
                                    </div>
                                    <!--== End Reviews Content Item ==-->

                                    <!--== Start Reviews Content Item ==-->
                                    <div class="product-review-item product-review-reply">
                                        <div class="product-review-top">
                                            <div class="product-review-thumb">
                                                <img src="../../assets/images/shop/product-details/comment2.webp" alt="Images">
                                            </div>
                                            <div class="product-review-content">
                                                <span class="product-review-name">Tomas Doe</span>
                                                <span class="product-review-designation">Delveloper</span>
                                                <div class="product-review-icon">
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra amet, sodales faucibus nibh. Vivamus amet potenti ultricies nunc gravida duis. Nascetur scelerisque massa sodales.</p>
                                        <button type="button" class="review-reply"><i class="fa fa fa-undo"></i></button>
                                    </div>
                                    <!--== End Reviews Content Item ==-->

                                    <!--== Start Reviews Content Item ==-->
                                    <div class="product-review-item mb-0">
                                        <div class="product-review-top">
                                            <div class="product-review-thumb">
                                                <img src="../../assets/images/shop/product-details/comment3.webp" alt="Images">
                                            </div>
                                            <div class="product-review-content">
                                                <span class="product-review-name">Tomas Doe</span>
                                                <span class="product-review-designation">Delveloper</span>
                                                <div class="product-review-icon">
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra amet, sodales faucibus nibh. Vivamus amet potenti ultricies nunc gravida duis. Nascetur scelerisque massa sodales.</p>
                                        <button type="button" class="review-reply"><i class="fa fa fa-undo"></i></button>
                                    </div>
                                    <!--== End Reviews Content Item ==-->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="product-reviews-form-wrap">
                                <h4 class="product-form-title">Leave a replay</h4>
                                <div class="product-reviews-form">
                                    <form action="#">
                                        <div class="form-input-item">
                                            <textarea class="form-control" placeholder="Enter you feedback"></textarea>
                                        </div>
                                        <div class="form-input-item">
                                            <input class="form-control" type="text" placeholder="Full Name">
                                        </div>
                                        <div class="form-input-item">
                                            <input class="form-control" type="email" placeholder="Email Address">
                                        </div>
                                        <div class="form-input-item">
                                            <div class="form-ratings-item">
                                                <select id="product-review-form-rating-select" class="select-ratings">
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04</option>
                                                    <option value="5">05</option>
                                                </select>
                                                <span class="title">Provide Your Ratings</span>
                                                <div class="product-ratingsform-form-wrap">
                                                    <div class="product-ratingsform-form-icon">
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div id="product-review-form-rating" class="product-ratingsform-form-icon-fill">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="reviews-form-checkbox">
                                                <input class="form-check-input" type="checkbox" value="" id="ReviewsFormCheckbox" checked>
                                                <label class="form-check-label" for="ReviewsFormCheckbox">Provide ratings anonymously.</label>
                                            </div>
                                        </div>
                                        <div class="form-input-item mb-0">
                                            <button type="submit" class="btn">SUBMIT</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Product Details Area Wrapper ==-->

            <!--== Start Product Banner Area Wrapper ==-->
            <div class="container">
                <!--== Start Product Category Item ==-->
                <a href="product.php" class="product-banner-item">
                    <img src="../../assets/images/shop/banner/7.webp" width="1170" height="240" alt="Image-HasTech">
                </a>
                <!--== End Product Category Item ==-->
            </div>
            <!--== End Product Banner Area Wrapper ==-->

            <!--== Start Product Area Wrapper ==-->
            <section class="section-space">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <h2 class="title">Related Products</h2>
                                <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-n10">
                        <div class="col-12">
                            <div class="swiper related-product-slide-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide mb-10">
                                        <!--== Start Product Item ==-->
                                        <div class="product-item product-st2-item">
                                            <div class="product-thumb">
                                                <a class="d-block" href="product-details.php">
                                                    <img src="../../assets/images/shop/8.webp" width="370" height="450" alt="Image-HasTech">
                                                </a>
                                                <span class="flag-new">new</span>
                                            </div>
                                            <div class="product-info">
                                                <div class="product-rating">
                                                    <div class="rating">
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </div>
                                                    <div class="reviews">150 reviews</div>
                                                </div>
                                                <h4 class="title"><a href="product-details.php">Readable content DX22</a></h4>
                                                <div class="prices">
                                                    <span class="price">$210.00</span>
                                                    <span class="price-old">300.00</span>
                                                </div>
                                                <div class="product-action">
                                                    <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                                        <span>Add to cart</span>
                                                    </button>
                                                    <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                                        <i class="fa fa-expand"></i>
                                                    </button>
                                                    <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--== End prPduct Item ==-->
                                    </div>
                                    <div class="swiper-slide mb-10">
                                        <!--== Start Product Item ==-->
                                        <div class="product-item product-st2-item">
                                            <div class="product-thumb">
                                                <a class="d-block" href="product-details.php">
                                                    <img src="../../assets/images/shop/7.webp" width="370" height="450" alt="Image-HasTech">
                                                </a>
                                                <span class="flag-new">new</span>
                                            </div>
                                            <div class="product-info">
                                                <div class="product-rating">
                                                    <div class="rating">
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </div>
                                                    <div class="reviews">150 reviews</div>
                                                </div>
                                                <h4 class="title"><a href="product-details.php">Readable content DX22</a></h4>
                                                <div class="prices">
                                                    <span class="price">$210.00</span>
                                                    <span class="price-old">300.00</span>
                                                </div>
                                                <div class="product-action">
                                                    <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                                        <span>Add to cart</span>
                                                    </button>
                                                    <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                                        <i class="fa fa-expand"></i>
                                                    </button>
                                                    <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--== End prPduct Item ==-->
                                    </div>
                                    <div class="swiper-slide mb-10">
                                        <!--== Start Product Item ==-->
                                        <div class="product-item product-st2-item">
                                            <div class="product-thumb">
                                                <a class="d-block" href="product-details.php">
                                                    <img src="../../assets/images/shop/5.webp" width="370" height="450" alt="Image-HasTech">
                                                </a>
                                                <span class="flag-new">new</span>
                                            </div>
                                            <div class="product-info">
                                                <div class="product-rating">
                                                    <div class="rating">
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-half-o"></i>
                                                    </div>
                                                    <div class="reviews">150 reviews</div>
                                                </div>
                                                <h4 class="title"><a href="product-details.php">Readable content DX22</a></h4>
                                                <div class="prices">
                                                    <span class="price">$210.00</span>
                                                    <span class="price-old">300.00</span>
                                                </div>
                                                <div class="product-action">
                                                    <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                                        <span>Add to cart</span>
                                                    </button>
                                                    <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                                        <i class="fa fa-expand"></i>
                                                    </button>
                                                    <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                                        <i class="fa fa-heart-o"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--== End prPduct Item ==-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Product Area Wrapper ==-->

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
                                        <img src="../../assets/images/logo.webp" width="95" height="68" alt="Logo">
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
                                    <img src="../../assets/images/shop/modal1.webp" alt="Organic Food Juice" width="466" height="320">
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
                                    <img src="../../assets/images/shop/modal1.webp" alt="Organic Food Juice" width="466" height="320">
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
                                            <img src="../../assets/images/shop/quick-view1.webp" width="544" height="560" alt="Image-HasTech">
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
                            <img src="../../assets/images/shop/cart1.webp" width="68" height="84" alt="Image">
                            <span class="product-title">Leather Mens Slipper</span>
                        </a>
                        <span class="product-price">1 × £69.99</span>
                    </li>
                    <li class="aside-product-list-item">
                        <a href="#/" class="remove">×</a>
                        <a href="product-details.php">
                            <img src="../../assets/images/shop/cart2.webp" width="68" height="84" alt="Image">
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
    <script src="../../assets/js/vendor/modernizr-3.11.7.min.js"></script>
    <script src="../../assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="../../assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="../../assets/js/vendor/bootstrap.bundle.min.js"></script>

    <!-- Plugins JS -->
    <script src="../../assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="../../assets/js/plugins/fancybox.min.js"></script>
    <script src="../../assets/js/plugins/jquery.nice-select.min.js"></script>

    <!-- Custom Main JS -->
    <script src="../../assets/js/main.js"></script>

</body>

</html>