<?php

namespace App\Controllers;
//Home controller
class Pages extends BaseController
{
    public function cart()
    {
        $data['title'] = 'Giỏ Hàng';
        return view('pages/cart', $data);
    }
    public function checkout()
    {
        $data['title'] = 'Thanh Toán';
        return view('pages/product-checkout', $data);
    }
    public function login()
    {
        $data['title'] = 'Đăng Nhập';
        return view('pages/account-login', $data);
    }
}