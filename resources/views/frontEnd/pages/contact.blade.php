@extends('frontEnd.layouts.page')
@section('content')

    <!-- Renders Breadcrumbs !-->

    <!-- Start Page Content -->
    <div id="googlemaps" class="google-map"></div>

    <div class="container">

        <div class="row">
            <div class="col-md-6">

                <div class="alert alert-success hidden mt-lg" id="contactSuccess">
                    <strong>Success!</strong> Your message has been sent to us.
                </div>

                <div class="alert alert-danger hidden mt-lg" id="contactError">
                    <strong>Error!</strong> There was an error sending your message.
                    <span class="font-size-xs mt-sm display-block" id="mailErrorMessage"></span>
                </div>

                <h1 class="mb-sm mt-sm"><strong>Contact</strong> Us</h1>
            {!! $page_data->excerpt !!}
            <!-- Contact Form Partial !-->
            @include ('frontEnd.partials.forms.contact-form')
            <!-- End Contact Form !-->
            </div>
            <div class="col-md-6">

                {!! $page_data->body !!}

            </div>

        </div>

    </div>


    @yield('call_to_action')
    <!-- End page content !-->

@endsection

<!-- Start Page specific scripts !-->
@push('scripts')
<!--
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
    function onSubmit(token) {
        document.getElementById("contactForm").submit();
    }
</script>
 !-->
<script src="{{URL::to('assets/frontEnd/js/views/view.form.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmcSsRTgWuO1QPfmjEU4hSubLWa6zUZR4"></script>
<script>

    /*
     Map Settings

     Find the Latitude and Longitude of your address:
     - http://universimmedia.pagesperso-orange.fr/geo/loc.htm
     - http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

     */

    // Map Markers
    var mapMarkers = [{
        address: "91 Rue du Faubourg Saint-Honoré",
        html: "<strong>91 Rue du Faubourg Saint-Honoré</strong><br>Paris, France 75008",
        icon: {
            image: "{{URL::to('assets/frontEnd/img/pin.png')}}",
            iconsize: [26, 46],
            iconanchor: [12, 46]
        },
        popup: true
    }];

    // Map Initial Location
    var initLatitude = 48.8719839;
    var initLongitude = 2.3108694;

    // Map Extended Settings
    var mapSettings = {
        controls: {
            panControl: true,
            zoomControl: true,
            mapTypeControl: true,
            scaleControl: true,
            streetViewControl: true,
            overviewMapControl: true
        },
        scrollwheel: false,
        markers: mapMarkers,
        latitude: initLatitude,
        longitude: initLongitude,
        zoom: 16
    };

    var map = $('#googlemaps').gMap(mapSettings);

    // Map Center At
    var mapCenterAt = function(options, e) {
        e.preventDefault();
        $('#googlemaps').gMap("centerAt", options);
    }

</script>


@endpush
<!-- End Scripts -->
