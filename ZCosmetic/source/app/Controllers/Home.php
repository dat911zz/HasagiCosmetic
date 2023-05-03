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
        $data['title'] = 'Giới Thiệu';
        return view('home/about-us', $data);
    }

    public function blog()
    {
        $data['title'] = 'Tạp chí làm đẹp';
        return view('home/blog', $data);
    }
}
