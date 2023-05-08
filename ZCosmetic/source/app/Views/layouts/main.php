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
    <link rel="stylesheet" href="../../assets/css/pager.css">

    <!-- Style CSS -->
    <link rel="stylesheet" href="../../assets/css/style.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <style>
        .swal2-popup {
            padding: 60px 10px !important;
        }
        .shorten-text {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
            word-break: break-all;
        }
        .shorten-text.two-row {
            -webkit-line-clamp: 2;
            word-break: break-word;
        }
        .shorten-text.three-row {
            -webkit-line-clamp: 2;
            word-break: break-word;
        }
    </style>
</head>
<?php
    //include(FCPATH . '../source/app/Helpers/DatabaseHelper.php');
    $db = new DatabaseHelper();
    $id_user = 1;
    $cart = $db->executeReader('CALL sp_getCart(?);', array($id_user));
?>
<body>
    <!--== Wrapper Start ==-->
    <div class="wrapper">

        <!--== Start Header Wrapper ==-->
        <header id="header">
            <?= $this->include('partials/header') ?>
        </header>
        <!--== End Header Wrapper ==-->
        <main class="main-content">
            <?= $this->renderSection('content') ?>
        </main>
        <!--== Start Footer Area Wrapper ==-->
        <footer id="footer">
            <?= $this->include('partials/footer') ?>
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
        <!-- <aside class="product-action-modal modal fade" id="action-CartAddModal" tabindex="-1" aria-hidden="true">
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
        </aside> -->
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
                            <p>Start typing and press Enter to search</p>
                        </div>
                        <form action="#" method="post">
                            <div class="aside-search-form position-relative">
                                <label for="SearchInput" class="visually-hidden">Search</label>
                                <input id="SearchInput" type="search" class="form-control" placeholder="Search entire store…">
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
        <aside style="width:35%;" class="aside-cart-wrapper offcanvas offcanvas-end" tabindex="-1" id="AsideOffcanvasCart" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h1 class="d-none" id="offcanvasRightLabel">Giỏ Hàng</h1>
                <button class="btn-aside-cart-close" data-bs-dismiss="offcanvas" aria-label="Close">Giỏ Hàng <i class="fa fa-chevron-right"></i></button>
            </div>
            <div class="offcanvas-body" id="cart-list">
                <?php 
                    if(count($cart) <= 0) {
                        ?>
                        <div style="    padding-top: 20px; padding-bottom: 60px; text-align: center; color: orange;">Giỏ hàng đang rỗng</div>
                        <?php
                    }
                    else {
                        ?>
                        <ul class="aside-cart-product-list">
                            <?php
                            $total = 0;
                            foreach($cart as $sp) {
                                $price = $sp->Gia - ($sp->GiamGia / 100.0) * $sp->Gia;
                                $total += $price * $sp->SoLuong;
                                ?>
                                <li class="aside-product-list-item">
                                    <a href="#/" class="remove">×</a>
                                    <a href="/Home/Product?id=<?= $sp->Ma ?>">
                                        <img src="../../assets/Product_Images/<?= $sp->MaHinh.'.jpg' ?>" width="68" height="84" alt="Image">
                                        <span class="product-title shorten-text two-row"><?= $sp->TenSanPham ?></span>
                                    </a>
                                    <span class="product-price"><?= $sp->SoLuong.' x '.number_format($price, 0, ',', '.').' VNĐ' ?><span style="margin-left: 10px; color: red; text-decoration: line-through;"><?php if($sp->GiamGia > 0) { echo number_format($sp->Gia, 0, ',', '.').' VNĐ'; } ?></span></span>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <p class="cart-total"><span>Subtotal:</span><span class="amount"><?= number_format($total, 0, ',', '.').' VNĐ' ?></span></p>
                        <?php
                    }
                ?>
                
                <a class="btn-total" href="/Pages/Cart">Xem Giỏ Hàng</a>
                <a class="btn-total" href="/Pages/Checkout">Thanh Toán</a>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom Main JS -->
    <script src="../../assets/js/main.js"></script>
    <script>
        function addCart($id_product, $quantity, $id_user) {
            $.ajax({
                type: 'POST',
                url: "<?= base_url('Ajax/AddCart') ?>",
                dataType: 'json',
                data: {
                    id_product: $id_product,
                    quantity: $quantity,
                    id_user: $id_user
                },
                success: function(data) {
                    console.log(data);
                    if(data.msg == "success") {
                        Swal.fire({
                            // position: '',
                            icon: 'success',
                            title: 'Thêm vào giỏ hàng thành công',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        updateCartCount(data);
                    }
                    else {
                        Swal.fire({
                            // position: '',
                            icon: 'error',
                            title: 'Thêm vào giỏ hàng thất bại',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            });
        }
        function removeCart($id_product, $id_user) {
            Swal.fire({
            title: 'Bạn có chắc chắn?',
            text: "Bạn đang thực hiện xóa sản phẩm khỏi giỏ hàng!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Quay lại'
            }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: "<?= base_url('/Ajax/RemoveCart') ?>",
                            dataType: 'json',
                            data: {
                                id_product: $id_product,
                                id_user: $id_user
                            },
                            success: function(data) {
                                console.log(data);
                                if(data.msg == "success") {
                                    Swal.fire({
                                        // position: '',
                                        icon: 'success',
                                        title: 'Xóa khỏi giỏ hàng thành công',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    $('#cart-count').html(data.quantity);
                                    $('#rm_' + $id_product).parent().parent().remove();
                                    if($('.tbody-item').length == 0) {
                                        $('.section-space').remove();
                                        $('#container-cart').append('<div style="text-align: center; color:orange; font-weight: bold; min-height: 400px; margin-top: 40px; user-select: none;">\
                                                                        Giỏ hàng đang rỗng\
                                                                    </div>');
                                    }
                                    updateTotalAllCart($id_user);
                                }
                                else {
                                    Swal.fire({
                                        // position: '',
                                        icon: 'error',
                                        title: 'Xóa khỏi giỏ hàng thất bại',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            }
                        });
                    }
                    }
                )
        }
        function updateCart($id_product, $quantity, $id_user, $price) {
            $.ajax({
                type: 'POST',
                url: "<?= base_url('Ajax/UpdateCart') ?>",
                dataType: 'json',
                data: {
                    id_product: $id_product,
                    quantity: $quantity,
                    id_user: $id_user,
                    price: $price
                },
                success: function(data) {
                    console.log(data);
                    if(data.msg == "success") {
                        $('#pr_' + $id_product).html((new Intl.NumberFormat('en-DE').format(data.total_price)) + ' VNĐ');
                        updateTotalAllCart($id_user);
                    }
                }
            });
        }
        function updateCartCount($arr) {
            $('#cart-count').html($arr.quantity);
            $('#cart-list').html($arr.html);
        }
        $(document).ready(function() {
            $('#cart-count').html(<?= count($cart) ?>);
        });
        function updateTotalAllCart($id_user) {
            $.ajax({
                type: 'POST',
                url: "<?= base_url('Ajax/GetTotalCart') ?>",
                dataType: 'json',
                data: {
                    id_user: $id_user
                },
                success: function(data) {
                    console.log(data);
                    if(data.msg == "success") {
                        $('.amount').html((new Intl.NumberFormat('en-DE').format(data.total_cart)) + ' VNĐ');
                    }
                }
            });
        }
    </script>

</body>

</html>