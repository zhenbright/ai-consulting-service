<div class="row row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-3 mt-5">
    @foreach($products as $product)
        <div class="col">
            @include(EcommerceHelper::viewPath('includes.product-item'))
        </div>
    @endforeach
</div>

@if ($products instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator && $products->total() > 0)
    <div class="view-more mb-5 text-center wow animated fadeIn">
        {{ $products->withQueryString()->links(Theme::getThemeNamespace('partials.pagination')) }}
    </div>
@endif

@include(EcommerceHelper::viewPath('includes.quick-shop-modal'))
@include(EcommerceHelper::viewPath('includes.quick-view-modal'))