<div class="container">
    <div class="row mt-lg">
        <h2 class="align-center mb-none">{!! $UniversalTranslationHelper->translateText('service_lang_menu_2')!!} <strong>{{ $service_type->title }}</strong> </h2>
        <div class="divider divider-short divider-full divider-primary"> <hr> </div>

        <div class="row service_lang_nav">
            <ul class="nav nav-pills">
                @foreach($languages as $language)
                    <li class="">
                        <a class="" href="<?php echo $_SERVER['REQUEST_URI']?>/to/{{$language->name}}"> <!--service lang link -->
                            {{$language->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
