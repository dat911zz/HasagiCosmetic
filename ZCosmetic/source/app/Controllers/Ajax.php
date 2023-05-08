<?php

namespace App\Controllers;
include(FCPATH . '../source/app/Helpers/DatabaseHelper.php');
use DatabaseHelper;

//Ajax controller
class Ajax extends BaseController
{
    //Action
    public function showListCart($array)
    {
        $result = '<ul class="aside-cart-product-list">';
        $total = 0;
        foreach($array as $item) {
            $price = $item->Gia - ($item->GiamGia / 100.0) * $item->Gia;
            $total += $price * $item->SoLuong;
            $result = $result.'<li class="aside-product-list-item">
                                    <a href="#/" class="remove">×</a>
                                    <a href="/Home/Product?id='.$item->Ma.'">
                                        <img src="../../assets/Product_Images/'.$item->MaHinh.'.jpg'.'" width="68" height="84" alt="Image">
                                        <span class="product-title shorten-text two-row">'.$item->TenSanPham.'</span>
                                    </a>
                                    <span class="product-price">'.$item->SoLuong.' x '.number_format($price, 0, ',', '.').' VNĐ<span style="margin-left: 10px; color: red; text-decoration: line-through;">'.(($item->GiamGia > 0) ? number_format($item->Gia, 0, ',', '.').'VNĐ' : '').'</span></span>
                                </li>';             
        }
        $result .= '<a class="btn-total" href="/Pages/Cart">Xem Giỏ Hàng</a>
                    <a class="btn-total" href="/Pages/Checkout">Thanh Toán</a>
                    </ul>';
        return array($result, $total);
    }
    public function addCart()
    {
        $db = new DatabaseHelper();
        $id_product = $this->request->getPost('id_product');
        $quantity = $this->request->getPost('quantity');
        $id_user = $this->request->getPost('id_user');
        $kq = $db->executeNonQuery("CALL sp_addCart( ?, ?, ?);", array($id_product, $id_user, $quantity));
        $cart = $db->executeReader("CALL sp_getCart(?)", array($id_user));
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
        $cart = $db->executeReader("CALL sp_getCart(?)", array($id_user));
        if(isset($kq) && $kq > 0) {
            echo json_encode(['msg' => "success", 'quantity' => count($cart)]);
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
        if(isset($kq) && $kq > 0) {
            echo json_encode(['msg' => "success", 'total_price' => $price * $quantity]);
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
}
