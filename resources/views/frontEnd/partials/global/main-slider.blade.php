@push('styles')
<link rel="stylesheet" href="{{ URL::to('assets/frontEnd/vendor/rs-plugin/css/settings.css') }} ">
<link rel="stylesheet" href="{{ URL::to('assets/frontEnd/vendor/rs-plugin/css/layers.min.css') }} ">
<link rel="stylesheet" href="{{ URL::to('assets/frontEnd/vendor/rs-plugin/css/navigation.min.css') }} ">
@endpush
<!-- Desktop Revolution Slider Start !-->
<div class=" hidden-sm hidden-xs">

<div class="slider-container rev_slider_wrapper" style="height: 560px;">
        <div id="revolutionSliderDesktop" style="text-align:center;" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 560}">
            <ul>
                <li data-transition="fade">
                    <img src="{{asset('/assets/frontEnd/img/slides/slide-bg-5.jpg')}}"
                         alt=""
                         data-bgposition="center center"
                         data-bgfit="cover"
                         data-bgrepeat="no-repeat"
                         class="rev-slidebg">

                    <div class="tp-caption"
                         data-x="203"
                         data-y="140"
                         data-start="1000"
                         data-transform_in="x:[-300%];opacity:0;s:500;"><img src="{{asset('/assets/frontEnd/img/slides/slide-title-border.png')}}" alt=""></div>

                    <div class="tp-caption top-label"
                         style="align-content: center"
                         data-x="165"
                         data-y="140"
                         data-width="400"
                         data-start="500"
                         data-transform_in="y:[-300%];opacity:0;s:500;">{!! $UniversalTranslationHelper->translateText('home_slider_subheading') !!}</div>

                    <div class="tp-caption"
                         data-x="490"
                         data-y="140"
                         data-start="1000"
                         data-transform_in="x:[300%];opacity:0;s:500;"><img src="{{asset('/assets/frontEnd/img/slides/slide-title-border.png')}}" alt=""></div>

                    <div class="tp-caption main-label"
                         style="line-height: 70px"
                         data-x="165"
                         data-y="170"
                         data-width="400"
                         data-start="1500"
                         data-whitespace="pre-wrap"
                         data-transform_in="y:[100%];s:500;"
                         data-transform_out="opacity:0;s:500;"
                         data-mask_in="x:0px;y:0px;">{{ strip_tags($UniversalTranslationHelper->translateText('home_slider_heading')) }}</div>

                    <div class="tp-caption bottom-label"
                         style="line-height: 30px"
                         data-x="165"
                         data-y="320"
                         data-width="400"
                         data-whitespace="pre-wrap"
                         data-start="2000"
                         data-transform_in="y:[100%];opacity:0;s:500;">{!! $UniversalTranslationHelper->translateText('home_slider_body') !!}</div>

                </li>
            </ul>
        </div>
</div>
</div>
<!--Desktop Revolution Slider End !-->

<!-- Mobile Revolution Slider Start !-->

<div class=" hidden-xlg hidden-lg hidden-md">
    <div class="slider-container rev_slider_wrapper" style="height: 400px;">
        <div id="revolutionSliderDesktop" style="text-align:center;" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': auto, 'gridheight': 400}">
            <ul>
                <li data-transition="fade">
                    <img src="{{asset('/assets/frontEnd/img/slides/slide-bg-5.jpg')}}"
                         alt=""
                         data-bgposition="center center"
                         data-bgfit="cover"
                         data-bgrepeat="no-repeat"
                         class="rev-slidebg">

                    <div class="tp-caption"
                         data-x="250"
                         data-y="180"
                         data-start="1000"
                         data-transform_in="x:[-300%];opacity:0;s:500;"><img src="{{asset('/assets/frontEnd/img/slides/slide-title-border.png')}}" alt=""></div>

                    <div class="tp-caption top-label"
                         data-x="center"
                         data-y="180"
                         data-start="500"
                         data-transform_in="y:[-300%];opacity:0;s:500;">{!! $UniversalTranslationHelper->translateText('home_slider_subheading') !!}</div>

                    <div class="tp-caption"
                         data-x="875"
                         data-y="180"
                         data-start="1000"
                         data-transform_in="x:[300%];opacity:0;s:500;"><img src="{{asset('/assets/frontEnd/img/slides/slide-title-border.png')}}" alt=""></div>

                    <div class="tp-caption main-label"
                         style="line-height: 70px"
                         data-x="center"
                         data-y="210"
                         data-start="1500"
                         data-whitespace="nowrap"
                         data-transform_in="y:[100%];s:500;"
                         data-transform_out="opacity:0;s:500;"
                         data-mask_in="x:0px;y:0px;">{{ strip_tags($UniversalTranslationHelper->translateText('home_slider_heading')) }}</div>

                    <div class="tp-caption bottom-label"
                         style="line-height:40px"
                         data-x="center"
                         data-y="280"
                         data-width="500"
                         data-whitespace="pre-wrap"
                         data-start="2000"
                         data-transform_in="y:[100%];opacity:0;s:500;">{!! $UniversalTranslationHelper->translateText('home_slider_body') !!}</div>

                </li>
            </ul>
        </div>
    </div>
</div>

<!-- Mobile Rev Slider end !-->
@push('scripts')
<script src="{{ URL::to('assets/frontEnd/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ URL::to('assets/frontEnd/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
@endpush