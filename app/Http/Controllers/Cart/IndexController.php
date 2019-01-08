<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\GoodsModel;

class IndexController extends Controller
{

    public function __construct()
    {

    }

    //
    public function index(Request $request)
    {
        $goods = session()->get('cart_goods');
       // echo '<pre>';print_r($goods);echo '</pre>';
        var_dump($goods);die;

        foreach($goods as $k=>$v){
            echo 'Goods ID: '.$v;echo '</br>';
            $detail = GoodsModel::where(['goods_id'=>$v])->first()->toArray();
            echo '<pre>';print_r($detail);echo '</pre>';
        }


    }


    /**
     * 添加商品
     */
    public function add($goods_id)
    {

        $cart_goods = session()->get('cart_goods');

        //是否已在购物车中
        if(!empty($cart_goods)){
            if(in_array($goods_id,$cart_goods)){
                echo '已存在购物车中';
                exit;
            }
        }

        session()->push('cart_goods',$goods_id);

        //减库存
        $where = ['goods_id'=>$goods_id];
        $store = GoodsModel::where($where)->value('store');

        if($store<=0){
            echo '库存不足';
            exit;
        }
       $rs = GoodsModel::where(['goods_id'=>$goods_id])->decrement('store');

       if($rs){
           echo '添加成功';
       }

    }

    /**
     * 删除商品
     */
    public function del($goods_id)
    {
        //判断 商品是否在 购物车中
        $goods = session()->get('cart_goods');
        if(in_array($goods_id,$goods)){
            //执行删除
            $rs = session()->pull('cart_goods',$goods_id);
            var_dump($rs);
        }else{
            //不在购物车中
            die("商品不在购物车中");
        }
        echo '<pre>';print_r($goods);echo '</pre>';

    }




}
