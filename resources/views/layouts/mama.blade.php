<html>
<head>
    <title>Lening-@yield('title')</title>
</head>
<body>
@section('header')
    <p style="color: blue">This is the mama header.</p>
@show

<div class="container">
    @yield('content')

    <table border="1">
        <thead>
            <td>UID</td><td>Name</td><td>Age</td><td>Email</td><td>Reg_time</td>
        </thead>
        <tbody>
            @foreach($list as $v)
                <tr>
                    <td>{{$v['uid']}}</td><td>{{$v['name']}}</td><td>{{$v['age']}}</td><td>{{$v['email']}}</td><td>{{date('Y-m-d H:i:s',$v['reg_time'])}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@section('footer')
    <p style="color: blue">This is the mama footer.</p>
@show
</body>
</html>