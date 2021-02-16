@extends('frontEnd.layouts.page')

@push('styles')
    @endpush
@section('PageContent')

    <div class="container">
    <div class="row ">
        <div class="col-md-12 center">
            <h2 class="word-rotator-title mb-lg">{!! $page_data->excerpt !!}</h2>
            <h2 class="word-rotator-title mb-lg">
                <strong class="inverted inverted-primary">
									<span class="word-rotate" data-plugin-options="{'delay': 2000, 'animDelay': 300}">
										<span class="word-rotate-items">
                                            @foreach($langs as $lang)
											<span>{{$lang->name}}</span>
                                            @endforeach
											<span>and more...</span>
										</span>
									</span>
                </strong>
            </h2>

            <p class="lead">
                {!! $page_data->body !!}
            </p>

            <hr class="tall">
        </div>
    </div>

</div>
<div class="container mb-none">

    <div class="row">
        <div class="col-md-5">
            <div class="feature-box feature-box-style-6 reverse mb-md mt-xl appear-animation"
                 data-appear-animation="fadeInLeft" data-appear-animation-delay="300">
                {{--<div class="feature-box-icon">--}}
                    {{--<i class="fa fa-mobile text-color-primary"></i>--}}
                {{--</div>--}}
                <div class="feature-box-info">
                    <h4 class="mb-sm">{!! $UniversalTranslationHelper->translateText('about_block_1_title') !!}</h4>
                    {{--<p class="mb-lg">--}}
                    {{--</p>--}}
                </div>
            </div>
            <div class="feature-box feature-box-style-6 reverse mb-md mt-xl appear-animation"
                 data-appear-animation="fadeInLeft" data-appear-animation-delay="300">
                <div class="feature-box-icon">
                    <i class="fa fa-gears text-color-primary"></i>
                </div>
                <div class="feature-box-info">
                    <p class="mb-lg">
                        {!! $UniversalTranslationHelper->translateText('about_block_2_body') !!}
                    </p>
                </div>
            </div>
            <div class="feature-box feature-box-style-6 reverse mb-md mt-xl appear-animation"
                 data-appear-animation="fadeInLeft" data-appear-animation-delay="300">
                <div class="feature-box-icon">
                    <i class="fa  fa-check-square-o text-color-primary"></i>
                </div>
                <div class="feature-box-info">
                    {{--<h4 class="mb-sm">{!! $UniversalTranslationHelper->translateText('about_block_2_title') !!}</h4>--}}
                    <p class="mb-lg">
                        {!! $UniversalTranslationHelper->translateText('about_block_3_body') !!}
                    </p>
                </div>
            </div>
            <div class="feature-box feature-box-style-6 reverse mb-md mt-xl appear-animation"
                 data-appear-animation="fadeInLeft" data-appear-animation-delay="300">
                <div class="feature-box-icon">
                    <i class="fa fa-user-circle text-color-primary"></i>
                </div>
                <div class="feature-box-info">
                    {{--<h4 class="mb-sm">{!! $UniversalTranslationHelper->translateText('about_block_2_title') !!}</h4>--}}
                    <p class="mb-lg">
                        {!! $UniversalTranslationHelper->translateText('about_block_4_body') !!}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <img alt="Responsive" data-appear-animation="fadeIn"
                 class="img-responsive appear-animation fadeIn center-block"
                 src="{{asset('assets/frontEnd/img/globe-3.png')}}" style="margin-bottom: -1px;">
        </div>
        {{--<div class="col-md-4 mb-none">--}}
            {{--<div class="feature-box feature-box-style-6 mb-md mt-xl appear-animation"--}}
                 {{--data-appear-animation="fadeInRight" data-appear-animation-delay="300">--}}
                {{--<div class="feature-box-icon">--}}
                    {{--<i class="fa fa-eye text-color-primary"></i>--}}
                {{--</div>--}}
                {{--<div class="feature-box-info">--}}
                    {{--<h4 class="mb-sm">{!! $UniversalTranslationHelper->translateText('about_block_3_title') !!}</h4>--}}
                    {{--<p class="mb-lg">--}}
                        {{--{!! $UniversalTranslationHelper->translateText('about_block_3_body') !!}--}}
                    {{--</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="feature-box feature-box-style-6 mb-md mt-xl appear-animation"--}}
                 {{--data-appear-animation="fadeInRight" data-appear-animation-delay="300">--}}
                {{--<div class="feature-box-icon">--}}
                    {{--<i class="fa fa-eye text-color-primary"></i>--}}
                {{--</div>--}}
                {{--<div class="feature-box-info">--}}
                    {{--<h4 class="mb-sm">{!! $UniversalTranslationHelper->translateText('about_block_4_title') !!}</h4>--}}
                    {{--<p class="mb-lg">--}}
                        {{--{!! $UniversalTranslationHelper->translateText('about_block_4_body') !!}--}}
                    {{--</p>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    </div>
</div>

<section class="section section-primary m-none">
    <div class="container">
        <div class="row">
            {{--<div class="counters counters-text-light">--}}
                {{--<div class="col-md-3 col-sm-6">--}}
                    {{--<div class="counter">--}}
                        {{--<strong data-to="25000" data-append="+">0</strong>--}}
                        {{--<label>Marketing Stat</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-3 col-sm-6">--}}
                    {{--<div class="counter">--}}
                        {{--<strong data-to="15">0</strong>--}}
                        {{--<label>Marketing Stat</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-3 col-sm-6">--}}
                    {{--<div class="counter">--}}
                        {{--<strong data-to="352">0</strong>--}}
                        {{--<label>Marketing Stat</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-3 col-sm-6">--}}
                    {{--<div class="counter">--}}
                        {{--<strong data-to="178">0</strong>--}}
                        {{--<label>Marketing Stat</label>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
</section>

<section class="video section section-text-light section-video section-center mt-none"
         data-video-path="{{ asset('/assets/frontEnd/video/blue-globe-sun-1280x.mp4') }}" data-plugin-video-background
         data-plugin-options="{'posterType': 'jpg', 'position': '50% 50%', 'overlay': true}">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div>
                    <div class="col-md-12">
                        <div class="testimonial testimonial-style-6 testimonial-with-quotes mb-none">
                            <blockquote>
                                <p>{!! $UniversalTranslationHelper->translateText('about_blockquote') !!}</p>
                            </blockquote>
                            <div class="testimonial-author">
                                <p><strong>John Smith</strong><span>CEO & Founder | Parlez-Vous Translations</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('frontEnd.partials.global.call-to-action')
@endsection

@section('scripts')
    @endsection