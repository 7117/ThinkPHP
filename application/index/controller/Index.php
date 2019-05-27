<?php
namespace app\index\controller;

use think\Controller;
use think\Request;
use think\DB;

class Index extends Controller
{
    public function index()
    {
        
        print_r($this->request->param());
        
        $data = Db::name('user')->find();

        $this->assign('data',$data);

        return $this->fetch();


    }
}
