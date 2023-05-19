<?php

namespace App\Controllers;
//Home controller
class Chat extends BaseController
{
    //Action
    public function chat_users()
    {
        $data['title'] = 'Chat Hỗ Trợ Khách Hàng';
        return view('chat/users', $data);//Link to Views
    }
    public function chat_php_users()
    {
        $data['title'] = 'DanhSach Hỗ Trợ Khách Hàng';
    
        return view('chat/php/users', $data);//Link to Views
    }

    
    public function chat_php_search()
    {
        $data['title'] = 'Tìm Kiếm';
    
        return view('chat/php/search', $data);//Link to Views
    }
    public function chat_id()
    {
       
        $id = $this->request->getVar('id');
        $data['ID_User'] = $id;
        $data['title'] = 'Chat'. $id;
        return view('chat/chat', $data);//Link to Views
    }

    
    public function chat_php_get_chat()
    {
        $data['title'] = 'Get Chat';
    
        return view('chat/php/get-chat', $data);//Link to Views
    }
    public function chat_php_insert_chat()
    {
        $data['title'] = 'Get Chat';
    
        return view('chat/php/insert-chat', $data);//Link to Views
    }
}
