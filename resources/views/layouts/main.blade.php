<!DOCTYPE html>
<html lang="en">
@include('layouts.partials.header')

<body>
    <main>
        <div class="layout">
            @include('layouts.partials.menus')
            @include('layouts.partials.sidebar')
            @include('layouts.partials.add-friend')
            @include('layouts.partials.new-chat')
            @yield('content')
        </div>
    </main>
    @include('layouts.partials.footer')
    @stack('script')
</body>
</html>
