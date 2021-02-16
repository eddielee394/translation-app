@extends('frontEnd.layouts.page')


@section('PageContent')

 @php


 @endphp

    <div class="container">

        <h1><strong>{{ $service_category->title }}</strong> </h1>

        <div class="row">
            <div class="col-md-12">
                <p class="lead">
                    {!!  $service_category->excerpt !!}.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div>
                    <div class="img-thumbnail">
                        <img class="img-responsive" src="{{Voyager::image($service_category->image) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-md">
                <p>
                    {!! $service_category ->body !!}.
                </p>
            </div>
        </div>

        <hr class="tall">

        <div class="row">
            <div class="col-md-12">
                <ul class="portfolio-list">
                    @foreach($service_category->serviceTypes as $service_type)
                    <li class="col-md-3 col-sm-6 col-xs-12 isotope-item {{ $service_type->title }}">
                        <div class="portfolio-item">
                            <a href="{{route('service.category', $service_category->slug .'/'. $service_type->slug)}}">
								<span class="thumb-info thumb-info-lighten">
									<span class="thumb-info-wrapper">
										<img src="{{Voyager::image( $service_type->image )}}" class="img-responsive" alt="">
										<span class="thumb-info-title">
											<span class="thumb-info-inner">{{ $service_type->title }}</span>
											<span class="thumb-info-type">{{ $service_category->title }}</span>
										</span>
										<span class="thumb-info-action">
											<span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
										</span>
									</span>
								</span>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>

    @include('frontEnd.partials.global.call-to-action')

@endsection
