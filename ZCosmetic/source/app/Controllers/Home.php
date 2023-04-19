<?php

namespace App\Controllers;
//Home controller
class Home extends BaseController
{
    //Action
    public function index()
    {
        return view('/pages/index');//Link to Views
    }
}
