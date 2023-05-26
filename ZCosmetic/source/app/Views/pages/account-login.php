<?= $this->extend('layouts/main') ?>

<!-- Khúc này phải cách ra 1 dòng để không bị lỗi -->
<?= $this->section('content') ?>

<script>
    $(function () {
        $("#header").load("header.php");
        $("#footer").load("footer.php");
    })
    function validateLoginForm() {
        let x = document.forms["LoginForm"]["txtUserNameLogin"].value;
        let y = document.forms["LoginForm"]["txtPassWordLogin"].value;
        if (x == "" && y == "") {
            alert("Chưa điền thông tin");
            return false;
        }
    }
    function validateRegisterForm() {
        let x = document.forms["RegisterForm"]["txtUser"].value;
        let y = document.forms["RegisterForm"]["txtPassword"].value;
        if (x == "" && y == "") {
            alert("Chưa điền thông tin");
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

if (isset($_POST["btnSubmitLogin"])) {
    $uname = validate($_POST['txtUserNameLogin']);
    $pass = validate($_POST['txtPassWordLogin']);
    // Thực hiện truy vấn để kiểm tra thông tin đăng nhập
    $query = "SELECT * FROM tbl_TaiKhoan WHERE TenDangNhap = ? AND MatKhau = ?";
    $params = array($uname, $pass);
    $result = $db->executeReader($query, $params);

    if (isset($_POST["remember"])) {
        setcookie("username", $result[0]->TenDangNhap, time()+(30),"/");
        setcookie("password", $result[0]->MatKhau, time()+(30),"/");
    }
    if (isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
        $uname = $_COOKIE["username"];
        $pass = $_COOKIE["password"];
    }
    if ($result) { // Đăng nhập thành công
        $_SESSION['MaTaiKhoan'] = $result[0]->Ma;
        $_SESSION['username'] = $result[0]->TenDangNhap;
        $_SESSION['password'] = $result[0]->MatKhau;
        $_SESSION['role'] = $result[0]->MaNhomQuyen;
        $role = $result[0]->MaNhomQuyen;
        switch ($role) {
            case 1:
                $myJS = <<<EOT
                <script type='text/javascript'>
                    window.location.replace("/CP");
                </script>
                EOT;
                echo ($myJS);
                break;
            case 2:
                $myJS = <<<EOT
                <script type='text/javascript'>
                    window.location.replace("/CP");
                </script>
                EOT;
                echo ($myJS);
                break;
            case 3:
                $myJS = <<<EOT
                <script type='text/javascript'>
                    window.location.replace("/");
                </script>
                EOT;
                echo ($myJS);
                break;
            default:
                break;
        }
    } else { // Đăng nhập thất bại
        $error = "Sai tên đăng nhập hoặc mật khẩu";
    }
}
?>

<section>
    <!--== Wrapper Start ==-->
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
                    <div class="col-lg-6 mb-8">
                        <!--== Start Login Area Wrapper ==-->
                        <div class="my-account-item-wrap">
                            <h3 class="title">Đăng Nhập</h3>
                            <div class="my-account-form">
                                <form name="LoginForm" onsubmit="return validateLoginForm()" method="post">
                                    <div class="form-group mb-6">
                                        <label for="login_username">Username or Email Address <sup>*</sup></label>
                                        <input type="text" name="txtUserNameLogin" id="login_username"
                                            value="<?php echo $uname ?>">
                                    </div>

                                    <div class="form-group mb-6">
                                        <label for="login_pwsd">Password <sup>*</sup></label>
                                        <input type="password" name="txtPassWordLogin" id="login_pwsd"
                                            value="<?php echo $pass ?>">
                                    </div>
                                    <div form-group class="text-danger">
                                        <?php
                                        if ($error != NULL) {
                                            echo $error;
                                        } else {
                                            echo "";
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group d-flex align-items-center mb-14">
                                        <button type="submit" class="btn" name="btnSubmitLogin">Login</button>
                                        <div class="form-check ms-3">
                                            <input type="checkbox" name="remember" class="form-check-input"
                                                id="remember_pwsd">
                                            <label class="form-check-label" for="remember_pwsd">Remember Me</label>
                                        </div>
                                    </div>
                                    <a href="/Pages/AccountRegister" class="lost-password">Bạn chưa có tài khoản? Tạo
                                        Ngay</a>
                                </form>
                            </div>
                        </div>
                        <!--== End Login Area Wrapper ==-->
                    </div>
                    <img class="col-lg-6 mb-8" src="../../assets/images/contact.webp" alt="">
                </div>
            </div>
        </section>
    </main>
</section>
<?= $this->endSection() ?>