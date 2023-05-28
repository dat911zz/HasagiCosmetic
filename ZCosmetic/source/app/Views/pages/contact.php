
<?php 

    if (isset($_POST['btnSU'])){
        $name = $_POST['inputName'];
        $subj = $_POST['inputSubject'];
        $body = $_POST['inputTextarea'];
        $email = $_POST['inputEmail'];
        include(FCPATH . '../source/app/Helpers/mail.php');
        sendMail( $name, $email, $subj, $body);
        
    }

?>

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
                    <form id="contact-form" action="/Pages/Contact" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="inputName">Họ và Tên</label>
                                <input type="txt" class="form-control"  id="inputName"  name="inputName" placeholder="Nhập họ và tên">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" class="form-control"  id="inputEmail" name="inputEmail" placeholder="Nhập Email của bạn">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                <label for="inputSubject">Tiêu đề mail</label>
                                <input type="text" class="form-control" id="inputSubject" name="inputSubject" placeholder="Nhập Tiêu Đề Mail của bạn">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="inputTextarea">Nội Dung bức thư</label>
                                    <textarea class="form-control" id="inputTextarea"  name="inputTextarea" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-0">
                                <button onclick="kiemTra();" type="submit" name="btnSU" class="btn btn-sm" >Gửi</button>
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

<script>
    function kiemTra(event) {
    var tenKh = document.getElementById("inputName");
    var email_kh = document.getElementById("inputEmail");
    var subject = document.getElementById("inputSubject");
    var tera = document.getElementById("inputTextarea");

    if (tenKh.value === "") {
        alert("Nhập tên khách hàng");
        tenKh.focus();
        event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu
        return false;
    }

    if (email_kh.value === "") {
        alert("Nhập email khách hàng");
        email_kh.focus();
        event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu
        return false;
    }

    if (subject.value === "") {
        alert("Nhập Tiêu Đề Mail Cần Gửi");
        subject.focus();
        event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu
        return false;
    }

    if (tera.value === "") {
        alert("Nhập Tiêu Nội Dung Mail Cần Gửi");
        tera.focus();
        event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu
        return false;
    }

    return true;
}

</script>

<?= $this->endSection() ?>