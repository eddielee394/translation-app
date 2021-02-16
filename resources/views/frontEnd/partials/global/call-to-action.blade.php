@section('call_to_action')

    <section class="call-to-action call-to-action-default with-button-arrow call-to-action-in-footer">

        <div class="row">
            <div class="col-md-12">
                <div class="call-to-action-content col-md-7">
                    <h2>{!! $UniversalTranslationHelper->translateText('call_to_action')!!}</h2>
                </div>
                <div class="call-to-action-btn col-md-5">
                    <a href="{{route('quote')}}" class="btn btn-3d btn-lg btn-primary">{{$UniversalTranslationHelper->translateText('call_to_action_btn')}}</a><span class="arrow hlb hidden-xs hidden-sm hidden-md" data-appear-animation="rotateInUpLeft" style="top: -12px;"></span>
                </div>
            </div>
        </div>
    </section>

@endsection