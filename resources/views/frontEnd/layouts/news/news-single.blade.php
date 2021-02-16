@extends('frontEnd.layouts.page')
@section('PageContent')
    <div class="container">

        <div class="row">
            <div class="col-md-9">
                <div class="blog-posts single-post">

                    <article class="post post-large blog-single-post">
                        <div class="post-image">
                            <div>
                                <div class="img-thumbnail">
                                    <img class="img-responsive" src="{{ Voyager::image( $post->image ) }}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="post-date">
                            <span class="day">{{ date('d', strtotime($post->created_at)) }}</span>
                            <span class="month">{{ date('M', strtotime($post->created_at)) }}</span>
                        </div>

                        <div class="post-content">

                            <h1>{{$post->title}}</h1>

                            <div class="post-meta">
                                <span><i class="fa fa-user"></i> By {{$user->name}}</span>
                            </div>

                            {!! $post->body !!}

                            <div class="row">
                                <div class="post-block post-share">
                                    <div class="col-md-4">
                                        <h3 class="heading-primary"><i class="fa fa-share"></i>Share this post</h3>
                                    </div>

                                    <!-- AddThis Button BEGIN -->
                                    <div class="col-md-8">
                                        <div class="addthis_inline_share_toolbox"></div>
                                    </div>
                                    <script type="text/javascript"
                                            src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58c58d2757cf5157"></script>
                                    <!-- AddThis Button END -->

                                </div>
                            </div>
                        </div>
                    </article>

                </div>
            </div>

            <div class="col-md-3 sticky-sidebar">
                <aside id="news-sidebar" class="sidebar">

                    <form>
                        <div class="input-group input-group-lg">
                            <input class="form-control" placeholder="Search..." name="s" id="s" type="text">
                            <span class="input-group-btn">
							<button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"></i></button>
						</span>
                        </div>
                    </form>

                    @if(isset($ads))
                        @foreach($ads as $ad)
                            @if($ad->place == 'asideNews' && $ad->status == '1')
                                <hr>
                                <div class="asideNews">
                                    <div class="ad_asideNews">
                                        {!! $ad->code !!}
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                    <hr>

                    <h4 class="heading-primary">{!! $UniversalTranslationHelper->translateText('sidebar_header_2') !!}</h4>
                    <div class="list-group">
                        <!--currentLocale/services/page -->
                        @foreach($services as $service)
                            <a href="{{route('service.type', [$service->c_slug, $service->s_slug ])}}"
                               class="list-group-item">{{$service->s_title}}</a>
                        @endforeach
                    </div>

                    <div class="tabs mb-xlg">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#recentPosts" data-toggle="tab">Recent</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="recentPosts">
                                <ul class="simple-post-list">
                                    @foreach($recentPosts as $recentPost)
                                        <li>
                                            <div class="post-image recent-posts">
                                                <div class="img-thumbnail">
                                                    <a href="blog-single.html">
                                                        <img src="{{ Voyager::image($recentPost->image)}}" alt="">

                                                    </a>
                                                </div>
                                            </div>
                                            <div class="post-info">
                                                <a href="{{route('blog.single',[$recentPost->slug]) }}">{{$recentPost->title}}</a>
                                                <div class="post-meta">
                                                    {{ date('d', strtotime($recentPost->created_at)) }}
                                                    {{ date('M', strtotime($recentPost->created_at)) }}
                                                    {{ date('Y', strtotime($recentPost->created_at)) }}

                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>

                    <hr>

                    <div class="featured-box-left featured-box-primary-left featured-box-text-left">
                        <div class="box-content">
                            <div class="row">
                                <h4>
                                    <strong>{!! $UniversalTranslationHelper->translateText('sidebar_header_3') !!}</strong>
                                </h4>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="/{{$current_locale}}/quote">
                                        <button class="btn btn-lg btn-primary mr-xs mb-lg" type="button">Learn More
                                        </button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection