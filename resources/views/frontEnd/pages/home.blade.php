@extends('frontEnd.layouts.master')


        @section('content')
            <div class="slider-with-overlay">
                <!-- Start Home Slider -->
            @include('frontEnd.partials.global.main-slider')
                <!-- End Home Slider -->

                <div class="home-intro" id="home-intro">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                {!! $UniversalTranslationHelper->translateText('home_intro') !!}

                                <!--
                                    Lorem ipsum dolor sit amet, consectetur adipiscing <em>Metus</em>
                                    <span>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</span>
                                    !-->
                                </p>
                            </div>
                            <div class="col-md-3">
                                <div class="get-started">
                                    <a href="{{route('service.category', 'corporate')}}" class="btn btn-lg btn-primary btn-block">{{ $UniversalTranslationHelper->translateText('home_intro_btn_1') }}</a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="get-started">
                                    <a href="{{route('service.category', 'personal')}}" class="btn btn-lg btn-primary btn-block">{{ $UniversalTranslationHelper->translateText('home_intro_btn_2') }}</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="slider-contact-form">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-5 col-md-offset-7">
                                <div id="home-form">

                                @include('frontEnd.partials.forms.quote-form')

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container">

                <div class="row center">
                    <div class="col-md-12">
                        <h2 class="mb-sm word-rotator-title">
                            {!! $page_data->excerpt !!}
                        </h2>
                        <p class="lead">
                            {!! $page_data->body  !!}
                        </p>
                    </div>
                </div>

            </div>

            <div class="container">
                <div class="row center">
                    <div class="col-md-12">
                        <div style="margin: 45px 0px -30px; overflow: hidden;">
                            <img src="{{asset('assets/frontEnd/img/globe.jpg')}}" class="img-responsive appear-animation center-block img-mobile-center" style="max-width: 450px;" data-appear-animation="fadeInUp" alt="dark and light">
                        </div>
                    </div>
                </div>
            </div>

            <section class="section">
                <div class="container">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="feature-box feature-box-style-2">
                                        <div class="feature-box-icon">
                                            <i class="fa fa-group"></i>
                                        </div>
                                        <div class="feature-box-info">
                                            <h4 class="mb-none">{!! $UniversalTranslationHelper->translateText('home_block_1_title') !!} </h4>
                                            <p class="tall">{!! $UniversalTranslationHelper->translateText('home_block_1_body') !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="feature-box feature-box-style-2">
                                        <div class="feature-box-icon">
                                            <i class="fa fa-film"></i>
                                        </div>
                                        <div class="feature-box-info">
                                            <h4 class="mb-none">{!! $UniversalTranslationHelper->translateText('home_block_2_title') !!} </h4>
                                            <p class="tall">{!! $UniversalTranslationHelper->translateText('home_block_2_body') !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="feature-box feature-box-style-2">
                                        <div class="feature-box-icon">
                                            <i class="fa fa-bars"></i>
                                        </div>
                                        <div class="feature-box-info">
                                            <h4 class="mb-none">{!! $UniversalTranslationHelper->translateText('home_block_3_title') !!} </h4>
                                            <p class="tall">{!! $UniversalTranslationHelper->translateText('home_block_3_body') !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <hr class="tall">
        <!-- Call to Action Section -->
        @include('frontEnd.partials.global.call-to-action')
        <!-- End Call to Action Section -->
        @endsection

        <!-- Page Specific Scripts -->
        @push('scripts')
            @endpush