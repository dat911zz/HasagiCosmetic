<?php

namespace App\Controllers;
//Home controller
class Home extends BaseController
{
    //Action
    public function index()
    {
        $data['title'] = 'Trang Chủ';
        return view('home/index', $data);//Link to Views
    }
    public function about()
    {
<<<<<<< HEAD
        $data['title'] = 'Giới Thiệu';
        return view('home/about-us', $data);
=======
        $data['title'] = 'Thông Tin';
        return view('product-right-sidebar', $data);
    }
    public function product_details()
    {
        $id = $this->request->getVar('id');
        $data['IDProduct'] = $id;
        $data['title'] = $id;
        return view('home/product-details', $data);
    }
    public function products()
    {
        $data['title'] = 'Tất cả sản phẩm';
        return view('home/products', $data);
>>>>>>> 34c76bd7175e66ae349dd856d21908f6abe6a196
    }

    public function blog()
    {
        $data['title'] = 'Tạp chí làm đẹp';
        return view('home/blog', $data);
    }
}
