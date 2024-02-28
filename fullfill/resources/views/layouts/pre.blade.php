<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FullFill - Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
</head>
<body style=" background: rgb(250,225,180);
background: linear-gradient(90deg, rgba(250,225,180,1) 0%, rgb(153, 113, 61) 100%); ">
<div id="app" >
    <main id="content" >
        @yield('content')
    </main>
</div>
<script src="{{mix('js/app.js')}}"></script>
</body>
</html>
