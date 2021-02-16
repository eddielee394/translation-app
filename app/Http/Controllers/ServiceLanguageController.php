<?php

namespace App\Http\Controllers;

use App\Helpers\UniversalTranslationHelper;
use App\Navigation;
use App\ServiceType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use TCG\Voyager\Facades\Voyager;
use App\Page;

/**
 * Class ServiceCategoryController
 * @package App\Http\Controllers
 */
class ServiceLanguageController extends Controller
{
	public $current_locale;
	public $lang_id;

	public function __construct() {

		$ut_helper = new UniversalTranslationHelper();

		//$languages_data = UniversalTranslationHelper::getLocaleData();
		$languages_data = $ut_helper->getLocaleData();

		$this->current_locale = $languages_data['current_locale'];
		$this->lang_id        = $languages_data['lang_id'];

		View::share( 'langs', $languages_data['langs'] );

		View::share( 'current_locale', $this->current_locale );
		View::share( 'lang_id', $this->lang_id );

		$nav = Navigation::getStructure( $this->lang_id );

		View::share( 'nav', $nav );
		View::share( 'UniversalTranslationHelper', $ut_helper );
	}

	/**
	 * Outputs service category by slug in url
	 * @param $slug
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function languageSelected($serviceCategory,$slug,$language)
    {
     
        //Get page content from db (localized)
        $service_type = ServiceType::where([
            ['id_lang', $this->lang_id],
            ['slug','=',$slug],
            ])->first();

        //Get ads
        $ads = DB::table('ads')->where('status', '=', '1')->get();

        //get the service type by category
	    $services = DB::table('service_types as s')
	                 ->join('service_categories as c', 'c.id', '=', 'category_id')
	                 ->select('s.title as s_title', 's.slug as s_slug', 'c.slug as c_slug', 'category_id')
                     ->where('s.id_lang', '=', $this->lang_id)
	                 ->get();

	   //Check for the Service Language by locale
	   $languages = DB::table('service_languages')
                       ->where('id_lang','=',$this->lang_id)->get();


	   // SEO Content for the page
	   $seo_title = 'Translate '.$language .' '. $service_type->title;
	   $meta_description = $service_type->meta_description. 'from ' .$language;
       $meta_keywords = $language.', '.$service_type->meta_keywords;
       $twitter_description = $service_type->meta_description;
	   $og_title = $seo_title;
	   $og_image = url(Voyager::image($service_type->image));

	   $noindex = 'TRUE';


 		return view ('frontEnd.layouts.services.service-single', compact(
 			'services',
 			'page_data',
		    'seo_title',
		    'meta_description',
		    'meta_keywords',
		    'twitter_description',
		    'og_title',
		    'og_image')
	    )->with('service_type', $service_type)
         ->with('languages',$languages)
         ->with('noindex', $noindex)
         ->with('ads', $ads)
         ->with('language',$language);
   }

   public function languageToLanguage($serviceCategory,$slug,$language,$language2)
   {        

        //Get page content from db (localized)
        $service_type = ServiceType::where([
            ['id_lang', $this->lang_id],
            ['slug','=',$slug],
            ])->first();
       $page_data = Page::where([
           ['id_lang',$this->lang_id],
           ['slug','=','services'],
       ])->first();

       //Get ads
       $ads = DB::table('ads')->where('status', '=', '1')->get();

        $services = DB::table('service_types as s')
	                 ->join('service_categories as c', 'c.id', '=', 'category_id')
	                 ->select('s.title as s_title', 's.slug as s_slug', 'c.slug as c_slug', 'category_id')
                     ->where('s.id_lang', '=', $this->lang_id)
	                 ->get();

	   // SEO Content for the page
       $seo_title = 'Translate '.$language .' '. $service_type->title.' to '.$language2;
       $meta_description = $service_type->meta_description .'from '. $language .' to '.$language2;
       $meta_keywords = $language .', '. $language2 .', '. $service_type->meta_keywords;
	   $twitter_description = $service_type->meta_description;
	   $og_title = $seo_title;
	   $og_image = url(Voyager::image($service_type->image));

       $noindex = 'TRUE';

	   return view ('frontEnd.layouts.services.service-single', compact(
			   'services',
			   'page_data',
			   'seo_title',
			   'meta_description',
			   'meta_keywords',
			   'twitter_description',
			   'og_title',
			   'og_image')
	   )->with('service_type', $service_type)
		->with('language',$language)
        ->with('ads', $ads)
        ->with('noindex', $noindex)
		->with('language2',$language2);
   }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

	    //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \App\ServiceCategory
     */
    public function show()
    {
//	    return $serviceCategory;
//
//	    return view ('frontEnd.layouts.services.service-index', compact('service_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }


}
