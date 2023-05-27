<<<<<<< HEAD
=======
<?php
class Email
{
    public $email;
    public $hoTen;
    public $message;
    public $subject;
    public function __construct()
    {
    }
}
?>

>>>>>>> ea5228f032d5ee135dc8debe9974f82fa1eac4f7

<?= $this->extend('layouts/main') ?>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>

<?= include(FCPATH . '../source/app/Helpers/DatabaseHelper.php') ?>

<!--== Start Contact Area Wrapper ==-->
<section class="contact-area">
    <div class="container">
        <div class="row">
            <div class="offset-lg-6 col-lg-6">
                <div class="section-title position-relative">
                    <h2 class="title">Liên hệ </h2>
                    <p class="m-0">Gửi cho chúng tôi câu hỏi của bạn, chúng tôi sẽ trả lời sớm nhất có thể!</p>
                    <div class="line-left-style mt-4 mb-1"></div>
                </div>
                <!--== Start Contact Form ==-->
                <div class="contact-form">
                    <form id="contact-form" action="https://whizthemes.com/mail-php/raju/arden/mail.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="con_name" placeholder="Họ">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Tên">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" type="email" name="con_email" placeholder="Địa chỉ email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="con_message" placeholder="Tin nhắn"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-0">
                                    <button class="btn btn-sm" type="submit">GỬI LIÊN HỆ</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--== End Contact Form ==-->

                <!--== Message Notification ==-->
                <div class="form-message"></div>
            </div>
        </div>
    </div>
    <img class="contact-left-img" src="../../assets/images/contact.webp"></img>
</section>
<!--== End Contact Area Wrapper ==-->

<!--== Start Contact Area Wrapper ==-->
<section class="section-space">
    <div class="container">
        <div class="contact-info">
            <div class="contact-info-item">
                <img class="icon" src="../../assets/images/14.webp" width="30" height="30" alt="Icon">
                <a href="tel://+11020303023">+84 795693948</a>
            </div>
            <div class="contact-info-item">
                <img class="icon" src="../../assets/images/24.webp" width="30" height="30" alt="Icon">
                <a href="mailto://example@demo.com">example@demo.com</a>
                <a href="mailto://demo@example.com">demo@example.com</a>
            </div>
            <div class="contact-info-item mb-0">
                <img class="icon" src="../../assets/images/34.webp" width="30" height="30" alt="Icon">
                <p>140 Lê Trọng Tấn, Phường Tây Thạnh, Quận Tân Phú, Thành Phố Hồ Chí Minh</p>
            </div>
        </div>
    </div>
</section>
<!--== End Contact Area Wrapper ==-->

<div class="map-area">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d802879.9165497769!2d144.83475730949783!3d-38.180874157285366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sbd!4v1636803638401!5m2!1sen!2sbd"></iframe>
</div>


<?= $this->endSection() ?>