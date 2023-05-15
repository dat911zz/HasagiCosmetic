<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<script>
    $(function () {
        $("#header").load("header.php");
        $("#footer").load("footer.php");
    })
    function validateRegisterForm() {
        let x = document.forms["RegisterForm"]["txtUser"].value;
        let y = document.forms["RegisterForm"]["txtPassword"].value;
        if (x == "" && y == "") {
            alert("Chưa điền thông tin");
            return false;
        }
        if (x.length > 25) {
            alert("Tài khoảng không dài hơn 25 ký tự.");
            return false;
        }
        if (y.length < 6) {
            alert("Mật khẩu không nhỏ hơn 6 ký tự.");
            return false;
        }
    }  
</script>

<?php
use App\Controllers\Pages;

session_start();
include(FCPATH . '../source/app/Helpers/DatabaseHelper.php');
$db = (new DatabaseHelper());
$error = "";
$uname = "";
$pass = "";
$tb = "";

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["btnSubmit"])) {
    $ma_tk = NULL;
    $ten_dang_nhap = $_POST["txtUser"];
    $mat_khau = $_POST["txtPassword"];
    $ma_nhom_quyen = 3;
    $param = array($ma_tk, $ten_dang_nhap, $mat_khau, $ma_nhom_quyen);
    $paramLogin = array($ten_dang_nhap, $mat_khau);
    $kq = $db->executeNonQuery('INSERT INTO tbl_TaiKhoan (`Ma`, `TenDangNhap`, `MatKhau`, `MaNhomQuyen`) VALUES(?,?,?,?)', $param);
    $query = "SELECT * FROM tbl_TaiKhoan WHERE TenDangNhap = ? AND MatKhau = ?";
    $result = $db->executeReader($query, $paramLogin);
    if ($kq) {
        $myJS = <<<EOT
                <script type='text/javascript'>
                    window.location.replace("/Pages/AccountLogin");
                </script>
                EOT;
        echo ($myJS);
    } else {
        $tb = "Tạo tài khoản không thành công";
    }
}
?>
<section>
    <!--== Wrapper Start ==-->
    <div>
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
                                    <li class="breadcrumb-item"><a class="text-dark" href="../index.php">Home</a></li>
                                    <li class="breadcrumb-item active text-dark" aria-current="page">Account</li>
                                </ol>
                                <h2 class="page-header-title">Account</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--== End Page Header Area Wrapper ==-->
            <!--== Start Account Area Wrapper ==-->
            <section class="section-space">
                <div class="container">
                    <div class="row mb-n8">
                        <img class="col-lg-6 mb-8" src="../../assets/images/contact.webp" alt="">
                        <div class="col-lg-6 mb-8">
                            <!--== Start Register Area Wrapper ==-->
                            <div class="my-account-item-wrap">
                                <h3 class="title">Đăng Ký</h3>
                                <div class="my-account-form">
                                    <form name="RegisterForm" onsubmit="return validateRegisterForm()" method="post">
                                        <div class="form-group mb-6">
                                            <label for="register_username">Username or Email Address
                                                <sup>*</sup></label>
                                            <input type="text" name="txtUser" id="register_username">
                                        </div>

                                        <div class="form-group mb-6">
                                            <label for="register_pwsd">Password <sup>*</sup></label>
                                            <input type="password" name="txtPassword" id="register_pwsd">
                                        </div>
                                        <div form-group class="text-danger">
                                            <?php
                                            if ($tb != NULL) {
                                                echo $tb;
                                            } else {
                                                echo "";
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <p class="desc mb-4">Dữ liệu cá nhân của bạn sẽ được sử dụng để hỗ trợ trải
                                                nghiệm của bạn trên trang web này, để quản lý quyền truy cập vào tài
                                                khoản của bạn và cho các mục đích khác được mô tả trong chính sách bảo
                                                mật của chúng tôi.</p>
                                            <button type="submit" class="btn" name="btnSubmit">Register</button>
                                            <a href="/Pages/AccountLogin" class="lost-password">Bạn đã có tài khoản?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
</section>
<?= $this->endSection() ?>