<?php

namespace App\Http\Controllers;

use App\Helpers\UniversalTranslationHelper;
use App\Navigation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ErrorController extends Controller
{
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

	public function getNotFound (){
    	return view('errors.404');
    }

}
