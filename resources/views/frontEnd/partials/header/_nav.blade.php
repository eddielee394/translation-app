<div class="header-nav" xmlns="http://www.w3.org/1999/html">
    <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
        <i class="fa fa-bars"></i>
    </button>
    <ul class="header-social-icons social-icons hidden-xs">
        <li class="social-icons-facebook"><a href="{{ Voyager::setting('fb_url', 'Facebook') }}" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
        <li class="social-icons-twitter"><a href="{{ Voyager::setting('twtr_url', 'Twitter') }}" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
        <li class="social-icons-linkedin"><a href="{{ Voyager::setting('lnkd_url', 'LinkdIn') }}" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
    </ul>
    <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
        <nav>
            <ul class="nav nav-pills" id="mainNav">
               @foreach($nav as $ind => $nav_item)
                    @if($nav_item->url == 'services')
                        <li class="dropdown dropdown-mega hidden-md hidden-sm hidden-xs">
                            <a class="dropdown-toggle" href="{{url::to($current_locale, 'services')}}">
                            {{$nav_item->title}}                            
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="dropdown-mega-content">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <a href="/{{$current_locale . '/' . $nav_item->childs[0]->url}}"><span class="dropdown-mega-sub-title">{{$nav_item->childs[0]->title}}</span></a> <!--Service category link -->
                                            </div>
                                            <div class="col-md-4">
                                                <a href="/{{$current_locale . '/' . $nav_item->childs[1]->url}}"><span class="dropdown-mega-sub-title">{{$nav_item->childs[1]->title}}</span></a>  <!--Service category link -->
                                            </div>
                                        </div>
                                        <div class="row"> 
                                            @php $cont=0; @endphp                                           
                                            @foreach($nav_item->childs[0]->child_childs as $child)
                                                @if($cont==0)  
                                                    <div class="col-md-4">
                                                    <ul class="dropdown-mega-sub-nav">
                                                @endif
                                                @php $cont++; @endphp

                                                    <li><a href="/{{$current_locale .'/'. $nav_item->childs[0]->url .'/'. $child->url}}">{{$child->title}}</a></li> <!--Service type link -->
                                                @if($cont==5)
                                                    </ul>
                                                    </div>                                               
                                                @php $cont=0;  @endphp
                                                @endif 
                                            @endforeach                                                   
                                            @php $cont=0; @endphp                                           
                                            @foreach($nav_item->childs[1]->child_childs as $child )
                                                @if($cont==0)  
                                                    <div class="col-md-4">
                                                    <ul class="dropdown-mega-sub-nav">
                                                @endif
                                                @php $cont++;  @endphp
                                                    <li><a href="/{{$current_locale .'/'. $nav_item->childs[1]->url .'/'. $child->url}}">{{$child->title}}</a></li> <!--Service type link -->
                                                @if($cont==5)
                                                    </ul>
                                                    </div>                                               
                                                @php $cont=0;  @endphp
                                                @endif 
                                            @endforeach                                                 
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <!-- Start Mobile !-->

                        <li class="dropdown dropdown-mega hidden-lg">
                            <a class="dropdown-toggle" href="{{url::to($current_locale, 'services')}}">
                                {{$nav_item->title}}
                            </a>
                            <ul class="dropdown-menu">
                                <div class="dropdown-mega-content">
                                    <div>
                                        <a href="/{{$current_locale . '/' . $nav_item->childs[0]->url}}"><span class="dropdown-mega-sub-title">{{$nav_item->childs[0]->title}}</span></a>
                                    </div>
                                    <ul class="dropdown-mega-sub-nav">
                                    @foreach($nav_item->childs[0]->child_childs as $child)
                                            <li><a href="/{{$current_locale .'/'. $nav_item->childs[0]->url .'/'. $child->url}}">{{$child->title}}</a></li>
                                    @endforeach
                                    </ul>
                                    <li>
                                        <a href="/{{$current_locale . '/' . $nav_item->childs[1]->url}}"><span class="dropdown-mega-sub-title">{{$nav_item->childs[1]->title}}</span></a>
                                    </li>
                                    <ul class="dropdown-mega-sub-nav">
                                    @foreach($nav_item->childs[1]->child_childs as $child)
                                            <li><a href="/{{$current_locale .'/'. $nav_item->childs[1]->url .'/'. $child->url}}">{{$child->title}}</a></li>
                                    @endforeach
                                    </ul>
                                </div>
                            </ul>
                        </li>
                    @else
                    <li class="{{$nav_item->li_class}}">                
                        <a class="{{$nav_item->a_class}}" href="/{{$current_locale . '/' . $nav_item->url}}"> <!--Page link -->
                           {{$nav_item->title}}
                        </a>
                        @if($nav_item->has_childs == 1)   
                       
                            <ul class="dropdown-menu">
                                @foreach($nav_item->childs as $ind_child => $child_item) 
                                    <li>
                                        <a  href="/{{$current_locale . '/' . $child_item->url}}">{{$child_item->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @endif                       
                </li>
                @endforeach
            </ul>
        </nav>
    </div>
</div>