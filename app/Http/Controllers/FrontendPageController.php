<?php

namespace App\Http\Controllers;

use App\Helpers\UniversalTranslationHelper;
use App\Post;
use Illuminate\Routing\ControllerDispatcher;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Navigation;
use App\Page;
use Symfony\Component\EventDispatcher\Tests\Service;
use TCG\Voyager\Facades\Voyager;
use App\ServiceCategory;
use App\ServiceType;


class FrontendPageController extends Controller
{

	//Localization Helper

	public $current_locale;
	public $lang_id;

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


	//Home Page
    public function getIndex() {

	    //Get page content from db (localized)
	    $page_data = Page::where([

		    ['id_lang',$this->lang_id],
		    ['slug','=','home'],

	    ])->first();

        //Get ads
        $ads = DB::table('ads')->where('status', '=', '1')->get();

	    // SEO Content for the page
	    $seo_title = $page_data->seo_title;
	    $meta_description = $page_data->meta_description;
	    $meta_keywords = $page_data->meta_keywords;
	    $twitter_description = $page_data->meta_description;
	    $og_title = $seo_title;
	    $og_image = url(Voyager::image($page_data->image));


	    //Output Quote Form Variables
	    $service_categories_list = ServiceCategory::where('id_lang', $this->lang_id)->get(['title']);
	    $service_types_list = ServiceType::where('id_lang', $this->lang_id)->get(['title']);
	    $languages = DB::table('service_languages')
	                   ->where('id_lang','=',$this->lang_id)->get();


	    return view('frontEnd.pages.home', compact(
	    	'page_data',
		    'service_categories_list',
		    'service_types_list',
		    'languages',
		    'seo_title',
		    'meta_description',
		    'meta_keywords',
		    'twitter_description',
		    'og_title',
		    'og_image')
		    )->with('page_data', $page_data)
            ->with('ads',$ads);
    }

    //Home Page Redirect
	public function getHome() {
    	return redirect('/' . $this->current_locale , 301);
	}


    //About Us Page
    public function getAbout() {

	    //Get page content from db (localized)
	    $page_data = Page::where([
		    ['id_lang',$this->lang_id],
		    ['slug','=','about'],
	    ])->first();

        //Get ads
        $ads = DB::table('ads')->where('status', '=', '1')->get();

	    // SEO Content for the page
	    $seo_title = $page_data->seo_title;
	    $meta_description = $page_data->meta_description;
	    $meta_keywords = $page_data->meta_keywords;
	    $twitter_description = $page_data->meta_description;
	    $og_title = $seo_title;
	    $og_image = url(Voyager::image($page_data->image));

	    return view('frontEnd.pages.about', compact(
			    'page_data',
			    'service_categories_list',
			    'service_types_list',
			    'seo_title',
			    'meta_description',
			    'meta_keywords',
			    'twitter_description',
			    'og_title',
			    'og_image')
	    )->with('page_data', $page_data)
        ->with('ads', $ads);
    }

    //Services Page
	public function getServices() {

		//Get page content from db (localized)
		$page_data = Page::where([
			['id_lang',$this->lang_id],
			['slug','=','services'],
		])->first();

		//Get ads
        $ads = DB::table('ads')->where('status', '=', '1')->get();

		// SEO Content for the page
		$seo_title = $page_data->seo_title;
		$meta_description = $page_data->meta_description;
		$meta_keywords = $page_data->meta_keywords;
		$twitter_description = $page_data->meta_description;
		$og_title = $seo_title;
		$og_image = url(Voyager::image($page_data->image));


    	//dynamic localized output of service type by category

		$corporate_services_category = DB:: table ('service_categories')
		                                 ->where([
			                                 ['id_lang',$this->lang_id],
			                                 ['slug', '=', 'corporate']
		                                 ])->first(['id', 'title', 'excerpt']);

		$personal_services_category = DB:: table ('service_categories')
		                                ->where([
			                                ['id_lang',$this->lang_id],
			                                ['slug', '=', 'personal']
		                                ])->first(['id', 'title', 'excerpt']);
		$corporate_services = DB:: table('service_types')
		                        ->where([
			                        ['id_lang',$this->lang_id],
			                        ['category_id' ,'=', $corporate_services_category->id],
		                        ])->get();

		$personal_services = DB:: table('service_types')
		                       ->where([
			                       ['id_lang',$this->lang_id],
			                       ['category_id' ,'=', $personal_services_category->id],
		                       ])->get();

        return view('frontEnd.pages.services', compact(
		        'page_data',
		        'corporate_services',
		        'personal_services',		        
		        'corporate_services_category',
		        'personal_services_category',
		        'service_categories_list',
		        'service_types_list',
		        'seo_title',
		        'meta_description',
		        'meta_keywords',
		        'twitter_description',
		        'og_title',
		        'og_image')
        )->with('page_data', $page_data)
        ->with('ads', $ads);
    }

	//Free Quote Page
    public function getQuote() {


	    //Get page content from db (localized)
	    $page_data = Page::where([
		    ['id_lang',$this->lang_id],
		    ['slug','=','quote'],
	    ])->first();

        //Get ads
        $ads = DB::table('ads')->where('status', '=', '1')->get();

	    // SEO Content for the page
	    $seo_title = $page_data->seo_title;
	    $meta_description = $page_data->meta_description;
	    $meta_keywords = $page_data->meta_keywords;
	    $twitter_description = $page_data->meta_description;
	    $og_title = $seo_title;
	    $og_image = url(Voyager::image($page_data->image));

	    //Get the Service Types & Categories
        $service_categories_list = ServiceCategory::where('id_lang', $this->lang_id)->get(['title']);
        $service_types_list = ServiceType::where('id_lang', $this->lang_id)->get(['title']);

        //Get the Service Languages
	    $languages = DB::table('service_languages')
	                   ->where('id_lang','=',$this->lang_id)->get();

        $tpl_vars = array();
        return view('frontEnd.pages.quote', compact(
	        'page_data',
	        'service_categories_list',
	        'service_types_list',
	        'languages',
	        'seo_title',
	        'meta_description',
	        'meta_keywords',
	        'twitter_description',
	        'og_title',
	        'og_image')
	        )->with('tpl_vars',$tpl_vars)
            ->with('ads', $ads);

    }

    //Contact Us Page
    public function getContact() {

	    //Get page content from db (localized)
	    $page_data = Page::where([
		    ['id_lang',$this->lang_id],
		    ['slug','=','contact'],
	    ])->first();

        //Get ads
        $ads = DB::table('ads')->where('status', '=', '1')->get();

	    // SEO Content for the page
	    $seo_title = $page_data->seo_title;
	    $meta_description = $page_data->meta_description;
	    $meta_keywords = $page_data->meta_keywords;
	    $twitter_description = $page_data->meta_description;
	    $og_title = $seo_title;
	    $og_image = url(Voyager::image($page_data->image));

	    return view('frontEnd.pages.contact', compact(
			    'page_data',
			    'service_categories_list',
			    'service_types_list',
			    'seo_title',
			    'meta_description',
			    'meta_keywords',
			    'twitter_description',
			    'og_title',
			    'og_image')
	    )->with('page_data', $page_data)
        ->with('ads', $ads);
    }


    //Generic Pages
    public function getPage($slug) {

	    //Get page content from db (localized)
        $page_data = Page::where([

                ['id_lang',$this->lang_id],
                ['slug','=',$slug],
        ])->first();

        //Get ads
        $ads = DB::table('ads')->where('status', '=', '1')->get();

	    // SEO Content for the page
	    $seo_title = $page_data->title;
	    $meta_description = $page_data->meta_description;
	    $meta_keywords = $page_data->meta_keywords;
	    $twitter_description = $page_data->meta_description;
	    $og_title = $seo_title;
	    $og_image = url(Voyager::image($page_data->image));


        $ads = DB::table('ads')->get();
	    return view('frontEnd.pages.general', compact(
			    'seo_title',
			    'meta_description',
			    'meta_keywords',
			    'twitter_description',
			    'og_title',
			    'og_image')
		    )->with('page_data', $page_data)
            ->with('ads', $ads);
    }

}





