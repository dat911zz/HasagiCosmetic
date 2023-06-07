<?php

namespace App\Controllers;

use App\Models\LoaiSPModel;
use App\Models\LoaiTaiKhoanModel;
use App\Models\NguoiDungModel;
use App\Models\NhanVienModel;
use App\Models\SanPhamModel;
use App\Models\TaiKhoanModel;
use DatabaseHelper;
use Exception;
use Hermawan\DataTables\DataTable;

include(FCPATH . '../source/app/Helpers/DatabaseHelper.php');
class CP extends BaseController
{
    public function index()
    {
        $data['title'] = 'Trang quản trị';
        $tk = (new TaiKhoanModel())->findAll();
        $data['tks'] = $tk;
        return view('cp/index', $data);
    }
    public function account($id)
    {
        $data['title'] = 'Thông tin tài khoản';

        try {
            $tk = (new TaiKhoanModel())->getTKByID($id);
            $nv = (new NhanVienModel())->getNVByID($id);
            $nd = (new NguoiDungModel())->getNDByID($id);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        $data['tk'] = $tk;
        $data['nv'] = $nv;
        $data['nd'] = $nd;
        return view('cp/details', $data);
    }
    public function createAccount()
    {
        $data['title'] = 'Tạo tài khoản';
        return view('cp/create', $data);
    }

    public function products()
    {
        $data['title'] = 'Danh sách sản phẩm';
        $db = new DatabaseHelper();
        $data['prods'] =  $db->executeReader("SELECT * FROM tbl_sanpham LIMIT 10");
        return view('cp/products', $data);
    }
    public function check_order()
    {
        $data['title'] = 'Kiểm Duyệt Đơn';
        return view('cp/check_order', $data);
    }
    public function getSP_Pagination()
    {
        $db = db_connect();
        $builder = $db
        ->table('tbl_sanpham as sp, tbl_loaisanpham as l, tbl_dvt as dvt')
        ->select(
            'MaHinh,
             sp.Ma, 
             TenSanPham, 
             SoLuongTon, 
             XuatXu, 
             ThuongHieu, 
             l.Ten as Loai, 
             dvt.Ten as DVT, 
             GiamGia, 
             MoTa'
            )
        ->where("sp.MaLoai = l.Ma AND sp.MaDVT = dvt.Ma");
        return DataTable::of($builder)
               ->toJson();
    }
    public function getSPByID_JSON($id){
        $sp = (new SanPhamModel())->find($id);
        if ($sp) {
            echo json_encode([
                'msg' => "success",
                'data' => $sp
            ]);
        } else {
            echo json_encode(['msg' => "error"]);
        }
    }
    public function createImportTicket(){
        $data['title'] = 'Tạo phiếu nhập';
        return view('cp/createImportTicket', $data);
    }
    public function checkPN(){
        $data['title'] = 'Duyệt phiếu nhập';
        return view('cp/checkPN', $data);
    }
}
