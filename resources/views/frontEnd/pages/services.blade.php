@extends('frontEnd.layouts.page')
@section('PageContent')

    <div class="container">

        <div class="row mb-xlg">
            <div class="col-sm-7">
                <h1><strong>{{$page_data->title }}</strong></h1>
                <div class="lead">
                    {!!  $page_data->excerpt !!}
                </div>
                <div class="mt-xlg">
                    {!!   $page_data->body !!}
                </div>
            </div>
            <div class="col-sm-4 col-sm-offset-1 mt-xlg">
                <img class="img-responsive mt-xlg" src=" {{asset('/assets/frontEnd/img/services.jpg')}}" alt="">
            </div>
        </div>
        <hr class="taller">

        <div class="featured-boxes">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-sm-6">
                    <div class="featured-box featured-box-primary featured-box-effect-1 mt-xlg">
                        <div class="box-content">
                            <i class="icon-featured fa fa-users"></i>
                            {!! $UniversalTranslationHelper->translateText('services_block_1') !!}
                            <p><a href="/{{$current_locale}}/quote" class="lnk-primary learn-more">Learn More <i class="fa fa-angle-right"></i></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="featured-box featured-box-primary featured-box-effect-1 mt-xlg">
                        <div class="box-content">
                            <i class="icon-featured fa fa-clock-o"></i>
                            {!! $UniversalTranslationHelper->translateText('services_block_2') !!}
                            <p><a href="/{{$current_locale}}/quote" class="lnk-primary learn-more">Learn more <i class="fa fa-angle-right"></i></a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="featured-box featured-box-primary featured-box-effect-1 mt-xlg">
                        <div class="box-content">
                            <i class="icon-featured fa fa-shirtsinbulk"></i>
                            {!! $UniversalTranslationHelper->translateText('services_block_3') !!}
                            <p><a href="/{{$current_locale}}/quote" class="lnk-primary learn-more" >Learn more <i class="fa fa-angle-right"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="taller">

        <div class="row pt-lg">
            <div class="col-md-6">
                <h4><strong>{{$corporate_services_category->title }}</strong> Translation Services</h4>
                <p class="mb-xlg mt-lg">
                    {{$corporate_services_category->excerpt}}
                </p>
                <div class="row">
                    @php $cont=0;  @endphp
                    @foreach($corporate_services as $corporate_service_type)
                        @if($cont==0)
                            <div class="col-sm-6">
                                @endif
                                @php $cont++;  @endphp
                                <div class="feature-box">
                                    <div class="feature-box-icon">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="feature-box-info">
                                        <h5 class="heading-primary mb-none"><a href="{{ 'services' .'/'. 'corporate' .'/'.$corporate_service_type->slug}}">{{ $corporate_service_type->title}}</a></h5>
                                        <p class="tall">{{ substr($corporate_service_type->excerpt,0, 50)}}...</p>
                                    </div>
                                </div>
                                @if($cont==5)
                            </div>
                            @php $cont=0;  @endphp
                        @endif
                    @endforeach 
                </div>
            </div>
            <div class="col-md-6">
                <h4><strong>{{$personal_services_category->title}}</strong> Translation Services</h4>
                <p class="mb-xlg mt-lg">
                {{$personal_services_category->excerpt}}
                </p>
                <div class="row">
                    @php $cont=0;  @endphp
                    @foreach($personal_services as $personal_service_type)
                        @if($cont==0)
                            <div class="col-sm-6">
                                @endif
                                @php $cont++;  @endphp
                                <div class="feature-box">
                                    <div class="feature-box-icon">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="feature-box-info">
                                        <h5 class="heading-primary mb-none"><a href="{{'services'.'/'.'personal'.'/'.$personal_service_type->slug}}">{{$personal_service_type->title}}</a></h5>
                                        <p class="tall">{{substr($personal_service_type->excerpt, 0,50)}}</p>
                                    </div>
                                </div>
                                @if($cont==5)
                            </div>
                            @php $cont=0;  @endphp
                        @endif
                    @endforeach                    
                </div>
            </div>
        </div>
    </div>
    @include('frontEnd.partials.global.call-to-action')
@endsection