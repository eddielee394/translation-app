<!DOCTYPE html>
<html lang="{{ config('app.locale') }}"> <!--- Lang -->
<head>
    @include('frontEnd.partials.header._head')
</head>
<body>
<div class="body">
    <!-- Google Tag Manager (noscript) -->
@if(config('app.env') == 'production')

        <!-- Production -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KG8N859"
                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Production -->

@elseif(config('app.env') == 'staging')

        <!-- Staging -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KG8N859&gtm_auth=JOOB4p1fLmjnIrSm5Sv5NQ&gtm_preview=env-13&gtm_cookies_win=x"
                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!--  End Staging -->

@else

        <!-- Dev Environment, do not run tracking scripts -->

@endif
<!-- End Google Tag Manager (noscript) -->

    <header id="header">
    <!-- start header --!>
                @include('frontEnd.partials.header._header')
            <!-- end header !-->
    </header>

    <div role="main" class="main-{{$page_data->slug or ''}}-wrapper">
        <!-- Render breadcrumbs if not home page -->
    {{-- }}@if ($IsHome)
        {!! Breadcrumbs::render() !!}
        @endif --}}
    <!-- Content Section !-->
    @yield('content')
    <!-- end of content section !-->

        @yield('call_to_action')

    </div>

    <!-- Start Footer !-->
@include('frontEnd.partials.footer._footer')
<!-- End footer -->

</div>

@include('frontEnd.partials.footer._foot')


</body>
</html>