<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'AdminLTE')</title>
    @vite(['resources/js/admin.js','resources/css/admin.css'])
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        @yield('content')
    </div>
</body>
</html>
