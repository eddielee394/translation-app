@extends('frontEnd.layouts.page')
@section('PageContent')

    <!-- Test Variables -->

    <!-- End test variables -->

    <div class="container">

        <div class="row pt-sm mb-xl">
            <div class="col-md-3 hidden-sm hidden-xs  sticky-sidebar">
                <aside class="sidebar">

                    @include('frontEnd.partials.global.sidebar')

                </aside>

            </div>
            <div class="col-md-9">
                <div class="row">

                    <h1 class="mb-sm">{{$language}} @if(!empty($language2)) to {{$language2}} @endif  <strong>{{ $service_type->title }}</strong></h1>
                <p class="lead mb-xl mt-lg">{!!  $service_type->excerpt !!}</p>
                </div>
                    <div class="col-md-5 align-right">
                        <div class="img-thumbnail mb-xlg">
                            <div>
                                <img src="{{Voyager::image( $service_type->image) }}" class="img-responsive img-rounded" alt="" />
                            </div>
                        </div>
                    </div>

                <p>{!!  $service_type->body !!} </p>
          </div>
        </div>
        @if (empty($language2))

          @if (empty($language))
              <!-- Service Language Menu -->
              @include('frontEnd.partials.global.service-lang')
              <!-- End Service Language Menu -->
          @else
              @include('frontEnd.partials.global.service-lang-lang')

          @endif
        @endif



    </div>

    <hr class="tall">

    @endsection

         <!-- Call To Action !-->
            @include('frontEnd.partials.global.call-to-action')
                <!-- End Call To Action !-->
