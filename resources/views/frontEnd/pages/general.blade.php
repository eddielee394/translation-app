@extends('frontEnd.layouts.page')

@push('styles')
    @endpush
@section('PageContent')

    <div class="container">

        <h1><strong>{!! $page_data->title or '' !!}</strong></h1>
        <div class="row">
            <div class="col-md-12">
                <p class="lead">
                    {!! $page_data->excerpt or '' !!}
                </p>
            </div>
        </div>

        <hr>

        <div class="row ">
        <div class="col-md-12 center">
        {!!$page_data->body or ''!!}
        </div>
    </div>

</div>

@include('frontEnd.partials.global.call-to-action')
@endsection

@section('scripts')
    @endsection

