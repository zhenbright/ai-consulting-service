<section id="about" class="about__area-eight shortcode-about-us-information shortcode-about-us-information-style-15" @style($variablesStyle)>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-9 mb-40">
                <div class="about__img-wrap-seven about__img-wrap-home8">
                    @if ($image = $shortcode->image)
                        {{ RvMedia::image($image, 'about-us-information', attributes: ['class' => 'img-main']) }}}
                    @endif

                    @if (($dataCount = $shortcode->data_count) && ($dataCountDescription = $shortcode->data_count_description))
                        <div class="card-number-star">
                                <div class="number">
                                    <span class="text-stroke-2">{{ $dataCount }}</span>
                                    <div class="rates">
                                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.29986 10.0531L3.24609 11.8876C3.11118 11.9732 2.97014 12.0099 2.82297 11.9977C2.6758 11.9855 2.54703 11.9366 2.43665 11.8509C2.32628 11.7653 2.24043 11.6584 2.17911 11.5303C2.11779 11.4016 2.10552 11.2578 2.14231 11.0988L2.95175 7.63157L0.247503 5.30174C0.124861 5.19167 0.0483328 5.06619 0.0179177 4.9253C-0.0129879 4.7849 -0.00391252 4.64743 0.0451441 4.5129C0.0942007 4.37837 0.167786 4.2683 0.265899 4.18269C0.364012 4.09708 0.498918 4.04204 0.670616 4.01758L4.23948 3.70571L5.6192 0.440283C5.68052 0.293522 5.77569 0.183451 5.90471 0.110071C6.03324 0.0366903 6.16496 0 6.29986 0C6.43477 0 6.56673 0.0366903 6.69575 0.110071C6.82428 0.183451 6.9192 0.293522 6.98052 0.440283L8.36024 3.70571L11.9291 4.01758C12.1008 4.04204 12.2357 4.09708 12.3338 4.18269C12.4319 4.2683 12.5055 4.37837 12.5546 4.5129C12.6036 4.64743 12.613 4.7849 12.5825 4.9253C12.5516 5.06619 12.4749 5.19167 12.3522 5.30174L9.64797 7.63157L10.4574 11.0988C10.4942 11.2578 10.4819 11.4016 10.4206 11.5303C10.3593 11.6584 10.2734 11.7653 10.1631 11.8509C10.0527 11.9366 9.92392 11.9855 9.77675 11.9977C9.62958 12.0099 9.48854 11.9732 9.35363 11.8876L6.29986 10.0531Z" fill="#FFB930" />
                                        </svg>
                                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.29986 10.0531L3.24609 11.8876C3.11118 11.9732 2.97014 12.0099 2.82297 11.9977C2.6758 11.9855 2.54703 11.9366 2.43665 11.8509C2.32628 11.7653 2.24043 11.6584 2.17911 11.5303C2.11779 11.4016 2.10552 11.2578 2.14231 11.0988L2.95175 7.63157L0.247503 5.30174C0.124861 5.19167 0.0483328 5.06619 0.0179177 4.9253C-0.0129879 4.7849 -0.00391252 4.64743 0.0451441 4.5129C0.0942007 4.37837 0.167786 4.2683 0.265899 4.18269C0.364012 4.09708 0.498918 4.04204 0.670616 4.01758L4.23948 3.70571L5.6192 0.440283C5.68052 0.293522 5.77569 0.183451 5.90471 0.110071C6.03324 0.0366903 6.16496 0 6.29986 0C6.43477 0 6.56673 0.0366903 6.69575 0.110071C6.82428 0.183451 6.9192 0.293522 6.98052 0.440283L8.36024 3.70571L11.9291 4.01758C12.1008 4.04204 12.2357 4.09708 12.3338 4.18269C12.4319 4.2683 12.5055 4.37837 12.5546 4.5129C12.6036 4.64743 12.613 4.7849 12.5825 4.9253C12.5516 5.06619 12.4749 5.19167 12.3522 5.30174L9.64797 7.63157L10.4574 11.0988C10.4942 11.2578 10.4819 11.4016 10.4206 11.5303C10.3593 11.6584 10.2734 11.7653 10.1631 11.8509C10.0527 11.9366 9.92392 11.9855 9.77675 11.9977C9.62958 12.0099 9.48854 11.9732 9.35363 11.8876L6.29986 10.0531Z" fill="#FFB930" />
                                        </svg>
                                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.29986 10.0531L3.24609 11.8876C3.11118 11.9732 2.97014 12.0099 2.82297 11.9977C2.6758 11.9855 2.54703 11.9366 2.43665 11.8509C2.32628 11.7653 2.24043 11.6584 2.17911 11.5303C2.11779 11.4016 2.10552 11.2578 2.14231 11.0988L2.95175 7.63157L0.247503 5.30174C0.124861 5.19167 0.0483328 5.06619 0.0179177 4.9253C-0.0129879 4.7849 -0.00391252 4.64743 0.0451441 4.5129C0.0942007 4.37837 0.167786 4.2683 0.265899 4.18269C0.364012 4.09708 0.498918 4.04204 0.670616 4.01758L4.23948 3.70571L5.6192 0.440283C5.68052 0.293522 5.77569 0.183451 5.90471 0.110071C6.03324 0.0366903 6.16496 0 6.29986 0C6.43477 0 6.56673 0.0366903 6.69575 0.110071C6.82428 0.183451 6.9192 0.293522 6.98052 0.440283L8.36024 3.70571L11.9291 4.01758C12.1008 4.04204 12.2357 4.09708 12.3338 4.18269C12.4319 4.2683 12.5055 4.37837 12.5546 4.5129C12.6036 4.64743 12.613 4.7849 12.5825 4.9253C12.5516 5.06619 12.4749 5.19167 12.3522 5.30174L9.64797 7.63157L10.4574 11.0988C10.4942 11.2578 10.4819 11.4016 10.4206 11.5303C10.3593 11.6584 10.2734 11.7653 10.1631 11.8509C10.0527 11.9366 9.92392 11.9855 9.77675 11.9977C9.62958 12.0099 9.48854 11.9732 9.35363 11.8876L6.29986 10.0531Z" fill="#FFB930" />
                                        </svg>
                                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.29986 10.0531L3.24609 11.8876C3.11118 11.9732 2.97014 12.0099 2.82297 11.9977C2.6758 11.9855 2.54703 11.9366 2.43665 11.8509C2.32628 11.7653 2.24043 11.6584 2.17911 11.5303C2.11779 11.4016 2.10552 11.2578 2.14231 11.0988L2.95175 7.63157L0.247503 5.30174C0.124861 5.19167 0.0483328 5.06619 0.0179177 4.9253C-0.0129879 4.7849 -0.00391252 4.64743 0.0451441 4.5129C0.0942007 4.37837 0.167786 4.2683 0.265899 4.18269C0.364012 4.09708 0.498918 4.04204 0.670616 4.01758L4.23948 3.70571L5.6192 0.440283C5.68052 0.293522 5.77569 0.183451 5.90471 0.110071C6.03324 0.0366903 6.16496 0 6.29986 0C6.43477 0 6.56673 0.0366903 6.69575 0.110071C6.82428 0.183451 6.9192 0.293522 6.98052 0.440283L8.36024 3.70571L11.9291 4.01758C12.1008 4.04204 12.2357 4.09708 12.3338 4.18269C12.4319 4.2683 12.5055 4.37837 12.5546 4.5129C12.6036 4.64743 12.613 4.7849 12.5825 4.9253C12.5516 5.06619 12.4749 5.19167 12.3522 5.30174L9.64797 7.63157L10.4574 11.0988C10.4942 11.2578 10.4819 11.4016 10.4206 11.5303C10.3593 11.6584 10.2734 11.7653 10.1631 11.8509C10.0527 11.9366 9.92392 11.9855 9.77675 11.9977C9.62958 12.0099 9.48854 11.9732 9.35363 11.8876L6.29986 10.0531Z" fill="#FFB930" />
                                        </svg>
                                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.29986 10.0531L3.24609 11.8876C3.11118 11.9732 2.97014 12.0099 2.82297 11.9977C2.6758 11.9855 2.54703 11.9366 2.43665 11.8509C2.32628 11.7653 2.24043 11.6584 2.17911 11.5303C2.11779 11.4016 2.10552 11.2578 2.14231 11.0988L2.95175 7.63157L0.247503 5.30174C0.124861 5.19167 0.0483328 5.06619 0.0179177 4.9253C-0.0129879 4.7849 -0.00391252 4.64743 0.0451441 4.5129C0.0942007 4.37837 0.167786 4.2683 0.265899 4.18269C0.364012 4.09708 0.498918 4.04204 0.670616 4.01758L4.23948 3.70571L5.6192 0.440283C5.68052 0.293522 5.77569 0.183451 5.90471 0.110071C6.03324 0.0366903 6.16496 0 6.29986 0C6.43477 0 6.56673 0.0366903 6.69575 0.110071C6.82428 0.183451 6.9192 0.293522 6.98052 0.440283L8.36024 3.70571L11.9291 4.01758C12.1008 4.04204 12.2357 4.09708 12.3338 4.18269C12.4319 4.2683 12.5055 4.37837 12.5546 4.5129C12.6036 4.64743 12.613 4.7849 12.5825 4.9253C12.5516 5.06619 12.4749 5.19167 12.3522 5.30174L9.64797 7.63157L10.4574 11.0988C10.4942 11.2578 10.4819 11.4016 10.4206 11.5303C10.3593 11.6584 10.2734 11.7653 10.1631 11.8509C10.0527 11.9366 9.92392 11.9855 9.77675 11.9977C9.62958 12.0099 9.48854 11.9732 9.35363 11.8876L6.29986 10.0531Z" fill="#FFB930" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="content">
                                    <h2 class="title">{{ __('Years Experience') }}</h2>
                                    <p>{!! BaseHelper::clean($dataCountDescription) !!}</p>
                                </div>
                            </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 mb-40">
                <div class="about__content-seven">
                    <div class="section-title mb-25">
                        @if($subtitle = $shortcode->subtitle)
                            <span class="sub-title">{!! BaseHelper::clean($subtitle) !!}</span>
                        @endif

                        @if($title = $shortcode->title)
                            <h2 class="title wow">{!! BaseHelper::clean($title) !!}</h2>
                        @endif
                    </div>

                    @if ($description = $shortcode->description)
                        <p>{!! BaseHelper::clean($description) !!}</p>
                    @endif
                    <div class="about__content-inner-five">
                        @if ($image1 = $shortcode->image_1)
                            <div class="about__list-img-four">
                                {{ RvMedia::image($image1, 'about-us-information') }}
                            </div>
                        @endif

                        @if(count($tabs))
                            <div class="about__list-box">
                                <ul class="list-wrap">
                                    @foreach($tabs as $tab)
                                        @continue(! $title = Arr::get($tab, 'title'))
                                        <li><i class="flaticon-arrow-button"></i>{!! BaseHelper::clean($title) !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>

                    @if (($buttonUrl = $shortcode->button_url) && ($buttonLabel = $shortcode->button_label))
                        <a href="{{ $buttonUrl }}" class="btn btn-two">{!! BaseHelper::clean($buttonLabel) !!}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>