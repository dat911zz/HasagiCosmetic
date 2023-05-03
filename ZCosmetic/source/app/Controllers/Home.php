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
    }

    public function blog()
    {
        $data['title'] = 'Tạp chí làm đẹp';
        return view('home/blog', $data);
=======
        $data['title'] = 'Thông Tin';
        return view('home/about-us', $data);
>>>>>>> e549af32a98c553f1f7c7a284a05de567068fb6f
    }
}
