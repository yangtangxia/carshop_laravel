<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

// 使用类
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //后台首页
    public function  index()
    {
        return view('admin.index.index');
    }


}
