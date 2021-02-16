@if ($breadcrumbs)
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    @foreach ($breadcrumbs as $breadcrumb)
                        @if (!$breadcrumb->last)
                            <li><a href="{{ $breadcrumb->url or '' }}">{{ $breadcrumb->title or '' }}</a></li>
                        @else
                            <li class="active">{{ $breadcrumb->title or '' }}</li>
                        @endif
                    @endforeach                </ul>
            </div>
        </div>
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<h1>{{ $breadcrumb->title }}</h1>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
</section>
@endif