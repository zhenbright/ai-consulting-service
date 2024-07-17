<!doctype html>
<html {!! Theme::htmlAttributes() !!}>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! Theme::partial('css-variable-declare') !!}

    {!! Theme::header() !!}
</head>

<body {!! Theme::bodyAttributes() !!} >

<button title="{{ __('Back to top') }}" class="scroll__top scroll-to-target" data-target="html">
    <x-core::icon name="ti ti-chevron-up"/>
</button>

{!! apply_filters(THEME_FRONT_BODY, null) !!}

{!! Theme::partial('header') !!}

<main class="fix">
    @yield('content')
</main>

<script>
    'use strict';

    window.siteConfig = {};
</script>

{!! Theme::partial('footer') !!}

{!! Theme::footer() !!}
</body>
</html>

