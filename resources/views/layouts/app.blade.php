<!DOCTYPE html>
<html lang="pt-br">
<head>
    @include('layouts.meta')

    @yield('titulo')
</head>
<body>
    @yield('content')

    @include('layouts.footer')

    @yield('jsCustom')
</body>
</html>
