<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Grid;

use App\Model\UserModel;

class UsersController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->header('商品管理')
            ->description('商品列表')
        ->body($this->grid());
    }

    protected function grid()
    {
        $grid = new Grid(new UserModel());

        $grid->uid('UID');
        $grid->nick_name('昵称');
        $grid->age('年龄');
        $grid->email('邮箱');
        $grid->reg_time('注册时间')->display(function($time){
            return date('Y-m-d H:i:s');
        });

        return $grid;
    }


    public function edit($id)
    {
        echo __METHOD__;
    }

    //删除
    public function destroy($id)
    {
        echo __METHOD__;die;
    }

    //创建
    public function create()
    {
        echo __METHOD__;die;
    }

    public function show($id)
    {
        echo __METHOD__;echo '</br>';
    }
}
