@php
    Theme::set('pageTitle', $category->name);
    Theme::layout('full-width');
@endphp

<div class="container mt-5 mb-5">
    <div class="row">
        @include('plugins/ecommerce::themes.includes.product-items')
    </div>
</div>
