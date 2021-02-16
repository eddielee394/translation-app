
<nav class="header-nav-top">
    <ul class="nav nav-pills">
        <li class="hidden-xs">
            <span class="ws-nowrap"><i class="fa fa-phone"></i> +33 1 45 74 99 26</span>
        </li>
        <li class="hidden-xs">
            <a class="" href="/admin" ><i class="fa fa-user-circle"></i> {{$UniversalTranslationHelper->translateText('login')}}</a>
        </li>

        <li>
            <div class="locale-container">
                <ul class="locale-select">

                    {{--@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)--}}

                    {{--@if($localeCode == LaravelLocalization::getCurrentLocale())--}}
                    {{--<li class="active" data-lang="{{$localeCode}}"><a href="{{LaravelLocalization::getLocalizedURL($localeCode) }}"><img src="/assets/frontEnd/img/icons/flags/{{$localeCode}}_rnd.png"><span>{{ $properties['native'] }}</span></a></li>--}}
                    {{--@elseif ($url = LaravelLocalization::getLocalizedURL($localeCode))--}}
                    {{--<li data-lang="{{$localeCode}}"><a href="{{LaravelLocalization::getLocalizedURL($localeCode) }}"><img src="/assets/frontEnd/img/icons/flags/{{$localeCode}}_rnd.png"><span>{{ $properties['native'] }}</span></a></li>--}}
                    {{--@endif--}}

                    {{--@endforeach--}}

                    @foreach($langs as $lang)

                        @if ($lang->slug == LaravelLocalization::getCurrentLocale())
                            <li class="active" data-lang="{{ $lang->slug }}"><a href="{{LaravelLocalization::getLocalizedURL($lang->slug) }}"><img src="/assets/frontEnd/img/icons/flags/{{ $lang->slug }}_rnd.png"><span>{{ $lang->name }}</span></a></li>
                        @else
                            <li data-lang="{{ $lang->slug }}"><a href="{{LaravelLocalization::getLocalizedURL($lang->slug) }}"><img src="/assets/frontEnd/img/icons/flags/{{ $lang->slug }}_rnd.png"><span>{{ $lang->name }}</span></a></li>
                        @endif

                    @endforeach

                </ul>
            </div>
        </li>

    </ul>

</nav>
@push('scripts')
<script>
    $('.locale-select').click(function(){
        $(this).toggleClass('open');

    })

    $('.locale-select li').click(function(){
        $('ul li').removeClass('active');
        $(this).toggleClass('active');
    });

    var item = window.localStorage.getItem('active');
    $('.locale-select li').val(item);

    $('.locale-select li').change(function() {
        window.localStorage.setItem('active', $(this).val());
    });

</script>
@endpush