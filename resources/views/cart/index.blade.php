{{-- 购物车 --}}
@extends('layouts.bst')

@section('content')
    <div class="container">
        <ul>
            @foreach($list as $k=>$v)
                <li>{{$v['goods_id']}}    --  {{$v['goods_name']}}  -  {{$v['price']}}   --  {{$v['add_time']}}
                    <a href="/cart/del2/{{$v['goods_id']}}" class="del_goods">删除</a></li>
            @endforeach
        </ul>
    </div>
@endsection

@section('footer')
    @parent
@endsection