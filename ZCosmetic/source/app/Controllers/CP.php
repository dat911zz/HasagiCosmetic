<?php 

namespace App\Controllers;
use DatabaseHelper;
class CP extends BaseController
{
    public function index()
    {
        $data['title'] = 'Trang quản trị';
        return view('cp/index', $data);
    }
}

?>