function saveAccount($tk) {
    // Get the values from the input fields
    var TenDangNhap = $("#TenDangNhap").val();
    var HoVaTen = $("#HoVaTen").val();
    var NgaySinh = $("#NgaySinh").val();
    var SDT = $("#SDT").val();
    var CMND = $("#CMND").val();
    var GioiTinh = $('input[name="GioiTinh"]:checked').val();
    var MatKhau = $("#MatKhau").val();


    console.log($tk);
    // Create an object with the data to send
    var data = {
        TenDangNhap: TenDangNhap,
        HoVaTen: HoVaTen,
        NgaySinh: NgaySinh,
        SDT: SDT,
        CMND: CMND,
        GioiTinh: GioiTinh,
        MatKhau: MatKhau
    };

    console.log(data);
}