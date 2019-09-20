<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\DB;

class Index extends Controller
{
    public function index()
    {
//        http://tp.tp.tp/index/index/index?name=1111
//        方法一：
//        $request=Request::instance();
//        $a=$request->get('name');
//        方法二：
//        $a=$this->request->get('name');
//        第一个参数提示信息  第二个是网址路径
        $this->success("aaa","http://www.baidu.com/");
        echo "1";
    }

    public function hello()
    {
        echo "2";
    }
}
