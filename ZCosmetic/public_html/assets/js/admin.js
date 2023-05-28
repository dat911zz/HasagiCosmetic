
function saveAccount($tk) {
    console.log($('#frmDetails')[0].checkValidity());
    if (!$('#frmDetails')[0].checkValidity()) {
        $('#frmDetails')[0].reportValidity()
    }
    else {
        // Get the values from the input fields
        var TenDangNhap = $("#TenDangNhap").val();
        var HoVaTen = $("#HoVaTen").val();
        var NgaySinh = $("#NgaySinh").val();
        var SDT = $("#SDT").val();
        var CMND = $("#CMND").val();
        var GioiTinh = $('input[name="GioiTinh"]:checked').val();
        var MatKhau = $("#MatKhau").val();
        var NhomQuyen = $('input[name="NhomQuyen"]:checked').val();
        var LoaiTaiKhoan = $('input[name="LoaiTaiKhoan"]').val();
        var Ma = $('input[name="Ma"]').val();
        var DiaChi = $('input[name="DiaChi"]').val();
        var isCreate = $('input[name="isCreate"]').val();

        console.log($tk);
        // Create an object with the data to send
        var data = {
            Ma: Ma,
            TenDangNhap: TenDangNhap,
            HoVaTen: HoVaTen,
            NgaySinh: NgaySinh,
            SDT: SDT,
            CMND: CMND,
            DiaChi: DiaChi,
            GioiTinh: GioiTinh,
            MatKhau: MatKhau,
            NhomQuyen: NhomQuyen,
            LoaiTaiKhoan: LoaiTaiKhoan,
            isCreate : isCreate
        };

        console.log(data);

        Swal.fire({
            icon: 'warning',
            title: 'Cảnh Báo!',
            html: '<div>Bạn có chắc muốn lưu thay đổi cho tài khoản ' + TenDangNhap + '?</div>',
            showCancelButton: true,
            confirmButtonText: 'Chắc chắn',
            cancelButtonText: 'Hủy',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: '/Ajax/SaveAccount',
                    data: data,
                    dataType: "json",
                    success: function (data) {
                        console.log(data.msg);
                        if (data.msg == 'ok') {
                            console.log(data.d);
                            Swal.fire({
                                icon: 'success',
                                title: 'Thành Công',
                                text: 'Cập nhật thông tin cho tài khoản ' + data.target + ' thành công!',
                                showConfirmButton: true,
                                timer: 2500
                            }).then(() => {
                                location.replace("/CP");
                            });
                        }
                        else {
                            console.log(data.d);
                            Swal.fire({
                                icon: 'error',
                                title: 'Thất Bại',
                                html: '<span style="font-weight: bold">Có lỗi đã xảy ra, vui lòng thử lại! <br/>Chi tiết: </span><span style="color: red;">' + data.msg + '</span>',
                                showConfirmButton: true,
                                timer: 3500
                            })
                        }
                    }
                });
            }
        })
    }
}