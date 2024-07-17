<ul class="tg-header__top-info right-side list-wrap justify-content-end">
    <!-- @if(count($currencies = get_all_currencies()) > 1)
        <li class="currency-switcher">
            <a class=" btn-sm dropdown-toggle" type="button" id="dropdown-currencies" data-bs-toggle="dropdown" aria-expanded="false">
                {{ get_application_currency()->title }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdown-currencies">
                @foreach ($currencies as $currency)
                    @if ($currency->id !== get_application_currency_id())
                        <li>
                            <a class="dropdown-item" href="{{ route('public.change-currency', $currency->title) }}">{{ $currency->title }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </li>
    @endif

    <li>
        <a title="{{ __('Compare') }}" href="{{ route('public.compare') }}">
            <x-core::icon name="ti ti-refresh"/>
        </a>
    </li>
    <li>
        <a title="{{ __('Wishlist') }}" href="{{ route('public.wishlist') }}">
            <x-core::icon name="ti ti-heart"/>
        </a>
    </li>
    <li>
        <a title="{{ __('Cart') }}" href="{{ route('public.cart') }}">
            <x-core::icon name="ti ti-shopping-cart"/>
        </a>
    </li> -->
    <li>
        @if (auth('customer')->check())
            <a class="truncate-1-custom" title="{{ $name = auth('customer')->user()->name }}" href="{{ route('customer.overview') }}">{{ __('Hi, :name', ['name' => $name]) }}</a>
        @else
            <a href="{{ route('customer.login') }}">{{ __('Login') }}</a>
        @endif
    </li>
</ul>