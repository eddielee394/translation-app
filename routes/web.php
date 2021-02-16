<?php

	/*
	|--------------------------------------------------------------------------
	| Web Routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register web routes for your application. These
	| routes are loaded by the RouteServiceProvider within a group which
	| contains the "web" middleware group. Now create something great!
	|
	*/

	/**
	 * Non Localized Routes
	 *
	 * @info    Routes that should not be localized
	 *
	 */

	//Admin Route Group
	Route::group(['prefix' => 'admin'], function () {

		Voyager::routes();

		Route::get('/quotes/file-download/{file}','FileQuoteController@fileDownload')->name('file_download');

		$namespacePrefix = '\\'.config('voyager.controllers.namespace').'\\';

		$urlArray = explode('/',URL::current());
		if(isset($urlArray[4])) {
			$slug = $urlArray[4];
			Route::get('/voyager/{slug}/copy/{id}', $namespacePrefix . 'VoyagerBreadController@copy')->name('voyager.' . $slug . '.copy');
		};

        Route::post('/voyager/languages/duplicate', $namespacePrefix . 'VoyagerBreadController@duplicate')->name('voyager.languages.duplicate');

		/**
		 * Debug Routes
		 *
		 * @info  These routes are used to trigger artisan commands without CLI access using the admin/debug/* route
		 *
		 */

		Route::group( [ 'prefix' => 'debug' ], function () {

			//Clear Cache facade value:
			Route::get( '/clear-cache', function () {
				$exitCode = Artisan::call( 'cache:clear' );

				return '<h1>Cache facade value cleared</h1>';
			} );

			//Reoptimized class loader:
			Route::get( '/optimize', function () {
				$exitCode = Artisan::call( 'optimize' );

				return '<h1>Reoptimized class loader</h1>';
			} );

			//Create Route cache:
			Route::get( '/route-cache', function () {
				$exitCode = Artisan::call( 'route:cache' );

				return '<h1>Routes cached</h1>';
			} );

			//Clear Route cache:
			Route::get( '/route-clear', function () {
				$exitCode = Artisan::call( 'route:clear' );

				return '<h1>Route cache cleared</h1>';
			} );

			//Clear View cache:
			Route::get( '/view-clear', function () {
				$exitCode = Artisan::call( 'view:clear' );

				return '<h1>View cache cleared</h1>';
			} );

			//Create Config cache:
			Route::get( '/config-cache', function () {
				$exitCode = Artisan::call( 'config:cache' );

				return '<h1>Clear Config cleared</h1>';
			} );

			//Clear Config cache:
			Route::get( '/config-clear', function () {
				$exitCode = Artisan::call( 'config:clear' );

				return '<h1>Config Cache Clear</h1>';
			} );


		} );


	});

	//Newsletter Route
	Route::post('/newsletter/subscribe','NewsletterController@subscribe')->name('newsletter.subscribe');

	//Twitter
	Route::get('twitterUserTimeLine', 'TwitterApiController@twitterUserTimeLine');

	//Quote Form Submit
	Route::post('/quote/submit','QuoteController@submitForm')->name('quote_submit');
	Route::post('/quote/file-upload','QuoteController@fileUpload')->name('file_upload');


/**
 * Localized Frontend Routes
 *
 * @info Add all localized routes inside this group.  This group ALWAYS needs to load last.
 */

	Route::group(
		[
			'prefix' => LaravelLocalization::setLocale(),
			'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]
		], function()
	{
		/** Error Routes **/
		// Not Found
		Route::get('/404', 'ErrorController@getNotFound')->name('errors.404');

		//Home
		Route::get('/home', 'FrontendPageController@getHome')->name('home');

		//Static Routes
		Route::get('/', 'FrontendPageController@getIndex')->name('index');
		Route::get('/about', 'FrontendPageController@getAbout')->name('about');
		Route::get('/services', 'FrontendPageController@getServices')->name('services');
		Route::get('/quote','FrontendPageController@getQuote')->name('quote');


		Route::get('/contact', 'FrontendPageController@getContact')->name('contact');

		//News
		Route::get('/news/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
		Route::get('/news', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);

		//Service Categories
		Route::get('/services/{slug}',['as'=>'service.category','uses'=>'ServiceCategoryController@serviceCategory']);
		//	         ->where('slug','[A-Za-z0-9\-\/]+');

		//Service Types
		Route::get('/services/{serviceCategory}/{slug}',['as'=>'service.type','uses'=> 'ServiceTypeController@serviceType']);
		//	         ->where('slug', '[A-Za-z0-9\-\/]+');

		//Service Languages
		Route::get('/services/{serviceCategory}/{slug}/{language}', 'ServiceLanguageController@languageSelected')->name('languageselected');

		Route::get('/services/{serviceCategory}/{slug}/{language}/to/{language2}', 'ServiceLanguageController@languageToLanguage')->name('languageToLanguage');

		//Pages
		Route::get('{slug}', [
			'as'=>'generic',
			'uses' => 'FrontendPageController@getPage'
		])->where('slug', '[A-Za-z0-9\-\/]+');

		// Attachements
		Route::get('/storage/quote-attachements/{slug}', 'QuoteController@getAttachement')->name('attachement');

		// Contact
		Route::post('/contact/send', 'ContactController@sendEmail')->name('contact.send');

	});
