<?php
/**  */
?>
@if(isset($ads))
    @foreach($ads as $ad)
        @if($ad->place == 'headerBanner' && $ad->status == '1')
            <div class="header-body">
                <div class="header-container container">
                    <div class="header-row">
                        <div class="header-column">
                            <div class="headerbanner">
                                <div class="ad_top img img-response">
                                    {!! $ad->code !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endif
<div class="header-body" id="nav_fixed">
      <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-logo">
                        <a href="/{{$current_locale}}">
                            <img alt="UniversalTranslation" width="200" data-sticky-width="125" data-sticky-top="33" src="{{asset('/assets/frontEnd/img/logo.png')}}">
                        </a>
                    </div>
                </div>

                <div class="header-column">
                    <div class="header-row">

                        @include('frontEnd.partials.header._topbar') {{--Includes topbar partial--}}

                    </div>

                    <div class="header-row">

                        @include('frontEnd.partials.header._nav') {{-- Includes nav bar menu--}}

                    </div>
                </div>
            </div>
        </div>
    @if(isset($ads))
        @foreach($ads as $ad)
            @if($ad->place == 'topNav' && $ad->status == '1')
                <div class="navTop">
                      <div class="adNavTop">
                          {!! $ad->code !!}
                      </div>
                </div>
            @endif
        @endforeach
    @endif
  </div>