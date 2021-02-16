@extends('frontEnd.layouts.page')
@section('PageContent')

<div class="container">

    <section class="page-not-found">
        <div class="row">
            <div class="col-md-6 col-md-offset-1">
                <div class="page-not-found-main">
                    <h2>403 <i class="fa fa-file"></i></h2>
                    <p>We're sorry, but the page you were looking for doesn't exist.</p>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="heading-primary">Here are some useful links</h4>
                <ul class="nav nav-list">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">FAQ's</a></li>
                    <li><a href="#">Sitemap</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </section>

</div>
    @endsection