<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel-Blade</title>
</head>
<body>
    <h1>表单测试</h1>


    <form action="/form/test" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="text" name="msg"><br><br><br>

        <input type="file" name="media"><br><br><br>

        <input type="submit" value="SUBMIT">
    </form>
</body>
</html>