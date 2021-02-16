<?php

use App\Post;
use Illuminate\Support\Facades\DB;
use App\Language;


// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $langs = Language::all();
    $current_locale = LaravelLocalization::getCurrentLocale();

    foreach ($langs as $lang_data){
        if ($current_locale == $lang_data->slug){
            $lang_id = $lang_data->id;
        }
    }
    $page_data = DB::table('pages')->where('slug', '=', 'home')->where('id_lang', '=', $lang_id)->first();
    $breadcrumbs->push($page_data->title, route('home'));
});

// Home > About
Breadcrumbs::register('about', function($breadcrumbs)
{
    $langs = Language::all();
    $current_locale = LaravelLocalization::getCurrentLocale();

    foreach ($langs as $lang_data){
        if ($current_locale == $lang_data->slug){
            $lang_id = $lang_data->id;
        }
    }
    $page_data = DB::table('pages')->where('slug', '=', 'about')->where('id_lang', '=', $lang_id)->first();
    $breadcrumbs->parent('home');
    $breadcrumbs->push($page_data->title, route('about'));
});

// Home > Services
Breadcrumbs::register('services', function($breadcrumbs)
{
    $langs = Language::all();
    $current_locale = LaravelLocalization::getCurrentLocale();

    foreach ($langs as $lang_data){
        if ($current_locale == $lang_data->slug){
            $lang_id = $lang_data->id;
        }
    }
    $page_data = DB::table('pages')->where('slug', '=', 'services')->where('id_lang', '=', $lang_id)->first();
    $breadcrumbs->parent('home');
    $breadcrumbs->push($page_data->title, route('services'));

});

// Home > Free Quote
Breadcrumbs::register('quote', function($breadcrumbs)
{
    $langs = Language::all();
    $current_locale = LaravelLocalization::getCurrentLocale();

    foreach ($langs as $lang_data){
        if ($current_locale == $lang_data->slug){
            $lang_id = $lang_data->id;
        }
    }
    $page_data = DB::table('pages')->where('slug', '=', 'quote')->where('id_lang', '=', $lang_id)->first();
    $breadcrumbs->parent('home');
    $breadcrumbs->push($page_data->title, route('quote'));
});

// Home > News
Breadcrumbs::register('blog.index', function($breadcrumbs) {
    $langs = Language::all();
    $current_locale = LaravelLocalization::getCurrentLocale();

    foreach ($langs as $lang_data){
        if ($current_locale == $lang_data->slug){
            $lang_id = $lang_data->id;
        }
    }
    $page_data = DB::table('pages')->where('slug', '=', 'news')->where('id_lang', '=', $lang_id)->first();
    $breadcrumbs->parent('home');
    $breadcrumbs->push($page_data->title, route('blog.index'));
});


// Home > Contact Us
Breadcrumbs::register('contact', function($breadcrumbs)
{
    $langs = Language::all();
    $current_locale = LaravelLocalization::getCurrentLocale();

    foreach ($langs as $lang_data){
        if ($current_locale == $lang_data->slug){
            $lang_id = $lang_data->id;
        }
    }
    $page_data = DB::table('pages')->where('slug', '=', 'contact')->where('id_lang', '=', $lang_id)->first();
    $breadcrumbs->parent('home');
    $breadcrumbs->push($page_data->title, route('contact'));
});

// Home > FAQ
Breadcrumbs::register('faq', function($breadcrumbs) {
    $langs = Language::all();
    $current_locale = LaravelLocalization::getCurrentLocale();

    foreach ($langs as $lang_data){
        if ($current_locale == $lang_data->slug){
            $lang_id = $lang_data->id;
        }
    }
    $page_data = DB::table('pages')->where('slug', '=', 'faq')->where('id_lang', '=', $lang_id)->first();
    $breadcrumbs->parent('home');
    $breadcrumbs->push($page_data->title, route('faq'));
});

// Home > Careers
Breadcrumbs::register('careers', function($breadcrumbs) {
    $langs = Language::all();
    $current_locale = LaravelLocalization::getCurrentLocale();

    foreach ($langs as $lang_data){
        if ($current_locale == $lang_data->slug){
            $lang_id = $lang_data->id;
        }
    }
    $page_data = DB::table('pages')->where('slug', '=', 'careers')->where('id_lang', '=', $lang_id)->first();
    $breadcrumbs->parent('home');
    $breadcrumbs->push($page_data->title, route('careers'));
});

// Home > Services > Service Category
Breadcrumbs::register('service.category', function($breadcrumbs, $slug) {
    $langs = Language::all();
    $current_locale = LaravelLocalization::getCurrentLocale();

    foreach ($langs as $lang_data){
        if ($current_locale == $lang_data->slug){
            $lang_id = $lang_data->id;
        }
    }
    $category = DB::table('service_categories')->where('slug', '=', $slug)->where('id_lang', '=', $lang_id)->first();
    $breadcrumbs->parent('services');
    $breadcrumbs->push($category->title, route('service.category', $category->id));
});

// Home > Services > Service Category > Service type
Breadcrumbs::register('service.type', function($breadcrumbs, $category, $type) {
    $langs = Language::all();
    $current_locale = LaravelLocalization::getCurrentLocale();

    foreach ($langs as $lang_data){
        if ($current_locale == $lang_data->slug){
            $lang_id = $lang_data->id;
        }
    }
    $category_data = DB::table('service_categories')->where('slug', '=', $category)->where('id_lang', '=', $lang_id)->first();
    $type = DB::table('service_types')->where('slug', '=', $type)->where('id_lang', '=', $lang_id)->first();
    $breadcrumbs->parent('services');
    $breadcrumbs->push($category_data->title, route('service.category', $category));
    $breadcrumbs->push($type->title, route('service.type',[$category, $type->slug]));
});

// Home > Services > Service Category > Service type >from
Breadcrumbs::register('languageselected', function($breadcrumbs, $category, $type, $language) {
    $langs = Language::all();
    $current_locale = LaravelLocalization::getCurrentLocale();

    foreach ($langs as $lang_data){
        if ($current_locale == $lang_data->slug){
            $lang_id = $lang_data->id;
        }
    }
    $category_data = DB::table('service_categories')->where('slug', '=', $category)->where('id_lang', '=', $lang_id)->first();
    $type = DB::table('service_types')->where('slug', '=', $type)->where('id_lang', '=', $lang_id)->first();
    $breadcrumbs->parent('services');
    $breadcrumbs->push($category_data->title, route('service.category', $category));
    $breadcrumbs->push($type->title, route('service.type',[$category, $type->slug]));
	$breadcrumbs->push($language . ' ' . $type->title, route('languageselected',[$category, $type->slug, $language]));

});

// Home > Services > Service Category > Service type >from> to

Breadcrumbs::register('languageToLanguage', function($breadcrumbs, $category, $type, $language, $language2) {
    $langs = Language::all();
    $current_locale = LaravelLocalization::getCurrentLocale();

    foreach ($langs as $lang_data){
        if ($current_locale == $lang_data->slug){
            $lang_id = $lang_data->id;
        }
    }
    $category_data = DB::table('service_categories')->where('slug', '=', $category)->where('id_lang', '=', $lang_id)->first();
    $type = DB::table('service_types')->where('slug', '=', $type)->where('id_lang', '=', $lang_id)->first();
    $breadcrumbs->parent('services');
    $breadcrumbs->push($category_data->title, route('service.category', $category));
    $breadcrumbs->push($type->title, route('service.type',[$category, $type->slug]));
	$breadcrumbs->push($language . ' ' . $type->title, route('languageselected',[$category, $type->slug, $language]));
	$breadcrumbs->push($language . ' to ' . $language2 . ' ' . $type->title, route('languageToLanguage',[$category, $type->slug,$language, $language2]));

});

// Home > News -> Post Title
Breadcrumbs::register('blog.single', function($breadcrumbs) {

	$langs = Language::all();
	$current_locale = LaravelLocalization::getCurrentLocale();

	foreach ($langs as $lang_data){
		if ($current_locale == $lang_data->slug){
			$lang_id = $lang_data->id;
		}
	}

	$post = Post::where('id_lang', '=', $lang_id)->first();

	$breadcrumbs->parent('blog.index');
	$breadcrumbs->push($post->title, route('generic', $post->title));
});

// Home > Page
	if (!view('errors.404')) {
		Breadcrumbs::register('generic', function($breadcrumbs, $slug){
			$langs = Language::all();
			$current_locale = LaravelLocalization::getCurrentLocale();

			foreach ($langs as $lang_data){
				if ($current_locale == $lang_data->slug){
					$lang_id = $lang_data->id;
				}
			}

			$page_data = DB::table('pages')->where('slug','=',$slug)->where('id_lang', '=', $lang_id)->first();
			$breadcrumbs->parent('home');
			$breadcrumbs->push($page_data->title or '', route('generic', $page_data->id or ''));
		});
	}