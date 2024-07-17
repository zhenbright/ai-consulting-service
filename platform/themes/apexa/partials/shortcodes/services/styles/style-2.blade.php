<!-- <section class="services__area-two shortcode-services shortcode-services-style-2" @style($variablesStyle)>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title white-title mb-50 tg-heading-subheading animation-style3">
                    @if ($subtitle = $shortcode->subtitle)
                        <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                    @endif

                    @if ($title = $shortcode->title)
                        <h2 class="title tg-element-title">{!! BaseHelper::clean($title) !!}</h2>
                    @endif
                </div>
            </div>
        </div>
        <div class="row justify-content-center gutter-24">
            @foreach($services as $service)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="services__item-two">
                        <div class="services__icon-two services-icon icon-large">
                            @if($iconImage = $service->getMetaData('icon_image', true))
                                {{ RvMedia::image($iconImage, 'icon') }}
                            @elseif($icon = $service->getMetaData('icon', true))
                                <x-core::icon :name="$icon"/>
                            @endif
                        </div>
                        <div class="services__content-two">
                            <h2 class="title">
                                <a class="truncate-1-custom" title="{{ $service->name }}" href="{{ $service->url }}">{{ $service->name }}</a>
                            </h2>

                            @if ($description = $service->description)
                                <p class="truncate-2-custom">{!! BaseHelper::clean($description) !!}</p>
                            @endif

                            <a href="{{ $service->url }}" class="btn">{{ __('Read More') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section> -->
<section id="services" class="project__area shortcode-projects shortcode-projects-style-2" @style($variablesStyle)>
    <div class="container-fluid p-0">
        <div class="swiper-container project-active-two">
            <div class="swiper-wrapper">
                @foreach($services as $service)
                    <div class="swiper-slide">
                        <div class="project__item-four">
                            <div class="project__thumb-four">
                                <a href="{{ $service->url }}">
                                    {{ RvMedia::image($service->image, $service->name, 'medium-square') }}
                                </a>
                            </div>
                            <div class="project__content-four">
                                <div class="left-content">
                                    <h4 class="title">
                                        <a class="truncate-1-custom" title="{{ $service->name }}" href="{{ $service->url }}">{{ $service->name }}</a>
                                    </h4>

                                    @if ($category = $service->getMetaData('category', true))
                                        <span>{!! BaseHelper::clean($category) !!}</span>
                                    @endif
                                </div>
                                <a href="{{ $service->url }}" class="right-arrow"><i class="flaticon-arrow-button"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
