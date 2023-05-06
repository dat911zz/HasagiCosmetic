
<?php
    include(FCPATH . '../source/app/Helpers/DatabaseHelper.php');
    include(FCPATH . '../source/app/Helpers/Pager.php');
    $db = new DatabaseHelper();
    $count = $db->executeReader('SELECT COUNT(*) AS "count" FROM tbl_sanpham')[0]->count;

    $pager = new Pager();
    $lim = 9;
    $posStart = $pager->getStart($lim);
    $maximumPage = $pager->getMaximumPage($count, $lim);

    $curPage = $_GET["page"];
    $btnPage = $pager->getButtonPage($curPage, $maximumPage);

    $san_pham = $db->executeReader("SELECT tbl_sanpham.*, tbl_gia.Gia, tbl_giasanpham.*
                                    FROM tbl_sanpham, tbl_giasanpham, tbl_gia
                                    WHERE tbl_sanpham.Ma = tbl_giasanpham.MaSanPham and tbl_giasanpham.MaGia = tbl_gia.Ma and tbl_giasanpham.NgayHetHieuLuc is null limit $posStart, $lim");
?>

<?= $this->extend('layouts/main') ?>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>

<main class="main-content">

    <!--== Start Page Header Area Wrapper ==-->
    <section class="page-header-area pt-10 pb-9" data-bg-color="#FFF3DA">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="page-header-st3-content text-center text-md-start">
                        <ol class="breadcrumb justify-content-center justify-content-md-start">
                            <li class="breadcrumb-item"><a class="text-dark" href="index.php">Trang Chủ</a></li>
                            <li class="breadcrumb-item active text-dark" aria-current="page">Sản Phẩm</li>
                        </ol>
                        <h2 class="page-header-title">Tất Cả Sản Phẩm</h2>
                    </div>
                </div>
                <div class="col-md-7">
                    <h5 class="showing-pagination-results mt-5 mt-md-9 text-center text-md-end">Hiển thị 09 sản phẩm</h5>
                </div>
            </div>
        </div>
    </section>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="section-space">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-9">
                    <div class="row g-3 g-sm-6">
                        <?php
                            foreach($san_pham as $sp) {
                            ?>
                            <div class="col-6 col-lg-4 col-xl-4 mb-4 mb-sm-8">
                                <div class="product-item product-st3-item">
                                    <div class="product-thumb">
                                        <a class="d-block" href="/Home/Product?id=<?= $sp->Ma ?>">
                                            <img src="../../assets/Product_Images/<?= $sp->MaHinh.'.jpg' ?>" width="370" height="450" alt="Image-HasTech">
                                        </a>
                                        <span class="flag-new">mới</span>
                                        <div class="product-action">
                                            <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                                <i class="fa fa-expand"></i>
                                            </button>
                                            <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
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
                                            <div class="reviews">150 reviews</div>
                                        </div>
                                        <h4 class="title"><a href="Home/Product?id=<?= $sp->Ma ?>"><?= (strlen($sp->TenSanPham) > 50) ? substr($sp->TenSanPham, 0, 50).'...' : $sp->TenSanPham ?></a></h4>
                                        <div class="prices">
                                            <span class="price"><?= number_format($sp->Gia - ($sp->GiamGia / 100.0) * $sp->Gia, 0, ',', '.').' VNĐ' ?></span>
                                            <?php
                                            if($sp->GiamGia != 0) {
                                                ?>
                                                <span class="price-old"><?= number_format($sp->Gia, 0, ',', '.').' VNĐ' ?></span>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="product-action-bottom">
                                        <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                            <i class="fa fa-expand"></i>
                                        </button>
                                        <button type="button" class="product-action-btn action-btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal">
                                            <i class="fa fa-heart-o"></i>
                                        </button>
                                        <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                            <span>Thêm vào giỏ</span>
                                        </button>
                                    </div>
                                </div>
                                <!--== End prPduct Item ==-->
                            </div>
                            <?php
                            }
                        ?>
                        <!-- Pager -->
                        <div class="col-12">
                            <?= $btnPage ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="product-sidebar-widget">
                        <div class="product-widget-search">
                            <form action="#">
                                <input type="search" placeholder="Search Here">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="product-widget">
                            <h4 class="product-widget-title">Price Filter</h4>
                            <div class="product-widget-range-slider">
                                <div class="slider-range" id="slider-range"></div>
                                <div class="slider-labels">
                                    <span id="slider-range-value1"></span>
                                    <span>—</span>
                                    <span id="slider-range-value2"></span>
                                </div>
                            </div>
                        </div>
                        <div class="product-widget">
                            <h4 class="product-widget-title">Categoris</h4>
                            <ul class="product-widget-category">
                                <li><a href="product.php">Accesasories <span>(5)</span></a></li>
                                <li><a href="product.php">Computer <span>(4)</span></a></li>
                                <li><a href="product.php">Covid-19 <span>(2)</span></a></li>
                                <li><a href="product.php">Electronics <span>(6)</span></a></li>
                                <li><a href="product.php">Frame Sunglasses <span>(12)</span></a></li>
                                <li><a href="product.php">Furniture <span>(7)</span></a></li>
                                <li><a href="product.php">Genuine Leather <span>(9)</span></a></li>
                            </ul>
                        </div>
                        <div class="product-widget mb-0">
                            <h4 class="product-widget-title">Popular Tags</h4>
                            <ul class="product-widget-tags">
                                <li><a href="blog.php">Beauty</a></li>
                                <li><a href="blog.php">MakeupArtist</a></li>
                                <li><a href="blog.php">Makeup</a></li>
                                <li><a href="blog.php">Hair</a></li>
                                <li><a href="blog.php">Nails</a></li>
                                <li><a href="blog.php">Hairstyle</a></li>
                                <li><a href="blog.php">Skincare</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Product Area Wrapper ==-->

    <!--== Start Product Banner Area Wrapper ==-->
    <section>
        <div class="container">
            <!--== Start Product Category Item ==-->
            <a href="product.php" class="product-banner-item">
                <img src="../assets/images/shop/banner/7.webp" width="1170" height="240" alt="Image-HasTech">
            </a>
            <!--== End Product Category Item ==-->
        </div>
    </section>
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
                            <div class="swiper-slide mb-8">
                                <!--== Start Product Item ==-->
                                <div class="product-item">
                                    <div class="product-thumb">
                                        <a class="d-block" href="product-details.php">
                                            <img src="../assets/images/shop/4.webp" width="370" height="450" alt="Image-HasTech">
                                        </a>
                                        <span class="flag-new">new</span>
                                        <div class="product-action">
                                            <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                                <i class="fa fa-expand"></i>
                                            </button>
                                            <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                                <span>Add to cart</span>
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
                                            <div class="reviews">150 reviews</div>
                                        </div>
                                        <h4 class="title"><a href="product-details.php">Readable content DX22</a></h4>
                                        <div class="prices">
                                            <span class="price">$210.00</span>
                                            <span class="price-old">300.00</span>
                                        </div>
                                    </div>
                                </div>
                                <!--== End prPduct Item ==-->
                            </div>
                            <div class="swiper-slide mb-8">
                                <!--== Start Product Item ==-->
                                <div class="product-item">
                                    <div class="product-thumb">
                                        <a class="d-block" href="product-details.php">
                                            <img src="../assets/images/shop/5.webp" width="370" height="450" alt="Image-HasTech">
                                        </a>
                                        <span class="flag-new">new</span>
                                        <div class="product-action">
                                            <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                                <i class="fa fa-expand"></i>
                                            </button>
                                            <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                                <span>Add to cart</span>
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
                                            <div class="reviews">150 reviews</div>
                                        </div>
                                        <h4 class="title"><a href="product-details.php">Readable content DX22</a></h4>
                                        <div class="prices">
                                            <span class="price">$210.00</span>
                                            <span class="price-old">300.00</span>
                                        </div>
                                    </div>
                                </div>
                                <!--== End prPduct Item ==-->
                            </div>
                            <div class="swiper-slide mb-8">
                                <!--== Start Product Item ==-->
                                <div class="product-item">
                                    <div class="product-thumb">
                                        <a class="d-block" href="product-details.php">
                                            <img src="../assets/images/shop/6.webp" width="370" height="450" alt="Image-HasTech">
                                        </a>
                                        <span class="flag-new">new</span>
                                        <div class="product-action">
                                            <button type="button" class="product-action-btn action-btn-quick-view" data-bs-toggle="modal" data-bs-target="#action-QuickViewModal">
                                                <i class="fa fa-expand"></i>
                                            </button>
                                            <button type="button" class="product-action-btn action-btn-cart" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">
                                                <span>Add to cart</span>
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
                                            <div class="reviews">150 reviews</div>
                                        </div>
                                        <h4 class="title"><a href="product-details.php">Readable content DX22</a></h4>
                                        <div class="prices">
                                            <span class="price">$210.00</span>
                                            <span class="price-old">300.00</span>
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


<?= $this->endSection() ?>