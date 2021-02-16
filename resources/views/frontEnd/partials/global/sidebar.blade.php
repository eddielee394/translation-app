<?php
/**
 */
?>

<div class="side_bar">
    <div class="col-md-3">
        <div class="container" style="max-width:250px">
            <div class="row">
                <ul class="nav nav-pills nav-stacked">            
                    @foreach($services as $service)
                        @if($service->category_id == $service_type->category_id)
                           <li class="nav_sidebar" role="presentation"><a href="{{route('service.type', [$service->c_slug, $service->s_slug ])}}"><i class="fa fa-chevron-circle-right"></i> {{$service->s_title}}</a> </li>
                        @endif                  
                    @endforeach
                </ul>
            </div>
        </div>
        <br>
        <div class="container" style="max-width:250px">
            <div class="row">
                <h4 class="heading-primary">{!! $UniversalTranslationHelper->translateText('sidebar_header_1') !!}</h4>
                <ul class="list list-icons list-dark mt-xlg">
                    <li><i class="fa fa-square"></i>{{$service_type->feature_1}}</li>
                    <li><i class="fa fa-square"></i>{{$service_type->feature_2}}</li>
                    <li><i class="fa fa-square"></i>{{$service_type->feature_3}}</li>
                </ul>
            </div>
            @if(isset($ads))
                @foreach($ads as $ad)
                    @if($ad->place == 'sidebar' && $ad->status == '1')
                        <div class="sideBar">
                            <div class="ad_sideBar">
                                {!! $ad->code !!}
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>