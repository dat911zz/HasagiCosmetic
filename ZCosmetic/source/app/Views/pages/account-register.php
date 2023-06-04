<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<script>
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
session_start();
$db = (new DatabaseHelper());
$error = "";
$uname = "";
$pass = "";
$tb = "";

$city = $district = $ward = $detailsAddress = '';
// $id_user = 2;
// $user = $db->executeReader('SELECT * FROM tbl_NguoiDung WHERE Ma = ?', array($id_user))[0];
// $arrAdress = explode(', ', $user->DiaChi);
// $len = count($arrAdress);
// $city = $arrAdress[$len - 1];
// $district = $arrAdress[$len - 2];
// $ward = $arrAdress[$len - 3];
// $detailsAddress = '';
// if (isset($arrAdress[$len - 4])) {
//     $detailsAddress = $arrAdress[$len - 4];
// }


function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <!--== Start Register Area Wrapper ==-->
                            <div class="my-account-item-wrap">
                                <h3 class="title">Đăng Ký</h3>
                                <div class="my-account-form">
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-6">
                                                    <label for="register_username">Tài khoản
                                                        <sup>*</sup></label>
                                                    <input type="text" name="txtUser" id="register_username">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group mb-6">
                                                    <label for="register_pwsd">Mật khẩu <sup>*</sup></label>
                                                    <input type="password" name="txtPassword" id="register_pwsd">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group mb-6">
                                                    <label for="register_confpwsd">Nhập lại mật khẩu <sup>*</sup></label>
                                                    <input type="password" name="txtConfPassword" id="register_confpwsd">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="f_name">Họ tên <abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <input id="f_name" name="f_name" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="dob">Ngày sinh <abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <input id="dob" name="dob" type="date" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div>

                                                    <fieldset data-role="controlgroup">
                                                        <label>Giới tính<abbr class="required"
                                                                title="required">*</abbr></label>
                                                        <label for="male">Male</label>
                                                        <input type="radio" class="sex" name="sex" id="sexMale" value="Nam"
                                                            checked>
                                                        <label for="female">Female</label>
                                                        <input type="radio" class="sex" name="sex" id="sexFemale" value="Nữ">
                                                    </fieldset>
                                                </div>
                                            </div>



                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="city">Tỉnh / Thành Phố <abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <select id="city" class="form-control wide">
                                                        <option value="null" selected>Chọn</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-4">
                                                <div class="form-group">
                                                    <label for="district">Quận / Huyện <abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <select id="district" class="form-control wide">
                                                        <option value="null" selected>Chọn</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-4">
                                                <div class="form-group">
                                                    <label for="ward">Phường / Xã <abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <select id="ward" class="form-control wide">
                                                        <option value="null" selected>Chọn</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="street-address">Địa chỉ</label>
                                                    <input id="street-address" type="text" class="form-control"
                                                        placeholder="Số nhà, ...">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="phone">SĐT <abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <input id="phone" name="phone" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Chứng Minh Nhân Dân <abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <input id="identity" name="identity" type="text"
                                                        class="form-control">
                                                </div>
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
                                                <p class="desc mb-4">Dữ liệu cá nhân của bạn sẽ được sử dụng để hỗ trợ
                                                    trải
                                                    nghiệm của bạn trên trang web này, để quản lý quyền truy cập vào tài
                                                    khoản của bạn và cho các mục đích khác được mô tả trong chính sách
                                                    bảo
                                                    mật của chúng tôi.</p>
                                                <a type="submit" class="btn btnSubmit" name="btnSubmit"
                                                    id="btnSubmit">Register</a>
                                                <a href="/Pages/AccountLogin" class="lost-password">Bạn đã có tài
                                                    khoản?</a>
                                            </div>
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
<script type="text/javascript">
    $(document).ready(function () {
        $('.nice-select').remove();
        $('select').show();
        $.ajax({
            type: 'GET',
            url: 'https://provinces.open-api.vn/api/',
            dataType: 'json',
            success: function (data) {
                $default = '<option value="null" selected>Chọn</option>';
                $resultCity = $default;
                $(data).each(function (index) {
                    $resultCity += '<option value="' + data[index].code + '">' + data[index].name + '</option>';
                });
                $('#city').html($resultCity);

                $('#city option').each(function () {
                    if ($(this).text().toLowerCase() == '<?= $city ?>'.toLowerCase()) {
                        updateCity($(this).val());
                    }
                });


                $('#street-address').val('<?= $detailsAddress ?>');
            }
        });

        $('#city').on('change', function () {
            updateCity($('#city').val());
        });
        $('#district').on('change', function () {
            updateDistrict($(this).val());
        });
        $('#ward').on('change', function () {
            updateWard($(this).val());
            console.log($('#ward > option[Selected]').text() + ', ' + $('#district > option[Selected]').text() + ', ' + $('#city > option[Selected]').text());
        });
    });

    function updateCity($value) {
        $('#city > option[Selected]').attr('Selected', false);
        $('#city > option[value=' + $value + ']').attr('Selected', true);
        changeDistrict($value);
    }

    function updateDistrict($value) {
        $('#district > option[Selected]').attr('Selected', false);
        $('#district > option[value=' + $value + ']').attr('Selected', true);
        changeWard($value);
    }

    function updateWard($value) {
        $('#ward > option[Selected]').attr('Selected', false);
        $('#ward > option[value=' + $value + ']').attr('Selected', true);
        changeWard($value);
    }

    function changeDistrict($idCity) {
        $.ajax({
            type: 'GET',
            url: 'https://provinces.open-api.vn/api/d/',
            dataType: 'json',
            success: function (data) {
                $default = '<option value="null" selected>Chọn</option>';
                $resultDistrict = $default;
                $(data).each(function (index) {
                    if (data[index].province_code == $idCity) {
                        $resultDistrict += '<option value="' + data[index].code + '">' + data[index].name + '</option>';
                    }
                });
                $('#district').html($resultDistrict);
                $('#district option').each(function () {
                    if ($(this).text().toLowerCase() == '<?= $district ?>'.toLowerCase()) {
                        updateDistrict($(this).val());
                    }
                });
            }
        });
    }

    function changeWard($idDistrict) {
        $.ajax({
            type: 'GET',
            url: 'https://provinces.open-api.vn/api/w/',
            dataType: 'json',
            success: function (data) {
                $default = '<option value="null" selected>Chọn</option>';
                $resultWard = $default;
                $(data).each(function (index) {
                    if (data[index].district_code == $idDistrict) {
                        $resultWard += '<option value="' + data[index].code + '">' + data[index].name + '</option>';
                    }
                });
                $('#ward').html($resultWard);
                $('#ward option').each(function () {
                    if ($(this).text().toLowerCase() == '<?= $ward ?>'.toLowerCase()) {
                        updateWard($(this).val());
                    }
                });
            }
        });
    }

    function AlertError($text) {
        Swal.fire({
            icon: 'error',
            title: $text,
            showConfirmButton: false,
            timer: 1000
        });
        //$('swal-select').remove();
    }
</script>
<script>
    $('#btnSubmit').on('click', function () {
        const checkboxes = document.getElementsByName("sex");
        for (let i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                $sex = checkboxes[i].value;
            }
        }
        $ten_dang_nhap = $('#register_username').val();
        $mat_khau = $('#register_pwsd').val();
        $confirm = $('#register_confpwsd').val();
        $name = $('#f_name').val();
        $dob = $('#dob').val();
        $phone = $('#phone').val();
        $cmnd = $('#identity').val();
        $city_new = $('#city option[Selected]').text();
        $district_new = $('#district  option[Selected]').text();
        $ward_new = $('#ward  option[Selected]').text();
        $detailsAddress_new = $('#street-address').val();
        if ($name.length <= 0) {
            AlertError('Tên tài khoản đang trống');
        } else if ($('#city').val() == null) {
            AlertError('Vui lòng chọn tỉnh / Thành phố');
        } else if ($('#district').val() == null) {
            AlertError('Vui lòng chọn Quận / Huyện');
        } else if ($('#ward').val() == null) {
            AlertError('Vui lòng chọn Phường / Xã');
        } else if ($('#register_pwsd').val() !== $('#register_confpwsd').val()) {
            AlertError('Nhập lại mật khẩu không đúng !!');
        } else {
            if ($detailsAddress_new.length > 0) {
                $address = $detailsAddress_new + ', ';
            } else {
                $address = '';
            }
            $address += $ward_new + ', ' + $district_new + ', ' + $city_new;
            console.log('12321321321321321', $sex, $dob);
            addAccountRegister($ten_dang_nhap, $mat_khau, $name, $dob, $sex, $address, $phone, $cmnd);
        }
    });
</script>
<style>
    .img-register {
        border-radius: none !important;
    }

    .justify-content-center {
        justify-content: center;
    }
</style>

<?= $this->endSection() ?>