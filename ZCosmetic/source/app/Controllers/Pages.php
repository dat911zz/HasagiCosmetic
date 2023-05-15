<?php

namespace App\Controllers;
//Home controller
class Pages extends BaseController
{
    // pages
    public function account_login()
    {
        $data['title'] = 'Đăng Nhập';
        return view('pages/account-login', $data);
    }

    public function account_register()
    {
        $data['title'] = 'Đăng Nhập';
        return view('pages/account-register', $data);
    }

    public function cart()
    {
        $data['title'] = 'Giỏ Hàng';
        return view('pages/cart', $data);
    }
    
    public function category()
    {
        $data['title'] = 'Loại';
        return view('pages/category', $data);
    }
    public function contact()
    {
        $data['title'] = 'Liên Hệ';
        return view('pages/contact', $data);
    }
    public function faq()
    {
        $data['title'] = 'Câu hỏi thường gặp';
        return view('pages/faq', $data);
    }
    public function logout()
    {
        $data['title'] = 'Đăng Xuất';
        return view('pages/logout', $data);
    }
    
    public function my_account()
    {
        $data['title'] = 'Tài Khoản';
        return view('pages/my-account', $data);
    }
    
    public function product_checkout()
    {
        $data['title'] = 'Thanh toán sản phẩm';
        return view('pages/product-checkout', $data);
    }
}
