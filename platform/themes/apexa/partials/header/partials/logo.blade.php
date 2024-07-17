@php
    $logo = theme_option('logo');

    $height = theme_option('logo_height', 25);
    $attributes = [
        'style' => sprintf('height: %s', is_numeric($height) ? "{$height}px" : $height),
        'loading' => false,
    ];

    $wrapperClass ??= null;
@endphp

@if ($logo)
    <div @class(['logo', $wrapperClass])>
        <a href="{{ BaseHelper::getHomepageUrl() }}">{{ RvMedia::image($logo, theme_option('site_title'), attributes: $attributes) }}</a>
    </div>
@endif
