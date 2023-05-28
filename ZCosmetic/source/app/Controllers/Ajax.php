<?php

namespace App\Controllers;

use App\Models\NguoiDungModel;
use App\Models\NhanVienModel;

include(FCPATH . '../source/app/Helpers/DatabaseHelper.php');

use DatabaseHelper;
use App\Models\TaiKhoanModel;

//Ajax controller
class Ajax extends BaseController
{
    //Action
    public function getDataProduct($id_product)
    {
        $db = new DatabaseHelper();
        return $db->executeReader("SELECT tbl_sanpham.*, tbl_gia.Gia, tbl_giasanpham.*
                                    FROM tbl_sanpham, tbl_giasanpham, tbl_gia
                                    WHERE tbl_sanpham.Ma = ? and tbl_sanpham.Ma = tbl_giasanpham.MaSanPham and tbl_giasanpham.MaGia = tbl_gia.Ma and tbl_giasanpham.NgayHetHieuLuc is null", array($id_product));
    }
    public function getProduct()
    {
        $id_product = $this->request->getPost('id_product');
        return json_encode(['value' => $this->getDataProduct($id_product)]);
    }
    public function showListCart($array)
    {
        $result = '<ul class="aside-cart-product-list">';
        $total = 0;
        if (count($array) <= 0) {
            $result = '<div style="padding-top: 20px; padding-bottom: 60px; text-align: center; color: orange;">Giỏ hàng đang rỗng</div>';
            return array($result, $total);
        }
        foreach ($array as $item) {
            $price = $item->Gia - ($item->GiamGia / 100.0) * $item->Gia;
            $total += $price * $item->SoLuong;
            $result = $result . '<li class="aside-product-list-item">
                                    <a href="#/" onclick="removeCart(' . $item->MaSanPham . ', ' . $item->MaNguoiDung . ')" class="remove">×</a>
                                    <a href="/Home/Product?id=' . $item->Ma . '">
                                        <img src="../../assets/Product_Images/' . $item->MaHinh . '.jpg' . '" width="68" height="84" alt="Image">
                                        <span class="product-title shorten-text two-row">' . $item->TenSanPham . '</span>
                                    </a>
                                    <span class="product-price">' . $item->SoLuong . ' x ' . number_format($price, 0, ',', '.') . ' VNĐ<span style="margin-left: 10px; color: red; text-decoration: line-through;">' . (($item->GiamGia > 0) ? number_format($item->Gia, 0, ',', '.') . 'VNĐ' : '') . '</span></span>
                                </li>';
        }
        $result .= '<a class="btn-total" href="/Pages/Cart">Xem Giỏ Hàng</a>
                    <a class="btn-total" id="checkout">Thanh Toán</a>
                    </ul>';
        return array($result, $total);
    }
    private function getCart($id_user)
    {
        $db = new DatabaseHelper();
        return $db->executeReader("CALL sp_getCart(?)", array($id_user));
    }
    public function addCart()
    {
        $db = new DatabaseHelper();
        $id_product = $this->request->getPost('id_product');
        $quantity = $this->request->getPost('quantity');
        $id_user = $this->request->getPost('id_user');
        $kq = $db->executeNonQuery("CALL sp_addCart( ?, ?, ?);", array($id_product, $quantity, $id_user));
        $cart = $this->getCart($id_user);
        $rt = $this->showListCart($cart);
        if (isset($kq) && $kq > 0) {
            echo json_encode(['msg' => "success", 'quantity' => count($cart), 'html' => $rt[0], 'total' => $rt[1]]);
        } else {
            echo json_encode(['msg' => "error"]);
        }
    }
    public function removeCart()
    {
        $db = new DatabaseHelper();
        $id_product = $this->request->getPost('id_product');
        $id_user = $this->request->getPost('id_user');
        $kq = $db->executeNonQuery("CALL sp_removeCart( ?, ?);", array($id_product, $id_user));
        $cart = $this->getCart($id_user);
        $rt = $this->showListCart($cart);
        if (isset($kq) && $kq > 0) {
            echo json_encode(['msg' => "success", 'quantity' => count($cart), 'html' => $rt[0]]);
        } else {
            echo json_encode(['msg' => "error"]);
        }
    }
    public function updateCart()
    {
        $db = new DatabaseHelper();
        $id_product = $this->request->getPost('id_product');
        $quantity = $this->request->getPost('quantity');
        $id_user = $this->request->getPost('id_user');
        $price = $this->request->getPost('price');
        $kq = $db->executeNonQuery("CALL sp_updateCart( ?, ?, ?);", array($id_product, $quantity, $id_user));
        $cart = $this->getCart($id_user);
        $rt = $this->showListCart($cart);
        if (isset($kq) && $kq > 0) {
            echo json_encode(['msg' => "success", 'total_price' => $price * $quantity, 'html' => $rt[0]]);
        } else {
            echo json_encode(['msg' => "error"]);
        }
    }
    public function getTotalCart()
    {
        $db = new DatabaseHelper();
        $id_user = $this->request->getPost('id_user');
        $total = $db->executeReader('CALL sp_getTotalCart(?)', array($id_user))[0]->Total;
        if ($total > 0) {
            echo json_encode(['msg' => "success", 'total_cart' => $total]);
        } else {
            echo json_encode(['msg' => "error"]);
        }
    }
    public function checkoutCarts()
    {
        $id_user = $this->request->getPost('id_user');
        $carts = $this->getCart(($id_user));
        $change = false;
        foreach ($carts as $cart) {
            if ($cart->SoLuong > $cart->SoLuongTon) {
                $change = true;
                $cart->SoLuong = $cart->SoLuongTon;
            }
        }
        return json_encode(['value' => $carts, 'delete' => 1, 'change_quantity' => $change]);
    }
    public function buyNow()
    {
        $id_product = $this->request->getPost('id_product');
        $quantity = $this->request->getPost('quantity');
        return json_encode(['value' => $this->getDataProduct($id_product), 'quantity' => $quantity, 'delete' => 0]);
    }
    public function pay()
    {
        $db = new DatabaseHelper();
        $id_user = $this->request->getPost('id_user');
        $id_product = $this->request->getPost('id_product');
        $quantity = $this->request->getPost('quantity');
        $delete = $this->request->getPost('delete');
        $name = $this->request->getPost('name');
        $adress = $this->request->getPost('adress');
        $phone = $this->request->getPost('phone');
        $note = $this->request->getPost('note');
        $mahd = $db->executeReader("CALL sp_createHoaDon(?, ?, ?, ?, ?)", array($id_user, $name, $adress, $phone, $note))[0]->MaHD;
        $kq = true;
        if ($delete == 1) {
            $kq = $db->executeNonQuery('CALL sp_checkoutCarts(?, ?)', array($id_user, $mahd));
        } else {
            $kq = $db->executeNonQuery('CALL sp_checkoutOneProduct(?, ?, ?)', array($mahd, $id_product, $quantity));
        }
        if ($kq) {
            return json_encode(['msg' => 'success']);
        }
        return json_encode(['msg' => 'fails']);
    }
    //Các hàm dành cho Quản trị
    public function saveAccount()
    {
        //Begin DB transaction
        $tk = new TaiKhoanModel();
        $db = $tk->db;
        $db->transBegin();

        try {
            $Ma = $this->request->getPost('Ma');
            $TenDangNhap = $this->request->getPost('TenDangNhap');
            $HoVaTen = $this->request->getPost('HoVaTen');
            $NgaySinh = $this->request->getPost('NgaySinh');
            $SDT = $this->request->getPost('SDT');
            $DiaChi = $this->request->getPost('DiaChi');
            $CMND = $this->request->getPost('CMND');
            $GioiTinh = $this->request->getPost('GioiTinh');
            $MatKhau = $this->request->getPost('MatKhau');
            $NhomQuyen = $this->request->getPost('NhomQuyen');
            $LoaiTaiKhoan = $this->request->getPost('LoaiTaiKhoan');
            $isCreate = $this->request->getPost('isCreate');

            $dataTK = [
                'TenDangNhap' => $TenDangNhap,
                'MatKhau' => $MatKhau,
                'MaNhomQuyen' => $NhomQuyen,
                'LoaiTaiKhoan' => $LoaiTaiKhoan,
            ];
            
            
            if ($isCreate == 1) {
                if ($tk->checkUnique($TenDangNhap)) {
                    $check = $tk->createTK($dataTK);
                    $db->transRollback();
                    //Lấy id của tài khoản mới tạo
                    $Ma = $tk->getInsertID();
                } else {
                    $db->transRollback();
                    throw new \Exception("Tên đăng nhập đã tồn tại!");
                }
            } else {
                $check = $tk->updateTK($Ma, $dataTK);
            }
            if ($check) {
                $data = [
                    'Ma' => $Ma,
                    'HoVaTen' => $HoVaTen,
                    'NgaySinh' => $NgaySinh,
                    'SDT' => $SDT,
                    'DiaChi' => $DiaChi,
                    'CMND' => $CMND,
                    'GioiTinh' => $GioiTinh
                ];
                if ($isCreate == 1) {
                    $nv = (new NhanVienModel());
                    if ($nv->checkUnique($SDT, $CMND)) {
                        $check = $nv->createNV($data);
                    } else {
                        $db->transRollback();
                        $tk->deleteTK($Ma);
                        throw new \Exception("CMND hoặc SDT đã bị trùng!");
                    }
                } else {
                    if ($LoaiTaiKhoan == 1) {
                        $check = (new NhanVienModel())->updateNV($Ma, $data);
                    } else {
                        $check = (new NguoiDungModel())->updateND($Ma, $data);
                    }
                }
            }
            if (!$check) {
                $db->transRollback();
                throw new \Exception("Vui lòng liên hệ quản trị viên để được trợ giúp!");
                // return json_encode(['msg' =>  json_encode($check) . 'Vui lòng liên hệ quản trị viên để được trợ giúp! ' . json_encode($data)]);
            } else {
                $db->transCommit();
            }
            return json_encode(['msg' => 'ok', 'target' => $TenDangNhap, 'd' => $data]);
        } catch (\Exception $e) {
            $db->transRollback();
            return json_encode(['msg' => $e->getMessage()]);
        } finally {
            // Complete the transaction
            $db->transComplete();
        }
    }
    public function deleteAccount($id)
    {
        $tkm = new TaiKhoanModel();
        $tk = $tkm->getTKByID($id);
        try {
            if ($tk){
                $result = $tkm->deleteTK($id);
                if (!$result){
                    throw new \Exception("Xóa tài khoản thất bại");
                }
                if ($tk['LoaiTaiKhoan'] == 1){
                    $result = (new NhanVienModel())->deleteNV($id);
                }else{
                    $result = (new NguoiDungModel())->deleteND($id);
                }
                if (!$result){
                    throw new \Exception("Xóa thông tin thất bại");
                }
                return json_encode(['msg' => 'ok', 'target' => $tk['TenDangNhap']]);
            }else{
                return json_encode(['msg' => 'Không tìm thấy tài khoản với mã '.$id]);
            }
        }catch (\Exception $e) {
            return json_encode(['msg' => $e->getMessage()]);
        }
        
    }
    public function acceptOrder() {
        $db = new DatabaseHelper();
        $id_order = $this->request->getPost('idorder');
        $id_user = $this->request->getPost('iduser');
        $kq = $db->executeNonQuery('UPDATE `tbl_hoadon` SET `tbl_hoadon`.`MaNhanVien` = ? WHERE `tbl_hoadon`.`Ma` = ?', array($id_user, $id_order));
        if ($kq) {
            return json_encode(['msg' => 'success']);
        }
        return json_encode(['msg' => 'fails']);
    }
    public function account_register()
    {
        $data['title'] = 'Đăng Ký';
        return view('pages/account-register', $data);
    }

    public function addAccountRegister()
    {
        $db = new DatabaseHelper();
        $ten_dang_nhap = $this->request->getPost('ten_dang_nhap');
        $mat_khau = $this->request->getPost('mat_khau');
        $name = $this->request->getPost('name');
        $dob = $this->request->getPost('dob');
        $sex = $this->request->getPost('sex');
        $address = $this->request->getPost('address');
        $phone = $this->request->getPost('phone');
        $cmnd = $this->request->getPost('cmnd');
        $addUser = $db->executeNonQuery("CALL sp_add_account_and_user(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(null, $ten_dang_nhap, $mat_khau, 3, 2, $name, $dob, $sex, $address, $phone, $cmnd));
        if(isset($addUser) && $addUser > 0) {
            echo json_encode(['msg' => "success"]);
        }
        else {
            echo json_encode(['msg' => "error"]);
        }
    }


    public function my_account()
    {
        $data['title'] = 'Tài khoản của tôi';
        return view('pages/my-account', $data);
    }

    public function updateAccount()
    {
        $db = new DatabaseHelper();
        $ten_dang_nhap = $this->request->getPost('ten_dang_nhap');
        $mat_khau = $this->request->getPost('mat_khau');
        $name = $this->request->getPost('name');
        $dob = $this->request->getPost('dob');
        $sex = $this->request->getPost('sex');
        $address = $this->request->getPost('address');
        $phone = $this->request->getPost('phone');
        $cmnd = $this->request->getPost('cmnd');
        $addUser = $db->executeNonQuery("CALL sp_add_account_and_user(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(null, $ten_dang_nhap, $mat_khau, 3, 2, $name, $dob, $sex, $address, $phone, $cmnd));
        if(isset($addUser) && $addUser > 0) {
            echo json_encode(['msg' => "success"]);
        }
        else {
            echo json_encode(['msg' => "error"]);
        }
    }
}
