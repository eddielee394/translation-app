<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Expires" content="30" />
<!-- Google Tag Manager -->

@if(config('app.env') == 'production')

    <!-- Production -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KG8N859');</script>
    <!-- End Production -->

@elseif(config('app.env') == 'staging')

    <!-- Staging -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl+ '&gtm_auth=JOOB4p1fLmjnIrSm5Sv5NQ&gtm_preview=env-13&gtm_cookies_win=x';f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KG8N859');</script>
    <!-- End Staging -->

@else

    <!-- Dev Environment, do not run tracking scripts -->

@endif


<!-- End Google Tag Manager -->


<!--SEO Meta Title -->
<title>@if(isset($seo_title)){{ $seo_title . ' - ' . setting('title') }}@else{{ setting('title') . ' - ' . setting('description') }}@endif</title>

<!-- only set meta description and keywords if exists -->
@if(isset($meta_description))
    <meta name="description" content="{{ $meta_description }}">
@endif

@if(isset($meta_keywords))
    <meta name="keywords" content="{{ $meta_keywords }}">
@endif

@if(isset($noindex))
    <!-- Meta noindex follow -->
    <META NAME="robots" CONTENT="noindex, follow">
@else
    <meta name="robots" content="index, follow">
@endif

<!-- Twitter Meta -->
@if(isset($twitter_description))
    <meta name="twitter:description" content="{{ $twitter_description }}">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="{{ '@' . setting('twitter_username', 'parlezvous') }}" />
@endif


<!-- Opengraph Meta -->
@if(isset($og_title) && isset($og_image))

    <meta property="og:title" content="{{ $og_title }}"/>
    <meta property="og:url" content="{{ str_replace('http://', 'https://', rtrim(Request::url(), '/')) }}"/>
    <meta property="og:image" content="{{ $og_image }}"/>
    <meta property="og:type" content="article" />

    @if(isset($og_image_width))
        <meta property="og:image:width" content="{{ $og_image_width }}" />
    @endif

    @if(isset($og_image_height))
        <meta property="og:image:height" content="{{ $og_image_height }}" />
    @endif

@endif

<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="shortcut icon" href="{{ asset('assets/frontEnd/img/unitrans.ico')}}" type="image/x-icon">

<!-- Alternate tags -->
<link rel="alternate" href="{{URL::current()}}" hreflang="{{$current_locale}}" />


<?php foreach($langs as $lang):
if($lang->id != $lang_id): ?>
<link rel="alternate" href="{{LaravelLocalization::getLocalizedURL($lang->slug)}}" hreflang="{{$lang->slug}}" />
<?php endif;
endforeach; ?>

<!-- Self reference Links -->

<!-- Canonical Link -->


<!-- Favicon -->
<link rel="shortcut icon" href="{{asset('assets/frontEnd/img/unitrans.ico')}}" type="image/x-icon" />
<link rel="apple-touch-icon" href="{{asset('assets/frontEnd/img/globe-4-sm.png')}}">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Web Fonts  -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

<!-- Vendor CSS -->
<link rel="stylesheet" href="{{ URL::to('assets/frontEnd/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::to('assets/frontEnd/vendor/font-awesome/css/font-awesome.min.css') }} ">
<link rel="stylesheet" href="{{ URL::to('assets/frontEnd/vendor/animate/animate.min.css') }} ">
<link rel="stylesheet" href="{{ URL::to('assets/frontEnd/vendor/simple-line-icons/css/simple-line-icons.min.css') }} ">
<link rel="stylesheet" href="{{ URL::to('assets/frontEnd/vendor/jquery.cookiebar/jquery.cookiebar.css') }}" media="screen">

<!-- Theme CSS -->
<link rel="stylesheet" href="{{ URL::to('assets/frontEnd/css/theme.css') }} ">

<!-- Current Page CSS -->
@stack('styles')

<!-- Skin CSS -->
<link rel="stylesheet" href="{{ URL::to('assets/frontEnd/css/skins/default.css') }} ">

<!-- Theme Custom CSS -->
<link rel="stylesheet" href="{{ URL::to('assets/frontEnd/css/custom.css') }} ">

<!-- Head Libs -->
<script src="{{ URL::to('assets/frontEnd/vendor/modernizr/modernizr.min.js') }} "></script>

<!-- Additional scripts -->
{!! Voyager::setting('header_script') !!}