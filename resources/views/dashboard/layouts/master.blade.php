<!DOCTYPE html>
<html lang="es">

@include('dashboard.layouts.partials.head')

<body>
    @include('dashboard.layouts.partials.header')
    <main class="container-fluid">
        @yield('main-content')
    </main>
    @include('dashboard.layouts.partials.footer')
    @include('dashboard.layouts.partials.scripts')
</body>

</html>
