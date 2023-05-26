<?php 

namespace App\Controllers;
include(FCPATH . '../source/app/Helpers/DatabaseHelper.php');
class CP extends BaseController
{
    public function index()
    {
        $data['title'] = 'Trang quản trị';
        $db = new \DatabaseHelper();
        $data['dstk'] = $db->executeReader('call pq_gettk_nv');
        // foreach ($data['dstk'] as $tk) {
        //     echo "MaTK: " . $tk->MaTK . "<br>";
        //     echo "TenDangNhap: " . $tk->TenDangNhap . "<br>";
        //     echo "MatKhau: " . $tk->MatKhau . "<br>";
        //     echo "MaNhomQuyen: " . $tk->MaNhomQuyen . "<br>";
        //     echo "HoVaTen: " . $tk->HoVaTen . "<br>";
        //     echo "NgaySinh: " . $tk->NgaySinh . "<br>";
        //     echo "GioiTinh: " . $tk->GioiTinh . "<br>";
        //     echo "DiaChi: " . $tk->DiaChi . "<br>";
        //     echo "SDT: " . $tk->SDT . "<br>";
        //     echo "CMND: " . $tk->CMND . "<br>";
        //     echo "MaLoai: " . $tk->MaLoai . "<br>";
        // }
        return view('cp/index', $data);
    }
    //Get edit form with id
    public function accEdit($id){
        $data['title'] = 'Chỉnh sửa thông tin tài khoản';
        $data['model'] = '';
        return view('cp/edit', $data);
    }
    public function accEidtSave($modal){
        
    }
    public function accDetails($id){
        echo "Details: ". $id. "<br>";
    }
}   

?>