<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use QL\QueryList;

// 使用类
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //后台首页
    public function  index()
    {
        $data = QueryList::get('https://www.58pic.com/piccate/8-0-0.html')->find('img')->attrs('src')->toArray();
        dump($data);
//        return view('admin.index.index');
    }


}
