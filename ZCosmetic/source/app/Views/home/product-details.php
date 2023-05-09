<?php

include(FCPATH . '../source/app/Helpers/DatabaseHelper.php');
$db = new DatabaseHelper();
$sp = $db->executeReader('CALL sp_ChiTietSanPham(?)', array($IDProduct))[0];

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
                                <li class="breadcrumb-item"><a class="text-dark" href="/Home/Index">Trang Chủ</a></li>
                                <li class="breadcrumb-item active text-dark" aria-current="page">Chi Tiết Sản Phẩm</li>
                            </ol>
                            <h2 class="page-header-title">Chi Tiết Sản Phẩm</h2>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h5 class="showing-pagination-results mt-5 mt-md-9 text-center text-md-end">Hiển thị 1 sản phẩm</h5>
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
                            <img src="../../assets/Product_Images/<?php echo $sp->MaHinh.'.jpg' ?>" width="570" height="693" alt="Image">
                            <!-- <span class="flag-new">new</span> -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details-content">
                            <h5 class="product-details-collection"><?= $sp->ThuongHieu ?></h5>
                            <h6 class="product-details-title"><?= $sp->TenSanPham ?></h6>
                            <div class="product-details-review mb-7">
                                <div class="product-review-icon">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </div>
                                <button type="button" class="product-review-show">150 reviews</button>
                            </div>
                            <p class="mb-7"><?= substr($sp->MoTa, 0, 150) ?> ...</p>
                            <div class="product-details-action">
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
                                <div class="product-details-cart-wishlist">
                                    <button type="button" class="btn-wishlist" data-bs-toggle="modal" data-bs-target="#action-WishlistModal"><i class="fa fa-heart-o"></i></button>
                                    <button type="button" class="btn ps-5" data-bs-toggle="modal" data-bs-target="#action-CartAddModal">Mua Ngay</button>
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
                                    <li><span>Xuất Xứ</span>
                                        <p><?= $sp->XuatXu ?></p>
                                    </li>
                                    <li><span>Thương Hiệu</span>
                                        <p><?= $sp->ThuongHieu ?></p>
                                    </li>
                                    <li><span>Loại Sản Phẩm</span>
                                        <p><?= $sp->TenLoai ?></p>
                                    </li>
                                    <li><span>Đơn Vị Tính</span>
                                        <p><?= $sp->TenDVT ?></p>
                                    </li>
                                </ul>

                                <p style="text-align: justify;"><?= $sp->MoTa ?></p>
                            </div>

                            <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                                <!--== Start Reviews Content Item ==-->
                                <div class="product-review-item">
                                    <div class="product-review-top">
                                        <div class="product-review-thumb">
                                            <img src="../assets/images/shop/product-details/comment1.webp" alt="Images">
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
                                            <img src="../assets/images/shop/product-details/comment2.webp" alt="Images">
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
                                            <img src="../assets/images/shop/product-details/comment3.webp" alt="Images">
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
                <img src="../assets/images/shop/banner/7.webp" width="1170" height="240" alt="Image-HasTech">
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
                                                <img src="../assets/images/shop/8.webp" width="370" height="450" alt="Image-HasTech">
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
                                                <img src="../assets/images/shop/7.webp" width="370" height="450" alt="Image-HasTech">
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
                                                <img src="../assets/images/shop/5.webp" width="370" height="450" alt="Image-HasTech">
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
    
    <script>
       document.title = '<?= $sp->TenSanPham ?>';
    </script>

<?= $this->endSection() ?>