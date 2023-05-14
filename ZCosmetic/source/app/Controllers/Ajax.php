<?php

namespace App\Controllers;
include(FCPATH . '../source/app/Helpers/DatabaseHelper.php');
use DatabaseHelper;

//Ajax controller
class Ajax extends BaseController
{
    //Action
    public function getDataProduct($id_product) {
        $db = new DatabaseHelper();
        return $db->executeReader("SELECT tbl_sanpham.*, tbl_gia.Gia, tbl_giasanpham.*
                                    FROM tbl_sanpham, tbl_giasanpham, tbl_gia
                                    WHERE tbl_sanpham.Ma = ? and tbl_sanpham.Ma = tbl_giasanpham.MaSanPham and tbl_giasanpham.MaGia = tbl_gia.Ma and tbl_giasanpham.NgayHetHieuLuc is null", array($id_product));
    }
    public function getProduct() {
        $id_product = $this->request->getPost('id_product');
        return json_encode(['value'=>$this->getDataProduct($id_product)]);
    }
    public function showListCart($array)
    {
        $result = '<ul class="aside-cart-product-list">';
        $total = 0;
        if(count($array) <= 0) {
            $result = '<div style="padding-top: 20px; padding-bottom: 60px; text-align: center; color: orange;">Giỏ hàng đang rỗng</div>';
            return array($result, $total);
        }
        foreach($array as $item) {
            $price = $item->Gia - ($item->GiamGia / 100.0) * $item->Gia;
            $total += $price * $item->SoLuong;
            $result = $result.'<li class="aside-product-list-item">
                                    <a href="#/" onclick="removeCart('.$item->MaSanPham.', '.$item->MaNguoiDung.')" class="remove">×</a>
                                    <a href="/Home/Product?id='.$item->Ma.'">
                                        <img src="../../assets/Product_Images/'.$item->MaHinh.'.jpg'.'" width="68" height="84" alt="Image">
                                        <span class="product-title shorten-text two-row">'.$item->TenSanPham.'</span>
                                    </a>
                                    <span class="product-price">'.$item->SoLuong.' x '.number_format($price, 0, ',', '.').' VNĐ<span style="margin-left: 10px; color: red; text-decoration: line-through;">'.(($item->GiamGia > 0) ? number_format($item->Gia, 0, ',', '.').'VNĐ' : '').'</span></span>
                                </li>';             
        }
        $result .= '<a class="btn-total" href="/Pages/Cart">Xem Giỏ Hàng</a>
                    <a class="btn-total" id="checkout" href="#">Thanh Toán</a>
                    </ul>';
        return array($result, $total);
    }
    private function getCart($id_user) {
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
        if(isset($kq) && $kq > 0) {
            echo json_encode(['msg' => "success", 'quantity' => count($cart), 'html' => $rt[0], 'total' => $rt[1] ]);
        }
        else {
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
        if(isset($kq) && $kq > 0) {
            echo json_encode(['msg' => "success", 'quantity' => count($cart), 'html' => $rt[0]]);
        }
        else {
            echo json_encode(['msg' => "error"]);
        }
    }
    public function updateCart() {
        $db = new DatabaseHelper();
        $id_product = $this->request->getPost('id_product');
        $quantity = $this->request->getPost('quantity');
        $id_user = $this->request->getPost('id_user');
        $price = $this->request->getPost('price');
        $kq = $db->executeNonQuery("CALL sp_updateCart( ?, ?, ?);", array($id_product, $quantity, $id_user));
        $cart = $this->getCart($id_user);
        $rt = $this->showListCart($cart);
        if(isset($kq) && $kq > 0) {
            echo json_encode(['msg' => "success", 'total_price' => $price * $quantity, 'html' => $rt[0]]);
        }
        else {
            echo json_encode(['msg' => "error"]);
        }
    }
    public function getTotalCart() {
        $db = new DatabaseHelper();
        $id_user = $this->request->getPost('id_user');
        $total = $db->executeReader('CALL sp_getTotalCart(?)', array($id_user))[0]->Total;
        if($total > 0) {
            echo json_encode(['msg' => "success", 'total_cart' => $total]);
        }
        else {
            echo json_encode(['msg' => "error"]);
        }
    }
    public function checkoutCarts() {
        $id_user = $this->request->getPost('id_user');
        $carts = $this->getCart(($id_user));
        $change = false;
        foreach($carts as $cart) {
            if($cart->SoLuong > $cart->SoLuongTon) {
                $change = true;
                $cart->SoLuong = $cart->SoLuongTon;
            }
        }
        return json_encode(['value'=>$carts, 'delete'=>1, 'change_quantity'=>$change]);
    }
    public function buyNow() {
        $id_product = $this->request->getPost('id_product');
        return json_encode(['value'=>$this->getDataProduct($id_product), 'delete'=>0]);
    }
    public function pay() {
        $db = new DatabaseHelper();
        $id_user = $this->request->getPost('id_user');
        $id_product = $this->request->getPost('id_product');
        $quantity = $this->request->getPost('quantity');
        $delete = $this->request->getPost('delete');
        $mahd = $db->executeReader("SET @mahd = 0; CALL sp_createHoaDon(?, @mahd); SELECT @mahd 'MaHD'", array($id_user))[0]->MaHD;
        if($delete) {
            $kq = $db->executeNonQuery('CALL sp_checkoutCarts(?, ?)', array($id_user, $mahd));
        }
        else {
            $kq = $db->executeNonQuery('CALL sp_checkoutOneProduct(?, ?, ?)', array($mahd, $id_product, $quantity));
        }
        if($kq) {
            return json_encode(['msg'=>'success']);
        }
        return json_encode(['msg'=>'fails']);
    }
}
