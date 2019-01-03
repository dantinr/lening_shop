@extends('layouts.mama')

@section('title') {{$title}}    @endsection



@section('header')
    @parent
    <p style="color: red;">This is Child header.</p>
@endsection


@section('content')
    <p>这里是 Child Content.</p>
@endsection


@section('footer')
    <p style="color: red;">This is Child footer .</p>
    @parent
@endsection