<?php

namespace App\Http\Controllers;

use App\Helpers\UniversalTranslationHelper;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Page;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

	//Localization Helper

	public $current_locale;
	public $lang_id;

	public function __construct() {
        $this->middleware('auth');
		$ut_helper = new UniversalTranslationHelper();

		//$languages_data = UniversalTranslationHelper::getLocaleData();
		$languages_data = $ut_helper->getLocaleData();

		$this->current_locale = $languages_data['current_locale'];
		$this->lang_id = $languages_data['lang_id'];

		View::share('langs', $languages_data['langs']);

		View::share('current_locale', $this->current_locale);
		View::share('lang_id', $this->lang_id);

		$nav = Navigation::getStructure($this->lang_id);

		View::share('nav', $nav);
		View::share('UniversalTranslationHelper', $ut_helper);

	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	//Find post in database and output to index
        $posts = Post::orderBy('id', 'desc')->where('id_lang',$this->lang_id)->paginate(5);

        //Output a random post
	    $random_posts = Post::where('id_lang',$this->lang_id)->where('id', '<>', $post->id)->take(4)->get();

	    // SEO Content for the page
	    $seo_title = $posts->title;
	    $meta_description = $posts->meta_description;
	    $meta_keywords = $posts->meta_keywords;
	    $twitter_description = $posts->meta_description;
	    $og_title = $seo_title;
	    $og_image = url(Voyager::image($posts->image));

        return view('frontEnd.layouts.news.news-single', compact(
	        'posts',
	        'page_data',
	        'random_posts',
	        'seo_title',
	        'meta_description',
	        'meta_keywords',
	        'twitter_description',
	        'og_title',
	        'og_image')
        )->withPosts($posts);
    }
}
