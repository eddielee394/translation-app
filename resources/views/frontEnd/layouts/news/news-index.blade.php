@extends('frontEnd.layouts.page')

@section('PageContent')
    @php
    @endphp
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="blog-posts">

                @foreach($posts as $post)
                <article class="post post-large">
                    <div class="post-image">
                        <div>
                            <div class="img-thumbnail">
                                <img class="img-responsive" src="{{ Voyager::image($post->image)}}" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="post-date">
                        <span class="day">{{ $post->created_at->format('d') }}</span>
                        <span class="month">{{ $post->created_at->format('M') }}</span>
                    </div>

                    <div class="post-content">

                        <a href="{{route('blog.single',[$post->slug]) }}"><h2>{{ $post->title }}</h2></a>
                        <p>{{$post->excerpt}} [...]</p>

                        <div class="post-meta">
                            <span><i class="fa fa-user"></i> By {{ $post->authorid->name }}</span>
                            <!--<span><i class="fa fa-tag"></i> <a href="#">{{ $post->title}}</a>, <a href="#">News</a> </span> !-->
                            <!--<span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span> !-->
                            <a href="{{route('blog.single',[$post->slug]) }}" class="btn btn-xs btn-primary pull-right">Read more...</a>
                        </div>

                    </div>
                </article>
                @endforeach

                <ul class="pagination pagination-lg pull-right">
                    
                    <li>{!! $posts->links() !!}</li>
                    
                </ul>

            </div>
        </div>

    </div>

</div>
    @endsection
@push('scripts')
 @endpush