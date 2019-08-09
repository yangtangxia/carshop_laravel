<?php

namespace App\Http\Controllers\Home;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// 使用类
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function  index()
    {
        $str = "name=yangjizhou&age=26&email=12312@qq.com&phone=19878999999&city=贵阳";
        parse_str($str,$res);
        dump($res);
        dump($res['city']);
        echo '<pre>';
//        $res = DB::select('select * from cs_cate');
        $res = DB::table('cs_cate')->pluck('name');
        var_dump($res);
        echo '我是前台首页';
    }
}
