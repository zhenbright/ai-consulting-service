@php
    $style = $shortcode->style;
    $style = $style ? (in_array($style, [
        'style-1',
        'style-2',
        'style-3',
    ]) ? $style : 'style-1') : null;

    $bgColor = $shortcode->background_color;
    $bgImage = $shortcode->background_image ? RvMedia::getImageUrl($shortcode->background_image) : null;

    $variablesStyle = [
        "--background-color: $bgColor" => $bgColor,
        "--background-image: url($bgImage)" => $bgImage,
    ];
@endphp

{!! Theme::partial("shortcodes.service-categories.styles.$style", compact('shortcode', 'serviceCategories', 'variablesStyle')) !!}
