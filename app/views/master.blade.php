<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Morowali Sarjana App</title>
</head>
<body>
    <div class="container">
        @if(Session::has('message')) {{ Session::get('message') }}  @endif
        @yield('content')
    </div>
</body>
</html>