<?php

namespace app\index\controller;

use app\index\model\Users;
use think\Controller;
use think\Db;
use think\db\Query;
use app\index\model\Index3 as Index3Model;
use app\index\validate\Index3 as IndexValidate;

class Index3 extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index3()
    {
        $info1 = Db::execute("insert into tp5 (id,title) values(320,'知道吗')");
        print_r($info1);

        $info2 = Db::query(" select * from tp5 where id=310 ");
        print_r($info2);

        $info3 = Db::execute(" update tp5 set title='好的2' where id=310 ");
        print_r($info3);

        $info4 = Db::execute(" delete from tp5 where id=310 ");
        print_r($info4);


        $info5 = Db::connect('db2')->query("select * from access ");
        print_r($info5);

        return;

    }

    public function index4()
    {
        $info1 = Db::execute("insert into tp5 (id,title) values(?,?)", [3330, '知道吗']);
        print_r($info1);

        $info2 = Db::query(" select * from tp5 where id=? ", [310]);
        print_r($info2);

        $info3 = Db::execute(" update tp5 set title=? where id=? ", ['好的2', 310]);
        print_r($info3);

        $info4 = Db::execute(" delete from tp5 where id=?", [310]);
        print_r($info4);


        $info5 = Db::connect('db2')->query(" select * from access ");
        print_r($info5);

        return;

    }


    public function index5()
    {
        // $index5 = Db::table('tp5')->insert(['id'=>1000,'title'=>'title content']);

        $index6 = Db::table('tp5')->where('id', 2)->update(['title' => 'ddddd']);

        $index6 = Db::table('tp5')->where('id', 2)->select();
        print_r($index6);

        $index6 = Db::table('tp5')->where('id', 2)->delete();


        $index6 = Db::table('tp5')->where('id', 1)->delete();

        $index6 = Db::table('tp5')->field('id,title')->order('id', 'desc')->limit(10)->select();
        var_dump($index6);


        return;

    }


    public function index6()
    {
        Db::transaction(function () {
            Db::table('tp5')->where('id', 5)->delete();

            Db::table('tp5')->where('id', 6)->delete();
        });
    }

    public function index7()
    {
        Db::startTrans();

        try {
            Db::table('tp5')->where('id', 12)->delete();
            Db::table('tp5')->where('id', 13)->delete();
            Db::commit();
        } catch (\Exception $e) {
            Db::rollback();
        }

        return;
    }

    public function index8()
    {
        $res = Db::name('tp5')->where('id', 'in', [1, 2, 3, 4, 5, 6, 8, 9])->where('id', '<', 32)->select();
        // var_dump($res);

        $res = Db::name('tp5')->where('id', 'exp', 'in(1,3,4,5,6,7,8,10)')->where('id', '<', 32)->select();
        // var_dump($res);

        $res = Db::name('tp5')->where('id', 'exp', 'in(1,3,4,5,6,7,8,10)')->where('id', '<', 32)->limit(4)->select();
        var_dump($res);

    }

    public function index9()
    {

        $query = new Query();
        $query->name('tp5')->where('id', 8);
        $res = Db::select($query);
        var_dump($res);

    }

    public function index10()
    {
        $con = Db::name('tp5')->where('id', 8)->value('title');
        var_dump($con);
    }

    public function index11()
    {
        $con = Db::name('tp5')->where('id', '<', 8)->column('title');
        // var_dump($con);

        $con = Db::name('tp5')->column('title', 'content');
        var_dump($con);
    }

    public function index12()
    {
        $con = Db::name('tp5')->count();
        // var_dump($con);

        $con = Db::name('tp5')->max('id');
        var_dump($con);
    }

    public function index13()
    {
        $con = Db::name('tp5')->where("id < :id", ['id' => 5])->select();
        // var_dump($con);

        $res = Db::table('tp5')->where('id', '>', 1)->chunk(2, function ($users) {
            var_dump($users);
            echo "1";
        });
    }

    public function index14()
    {
        $res = Index3Model::get(17);
        // var_dump($res);

        $query = new Index3Model();
        $query->insertfunc($query);

    }

    public function index15()
    {
        $users = new Index3Model();

        $list = [
            ['title' => 1], ['title' => 2]
        ];

        $users->saveAll($list);

    }

    public function index16()
    {
        $res = Index3Model::getByTitle('第5次留言啊');
        var_dump($res['id']);
        var_dump($res->id);
    }

    public function index17()
    {
        $res = Index3Model::all();
        var_dump($res);
        echo "111111";

        $res = Index3Model::all(['title' => '第5次留言啊']);
        var_dump($res);

    }

    public function index18()
    {
        $res = Index3Model::destroy(14);
    }

    public function index19()
    {
        $res = Index3Model::get(27);
        var_dump($res->title);
        var_dump($res['title']);
    }

    public function index20()
    {
        $res = Index3Model::get(27);
        var_dump($res->create_time);
        var_dump($res);
    }

    public function index21()
    {
        $res = Index3Model::get(27);
        echo $res['create_time'];
        $res->create_time = '2020-10-22';
        $res->save();
    }

    public function index22()
    {
        $res = Index3Model::get(27);
        $res->save();
    }

    public function index23()
    {
        $res = Index3Model::get(27);
        $res->save();
    }

    public function index24()
    {
        $user['title'] = 11111111;
        Index3Model::update($user, ['id' => 19]);
    }

    public function index25()
    {
        $users = new Index3Model();
        if ($users->allowField(true)->validate(true)->save(input('post.'))) {
            return '用户';
        } else {
            return $users->getError();
        }
    }

    public function index26()
    {
        $a = $this->request->post();

        $b = $this->validate($a, 'Index3');

        if ($b) {
            echo "t";
        } else {
            echo "f";
        }

        Index3Model::insert($a);
    }




}
