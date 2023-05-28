<?php

namespace App\Controllers;

use App\Models\LoaiTaiKhoanModel;
use App\Models\NguoiDungModel;
use App\Models\NhanVienModel;
use App\Models\TaiKhoanModel;
use Exception;

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
    //Get edit form with id
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
    public function createAccount(){
        $data['title'] = 'Tạo tài khoản';
        return view('cp/create', $data);
    }
    public function check_order() {
        $data['title'] = 'Kiểm Duyệt Đơn';
        return view('cp/check_order', $data);
    }
}
