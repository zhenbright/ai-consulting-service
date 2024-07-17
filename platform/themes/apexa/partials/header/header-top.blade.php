@php
    $bgColor = theme_option('header_top_background_color', '#0e104b');
    $textColor = theme_option('header_top_text_color', '#ffffff');
    $customContainer ??= true;

    $ecommerceActive = is_plugin_active('ecommerce');
@endphp

<div @class(['tg-header__top', 'ecommerce' => $ecommerceActive, $wrapperClass ?? null])
    @style([
        "--header-top-background-color: $bgColor" => $bgColor,
        "--header-top-text-color: $textColor" => $textColor,
    ])
>
    <div @class(['container', 'custom-container' => $customContainer])>
        <div class="row">
            <div class="{{ $ecommerceActive ? 'col-lg-8' : 'col-lg-6' }}">
                {!! dynamic_sidebar('header_top_start_sidebar') !!}
            </div>
            <div class="{{ $ecommerceActive ? 'col-lg-4' : 'col-lg-6' }}">
                @if($ecommerceActive)
                    {!! Theme::partial('header.action-buttons.ecommerce-action-buttons') !!}
                @else
                    {!! dynamic_sidebar('header_top_end_sidebar') !!}
                @endif
            </div>
        </div>
    </div>
</div>
