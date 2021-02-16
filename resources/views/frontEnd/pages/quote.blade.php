@extends('frontEnd.layouts.page')
@section('PageContent')


    <div class="container">

        <h1 class="align-center"><strong>{!! $page_data->title !!}</strong></h1>

        <div class="row">
            <div class="col-md-12">
                <p class="lead align-center">
                    {!! $page_data->excerpt !!}
                </p>
            </div>
        </div>

        <hr class="tall">

        <div class="row">
            <div class="col-md-12">

                <div class="col-md-6">
                    <div>
                        @include('frontEnd.partials.forms.quote-form')
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        {!! $page_data->body !!}
                    </div>
                </div>

            </div>

        </div>

    </div>
    <section class="section section-default section-default-scale-9 mt-xlg mb-xlg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-none text-light align-center">Still have <strong>questions?</strong></h2>
                </div>
            </div>
        </div>
    </section>
    <div class="container mt-xlg">
        <div class="col-md-6">
            <h4 class="heading-primary align-center"><strong>{!! $UniversalTranslationHelper->translateText('quote_footer_title') !!}</strong></h4>
            <p class="lead align-center">{!! $UniversalTranslationHelper->translateText('quote_footer_body') !!}<a href="{{route('contact')}}"><strong>contact page</strong></a>. </p>
        </div>
        <div class="col-md-6">
            <div>
                <img class="img-thumbnail" src="{{asset('assets/frontEnd/img/cust_support_2.jpg')}}">
            </div>
        </div>
    </div>

@endsection