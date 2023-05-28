CREATE PROCEDURE sp_update(
    IN ma INT,
    IN ten varchar(255),
    IN hinh varchar(255),
    IN sl_ton INT,
    IN mota varchar(255),
    IN xuatxu varchar(255),
    IN thuonghieu varchar(255),
    IN maloai INT,
    IN madvt INT,
    IN giamgia INT
)
BEGIN
    UPDATE `tbl_sanpham`
    SET
        `TenSanPham` = ten,
        `MaHinh` = hinh,
        `SoLuongTon` = sl_ton,
        `MoTa` = mota,
        `XuatXu` = xuatxu,
        `ThuongHieu` = thuonghieu,
        `MaLoai` = maloai,
        `MaDVT` = madvt,
        `GiamGia` = giamgia
    WHERE
        `Ma` = ma;
END
