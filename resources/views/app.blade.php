<!DOCTYPE html>
<html lang="es">
    @include('sections.head')
<body class="sidebar-mini layout-fixed sidebar-collapse">
    <div class="wrapper" id="app">
        @if (Auth::check())
            <App ruta="{{route('basepath')}}"></App>
        @else
            <Auth ruta="{{route('basepath')}}"></Auth>
        @endif
    </div>
    @include('sections.script')
</body>
</html>
