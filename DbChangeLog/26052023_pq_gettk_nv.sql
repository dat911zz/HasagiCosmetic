CREATE PROCEDURE pq_gettk_nv()
BEGIN
	Select tk.*, nv.HoVaTen, nv.NgaySinh, nv.GioiTinh, nv.DiaChi, nv.SDT, nv.CMND, nv.MaLoai 
    from tbl_taikhoan tk, tbl_nhanvien nv 
    WHERE tk.Ma = nv.Ma;
END;