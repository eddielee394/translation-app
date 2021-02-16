<?php

namespace App\Http\Controllers;

use App\Helpers\UniversalTranslationHelper;
use App\Navigation;
use App\ServiceType;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Voyager;
use App\Page;

/**
 * Class ServiceTypeController
 * @package App\Http\Controllers
 */
class ServiceTypeController extends Controller
{
	//Translation Helper functions
	
	private $current_locale;
	private $lang_id;

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
		//.. End translation helper

	/**
	 * Outputs service type by slug in url
	 *
	 * @param $serviceCategory
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 * @internal param $slug
	 *
	 */
	public function serviceType($serviceCategory, $slug){
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

		// Check for the service language by locale
		$languages = DB::table('service_languages')
		               ->where('id_lang','=',$this->lang_id)->get();


		// SEO Content for the page
        $seo_title = $service_type->seo_title;
        $meta_description = $service_type->meta_description;
		$meta_keywords = $service_type->meta_keywords;
		$twitter_description = $service_type->meta_description;
		$og_title = $seo_title;
		$og_image = url(Voyager::image($service_type->image));
		return view ('frontEnd.layouts.services.service-single', compact(
			'service_type',
			'page_data',
			'services',
			'seo_title',
			'meta_description',
			'meta_keywords',
			'twitter_description',
			'og_title',
			'og_image')
		)->with('service_type', $service_type)
		->with('language','')
		->with('current_lang',$this->lang_id)
		->with('ads',$ads)
		->with('languages', $languages);
	}

}
