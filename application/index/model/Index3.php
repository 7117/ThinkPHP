<?php

namespace app\index\model;

use think\Model;


class Index3 extends Model
{

    public $name = 'tp5';

    public $type =[
        //前面是进行保存的时候  后面是在进行展示的时候展示
        'create_time'=>'timestamp:Y/m/d'
    ];

    public $insert = [
        'create_time' => 0
    ];

    public $update = [
        'content' => 0
    ];

    public $auto = [
        'content'
    ];



    public function getTitleAttr($query,$data)
    {
        return $query.'aaaaaa'.$data['id'];
    }

    public function setTitleAttr($query)
    {
        return $query.'aaaaaa';
    }

}