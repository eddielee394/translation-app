@extends('frontEnd.layouts.master')

@section('content')

    <!-- Renders Breadcrumbs !-->
        
{!! Breadcrumbs::renderIfExists() !!}

    @yield('PageContent')

@endsection