<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
// 使用类
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CateController extends Controller
{
    //栏目列表
    public function  index()
    {
        $list = DB::table('cs_cate')->get()->toArray();
//        $link = $list->links(); // 分页
        $list = $this->resort($list); // 显示层级
        return view('admin.cate.index', ['list' => $list]);
    }

    // 添加页面
    public function  create()
    {
        $cateList = DB::table('cs_cate')->get()->toArray();
        $cateList = $this->resort($cateList);
        return view('admin.cate.create', ['catelist' => $cateList]);
    }

    // 添加执行
    public function add(Request $request)
    {
        $data = $request->post();
        unset($data['_token']);
        $file = $request->file('pic');

        if ($file->isValid()) {
            // 源文件名
            $originalName = $file->getClientOriginalName();
            // 扩展名
            $ext = $file->getClientOriginalExtension();
            $type = $file->getClientMimeType();
            $realPath = $file->getRealPath();
            $filename = date('Ymd').'/'. uniqid().'.'.$ext;

            $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
            $data['pic'] = $filename;
            if ($bool) {
                echo 'success';
            } else {
                echo 'fail';
                return false;
            }
        }

        $res = DB::table('cs_cate')->insert($data);
        if ($res) {
            echo '<script>alert("添加成功")</script>';
        } else {
            echo '<script>alert("添加失败")</script>';
        }
        return false;
    }

    // 编辑页面
    public function edit(Request $request)
    {
        $id = $request->input('id');
        if (!$id) {
            return false;
        }
        $info = DB::table('cs_cate')->find($id);
        if (!$info) {
            return false;
        }
        $cateList = DB::table('cs_cate')->get()->toArray();
        $cateList = $this->resort($cateList);

        return view('admin.cate.edit', ['cates'=> $info, 'cateres' => $cateList]);
    }

    // 编辑提交
    public function update(Request $request)
    {
        $data = $request->post();
        $id = $data['id'];
        unset($data['_token']);
        unset($data['id']);
        $file = $request->file('pic');
        if ($file->isValid()) {
            // 源文件名
            $originalName = $file->getClientOriginalName();
            // 扩展名
            $ext = $file->getClientOriginalExtension();
            $type = $file->getClientMimeType();
            $realPath = $file->getRealPath();
            $filename = date('Ymd').'/'. uniqid().'.'.$ext;

            $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
            $data['pic'] = $filename;
            if ($bool) {
                echo 'success';
            } else {
                echo 'fail';
                return false;
            }
        }
        $res = DB::table('cs_cate')->where('id', $id)->update($data);
        return $this->index();
    }

    // 删除
    public function delete(Request $request)
    {
        $id = $request->input('id');

        if (!$id) {
            echo '非法操作';
        }

        $res = DB::table('cs_cate')->delete($id);
        if ($res) {
            echo "<script>alert('删除成功')</script>";
        } else {
            echo "<script>alert('删除失败')</script>";
        }
    }


    // 处理层级关系Tree
    public function resort($data, $parentid = 0, $level = 0)
    {
        static $ret = array();
        foreach($data as $k => $v) {
            if($v->parentid == $parentid) {
                $v->level = $level;
                $ret[] = $v;
                $this->resort($data, $v->id,$level+1);
            }
        }
        return $ret;
    }

}
