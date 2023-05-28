<?= $this->extend('layouts/main') ?>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>

<?php
    include(FCPATH . '../source/app/Helpers/DatabaseHelper.php');
    session_start();
    $id_user = isset($_SESSION["MaTaiKhoan"]) ? $_SESSION["MaTaiKhoan"] : 0;
    $db = new DatabaseHelper();
    $san_pham = $db->executeReader('CALL sp_SanPhamNoiBat()');
    $san_pham_temp = $db->executeReader('CALL sp_SanPhamGiamGia()');
    $san_pham_giam_gia = [];
    $so_luong_sp_giam_gia = count($san_pham_temp);
    if($so_luong_sp_giam_gia <= 6) {
    $san_pham_giam_gia = $san_pham_temp;
    }
    else {
    $sl = 0;
    $exists = '';
        while($sl < 6) {
        $pos = rand(0, $so_luong_sp_giam_gia - 1);
            if(!str_contains($exists, $pos)) {
            $san_pham_giam_gia[] = $san_pham_temp[$pos];
                $exists.=','.$pos;
            $sl++;
        }
    }
}
?>

<!--== Start Hero Area Wrapper ==-->
<section class="hero-slider-area position-relative">
    <div class="swiper hero-slider-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide hero-slide-item">
                <div class="container">
                    <div class="row align-items-center position-relative">
                        <div class="col-12 col-md-6">
                            <div class="hero-slide-content">
                                <div class="hero-slide-text-img"><img src="../../assets/images/slider/text-theme.webp"
                                        width="427" height="232" alt="Image"></div>
                                <h2 class="hero-slide-title">CLEAN FRESH</h2>
                                <p class="hero-slide-desc">Chất Lượng Thật - Giá Trị Thật.</p>
                                <a class="btn btn-border-dark" href="product.php">MUA NGAY</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="hero-slide-thumb">
                                <img src="https://htmldemo.net/brancy/brancy/assets/images/slider/slider1.webp"
                                    width="841" height="832" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-slide-text-shape"><img src="../../assets/images/slider/text1.webp" width="70"
                        height="955" alt="Image"></div>
                <div class="hero-slide-social-shape"></div>
            </div>
            <div class="swiper-slide hero-slide-item">
                <div class="container">
                    <div class="row align-items-center position-relative">
                        <div class="col-12 col-md-6">
                            <div class="hero-slide-content">
                                <div class="hero-slide-text-img"><img src="../../assets/images/slider/text-theme.webp"
                                        width="427" height="232" alt="Image"></div>
                                <h2 class="hero-slide-title">Hasagi Cosmetic & Beauty</h2>
                                <p class="hero-slide-desc">Nhà cung cấp mỹ phẩm tốt nhất.</p>
                                <a class="btn btn-border-dark" href="product.php">MUA NGAY</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="hero-slide-thumb">
                                <img src="https://template.web30s.com.vn/webshop_135/static/picture/about1.webp"
                                    width="841" height="832" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-slide-text-shape"><img src="../../assets/images/slider/text1.webp" width="70"
                        height="955" alt="Image"></div>
                <div class="hero-slide-social-shape"></div>
            </div>
        </div>
        <!--== Add Pagination ==-->
        <div class="hero-slider-pagination"></div>
    </div>
    <div class="hero-slide-social-media">
        <a href="https://www.pinterest.com/" target="_blank" rel="noopener"><i class="fa fa-pinterest-p"></i></a>
        <a href="https://twitter.com/" target="_blank" rel="noopener"><i class="fa fa-twitter"></i></a>
        <a href="https://www.facebook.com/" target="_blank" rel="noopener"><i class="fa fa-facebook"></i></a>
    </div>
</section>
<!--== End Hero Area Wrapper ==-->

<!--== Start Product Category Area Wrapper ==-->
<section class="section-space pb-0">
    <div class="container">
        <div class="row g-3 g-sm-6">
            <div class="col-6 col-lg-4 col-lg-2 col-xl-2">
                <!--== Start Product Category Item ==-->
                <a href="product.php" class="product-category-item">
                    <img class="icon" src="../../assets/images/shop/category/1.webp" width="70" height="80"
                        alt="Image-HasTech">
                    <h3 class="title">Mỹ Phẩm</h3>
                    <span class="flag-new">MỚI</span>
                </a>
                <!--== End Product Category Item ==-->
            </div>
            <div class="col-6 col-lg-4 col-lg-2 col-xl-2">
                <!--== Start Product Category Item ==-->
                <a href="product.php" class="product-category-item" data-bg-color="#FFEDB4">
                    <img class="icon" src="../../assets/images/shop/category/2.webp" width="80" height="80"
                        alt="Image-HasTech">
                    <h3 class="title">Chăm Sóc Da</h3>
                </a>
                <!--== End Product Category Item ==-->
            </div>
            <div class="col-6 col-lg-4 col-lg-2 col-xl-2 mt-lg-0 mt-sm-6 mt-4">
                <!--== Start Product Category Item ==-->
                <a href="product.php" class="product-category-item" data-bg-color="#DFE4FF">
                    <img class="icon" src="../../assets/images/shop/category/3.webp" width="80" height="80"
                        alt="Image-HasTech">
                    <h3 class="title">Son Môi</h3>
                </a>
                <!--== End Product Category Item ==-->
            </div>
            <div class="col-6 col-lg-4 col-lg-2 col-xl-2 mt-xl-0 mt-sm-6 mt-4">
                <!--== Start Product Category Item ==-->
                <a href="product.php" class="product-category-item" data-bg-color="#FFEACC">
                    <img class="icon" src="../../assets/images/shop/category/4.webp" width="80" height="80"
                        alt="Image-HasTech">
                    <h3 class="title">Sữa Rửa Mặt</h3>
                    <span data-bg-color="#835BF4" class="flag-new">GIẢM GIÁ</span>
                </a>
                <!--== End Product Category Item ==-->
            </div>
            <div class="col-6 col-lg-4 col-lg-2 col-xl-2 mt-xl-0 mt-sm-6 mt-4">
                <!--== Start Product Category Item ==-->
                <a href="product.php" class="product-category-item" data-bg-color="#FFDAE0">
                    <img class="icon" src="../../assets/images/shop/category/5.webp" width="80" height="80"
                        alt="Image-HasTech">
                    <h3 class="title">Phấn Trang Điểm</h3>
                </a>
                <!--== End Product Category Item ==-->
            </div>
            <div class="col-6 col-lg-4 col-lg-2 col-xl-2 mt-xl-0 mt-sm-6 mt-4">
                <!--== Start Product Category Item ==-->
                <a href="product.php" class="product-category-item" data-bg-color="#FFF3DA">
                    <img class="icon" src="../../assets/images/shop/category/6.webp" width="80" height="80"
                        alt="Image-HasTech">
                    <h3 class="title">Sản Phẩm Thiên Nhiên</h3>
                </a>
                <!--== End Product Category Item ==-->
            </div>
        </div>
    </div>
</section>
<!--== End Product Category Area Wrapper ==-->

<!--== Start Product Area Wrapper ==-->
<section class="section-space">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2 class="title">Sản phẩm nổi bật</h2>
                    <p>Sản phẩm bên cửa hàng luôn được cập nhật trong thời gian nhanh nhất trên thị trường</p>
                </div>
            </div>
        </div>
        <div class="row mb-n4 mb-sm-n10 g-3 g-sm-6">
            <?php
            if (count($san_pham) > 0) {
                foreach ($san_pham as $sp) {
            ?>
                <div class="col-6 col-lg-4 mb-4 mb-sm-9">
                    <div class="product-item">
                        <div class="product-thumb">
                            <a class="d-block" href="Home/Product?id=<?= $sp->Ma ?>">
                                <img src="../../assets/Product_Images/<?= $sp->MaHinh.'.jpg' ?>" width="370" height="450" alt="Image-HasTech">
                            </a>
                            <span class="flag-new">Mới</span>
                            <div class="product-action">
                                <button type="button" class="product-action-btn action-btn-quick-view" data-id-product="<?= $sp->Ma ?>" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" onclick="addCart(<?= $sp->Ma ?>, 1, <?= $id_user ?>)" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                    <span>Thêm vào giỏ</span>
                                </button>
                                <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                            </div>
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
                                <div class="reviews">150 xem</div>
                            </div>
                            <h4 class="title shorten-text"><a href="Home/Product?id=<?= $sp->Ma ?>"><?php echo (strlen($sp->TenSanPham) > 50) ? substr($sp->TenSanPham, 0, 50).'...' : $sp->TenSanPham ?></a></h4>
                            <div class="prices">
                                <span class="price"><?php echo number_format($sp->Gia - ($sp->GiamGia / 100.0) * $sp->Gia, 0, ',', '.').' VNĐ' ?></span>
                                <?php
                                if($sp->GiamGia != 0) {
                                    ?>
                                    <span class="price-old"><?php echo number_format($sp->Gia, 0, ',', '.').' VNĐ' ?></span>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            }
            ?>

        </div>
    </div>
</section>
<!--== End Product Area Wrapper ==-->


<section class="section-space">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2 class="title">Sản Phẩm Giảm Giá</h2>
                    <p>Sản phẩm giảm giá giành ưu đãi, hỗ trợ tốt nhất cho khách hàng</p>
                </div>
            </div>
        </div>
        <div class="row mb-n4 mb-sm-n10 g-3 g-sm-6">
            <?php
            if (count($san_pham_giam_gia) > 0) {
                foreach ($san_pham_giam_gia as $sp) {
            ?>
                <div class="col-6 col-lg-4 mb-4 mb-sm-9">
                    <div class="product-item">
                        <div class="product-thumb">
                            <a class="d-block" href="/Home/Product?id=<?= $sp->Ma ?>">
                                <img src="../../assets/Product_Images/<?= $sp->MaHinh.'.jpg' ?>" width="370" height="450" alt="Image-HasTech">
                            </a>
                            <span class="flag-new">Giảm Giá</span>
                            <div class="product-action">
                                <button type="button" class="product-action-btn action-btn-quick-view" data-id-product="<?= $sp->Ma ?>" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                    <i class="fa fa-expand"></i>
                                </button>
                                <button type="button" class="product-action-btn action-btn-cart" onclick="addCart(<?= $sp->Ma ?>, 1, <?= $id_user ?>)" data-id-sp="<?= $sp->Ma ?>" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                    <span>Thêm vào giỏ</span>
                                </button>
                                <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                    <i class="fa fa-heart-o"></i>
                                </button>
                            </div>
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
                                <div class="reviews">150 xem</div>
                            </div>
                            <h4 class="title"><a href="product-details.php"><?php echo (strlen($sp->TenSanPham) > 50) ? substr($sp->TenSanPham, 0, 50).'...' : $sp->TenSanPham ?></a></h4>
                            <div class="prices">
                                <span class="price"><?php echo number_format($sp->Gia - ($sp->GiamGia / 100.0) * $sp->Gia, 0, ',', '.').' VNĐ' ?></span>
                                <?php
                                if($sp->GiamGia != 0) {
                                    ?>
                                    <span class="price-old"><?php echo number_format($sp->Gia, 0, ',', '.').' VNĐ' ?></span>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            }
            ?>

        </div>
    </div>
</section>

<!--== Start News Letter Area Wrapper ==-->
<section class="section-space pt-0">
    <div class="container">
        <div class="newsletter-content-wrap" data-bg-img="../assets/images/photos/bg1.webp">
            <div class="newsletter-content">
                <div class="section-title mb-0">
                    <h2>Tham Gia Với Chúng Tôi</h2>
                    <p>Cập nhật thông tin khuyến mãi và nhận quyền lợi giảm giá riêng biệt.</p>
                </div>
            </div>
            <div class="newsletter-form">
                <form>
                    <input type="email" class="form-control" placeholder="Email của bạn">
                    <button class="btn-submit" type="submit"><i class="fa fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>
</section>
<!--== End News Letter Area Wrapper ==-->
<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->

<?= $this->endSection() ?>