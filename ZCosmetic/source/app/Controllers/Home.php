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
        $data['title'] = 'Thông Tin';
        return view('home/about-us', $data);
    }
}
