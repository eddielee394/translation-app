<?php

namespace App\Http\Controllers;

use App\Helpers\UniversalTranslationHelper;
use App\Navigation;
use App\Post;
use App\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\PaginationServiceProvider;
use TCG\Voyager\Facades\Voyager;

class BlogController extends Controller
{
	//Translation Helper
	
	private $current_locale;
	private $lang_id;

	public function __construct() {

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
	 * @return mixed
	 */
	public function getIndex() {
		$posts = Post::where('id_lang',$this->lang_id)->orderBy('created_at','desc')->paginate(5);
		//Get ads
        $ads = DB::table('ads')->where('status', '=', '1')->get();

		return view('frontEnd.layouts.news.news-index')
            ->with('ads', $ads)
			->withPosts($posts);
	}

    public function getSingle($slug) {
    	// fetch from the DB based on slug
    	$post = DB::table('posts')
		->where('id_lang',$this->lang_id)
    	->where('slug', $slug)
    	->first();

    	//Get ads
        $ads = DB::table('ads')->where('status', '=', '1')->get();

    	//Get Author Name
     	$user = DB::table('users')
    				->where('id', '=', $post->author_id)
    				->first();

     	//Output Recent Posts
    	$recentPosts = DB::table('posts')
                        ->where('id_lang', '=', $this->lang_id)
    					->orderBy('created_at', 'desc')
    					->take(3)
    					->get();

		//Output services in widget on single post page
    	$services = DB::table('service_types as s')
    					->join('service_categories as c', 'c.id', '=', 'category_id')
    					->select('s.title as s_title', 's.excerpt', 's.slug as s_slug', 'c.slug as c_slug')
                        ->where('s.id_lang', '=', $this->lang_id)
						->inRandomOrder()
						->take(5)
						->get();

		// SEO Content for the page
	   $seo_title = $post->title;
	   $meta_description = $post->meta_description;
	   $meta_keywords = $post->meta_keywords;
	   $twitter_description = $post->meta_description;
	   $og_title = $seo_title;
	   $og_image = url(Voyager::image($post->image));
	   foreach($ads as $ad) {
            if ($ad->place == 'inlineArticle' && $ad->status == '1') {
                $inline = $ad->code;
            }
        }
        if(isset($inline)) {
            //get length of the post body
            $len = strlen($post->body);
            $half = $len / 2;
            //get the position of the '\n' nearly of the middle of the text
            $jump = strpos($post->body, "\r", $half);

            //cut the text on two parts
            $first = substr($post->body, 0, $jump);
            $last = substr($post->body, $jump, $len);

            //combine two parts with the ad in middle
            $post->body = $first . "<div class=\"content_adPost\"><div class=\"img img-response\"><p>" . $inline . "</p></div></div>" . $last;
        }

 		return view ('frontEnd.layouts.news.news-single', compact(
		    'seo_title',
		    'page_data',
		    'meta_description',
		    'meta_keywords',
		    'twitter_description',
		    'og_title',
		    'og_image')
	    )->with('recentPosts', $recentPosts)
	    ->with('post',$post)
	    ->with('user',$user)
	    ->with('ads',$ads)
	    ->with('services',$services);
    }
}
