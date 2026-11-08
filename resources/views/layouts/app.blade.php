<!doctype html>
<html lang="id">
@include('layouts.partials.head')

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        @include('layouts.partials.nav')
        @include('layouts.partials.sidebar')

        <main class="app-main">
            @yield('content')
        </main>

        @include('layouts.partials.footer')
    </div>

    @include('layouts.partials.scripts')
    @stack('scripts')
</body>
</html>