<?php

namespace App\Http\Controllers;

use App\Helpers\UniversalTranslationHelper;
use App\Navigation;
use Illuminate\Http\Request;
use App\ServiceCategory;
use Illuminate\Support\Facades\View;
use TCG\Voyager\Facades\Voyager;
use DB;

/**
 * Class ServiceCategoryController
 * @package App\Http\Controllers
 */
class ServiceCategoryController extends Controller
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
	 * Outputs service category by slug in url
	 * @param $slug
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function serviceCategory($slug){
		$service_category = ServiceCategory::where([
			['id_lang', $this->lang_id],
			['slug','=',$slug],
		])->first();
		// SEO Content for the page
		$seo_title = $service_category->seo_title;
		$meta_description = $service_category->meta_description;
		$meta_keywords = $service_category->meta_keywords;
		$twitter_description = $service_category->meta_description;
		$og_title = $seo_title;
		$og_image = url(Voyager::image($service_category->image));

        //Get ads
        $ads = DB::table('ads')->where('status', '=', '1')->get();

		return view('frontEnd.layouts.services.service-index', compact(
			'service_category',
			'seo_title',
			'meta_description',
			'meta_keywords',
			'twitter_description',
			'og_title',
			'og_image')
		)->with('service_category',$service_category)
        ->with('ads', $ads);
	}
}
