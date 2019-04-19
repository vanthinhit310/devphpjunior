<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <?php $time = time() ?>
    <head>
        <!--Include head html-->
        @include('layouts.head')
        <!--Include head html-->
    </head>
    <header>
        <!--Include header html-->
        @include('layouts.header')
        <!--Include header html-->
    </header>
    <body>
        <main class="content">
            @yield('content')
        </main>
    </body>
    <footer>
        <!--Include footer html-->
        @include('layouts.footer')
        <!--Include footer html-->
    </footer>
</html>
