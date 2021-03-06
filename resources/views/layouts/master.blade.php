<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<?php $time = time() ?>
<head>
    <!--Include head html-->
@include('layouts.head')
<!--Include head html-->
</head>
<header>
@include('layouts.loading')
<!--Include header html-->
@include('layouts.header')
<!--Include header html-->
</header>
<body
    class="home page page-id-1804 page-template-default layout-wide responsive wpb-js-composer js-comp-ver-4.8.1 vc_responsive">
<main class="content">

    @yield('content')

    {{--Register form--}}
    @include('users.register')
    {{--Register form--}}
    {{--Login form--}}
    @include('users.login')
    {{--Login form--}}

</main>
</body>

<!--Include footer html-->
@include('layouts.footer')
<!--Include footer html-->

@include('general.extension')

{{--Include script library--}}
@include('layouts.script')
{{--End include script--}}

@include('general.notify')
</html>
