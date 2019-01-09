{{-- 购物车 --}}
@extends('layouts.bst')

@section('content')
    <div class="container">
        <ul>
            @foreach($list as $k=>$v)
                <li>{{$v['goods_name']}}  -  {{$v['price']}}   --  {{$v['add_time']}}</li>
            @endforeach
        </ul>
    </div>
@endsection

@section('footer')
    @parent
@endsection