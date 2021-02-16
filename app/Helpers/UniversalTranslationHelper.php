<?php
namespace App\Helpers;


use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Language;
use App\TextSlug;
use App\TextString;

class UniversalTranslationHelper
{
    private $locale_data;
    private $translated;
    private $translated_en;


    public function __construct() {

        $langs = Language::active()->get()->all();
        $current_locale = LaravelLocalization::getCurrentLocale();

        foreach ($langs as $lang_data){
            if ($current_locale == $lang_data->slug){
                $lang_id = $lang_data->id;
            }

        }

        $this->locale_data['current_locale'] = $current_locale;
        $this->locale_data['lang_id'] = $lang_id;
        $this->locale_data['langs'] = $langs;


        $translated_strings = TextString::where('id_lang', $lang_id)
            ->join('text_slugs', 'text_strings.id_slug', '=', 'text_slugs.id')
            ->get(['slug', 'string']);

        foreach ($translated_strings as $transation){
            $this->translated[$transation->slug] = $transation->string;

        }



        $translated_strings_en = TextString::where('id_lang', 1)
            ->join('text_slugs', 'text_strings.id_slug', '=', 'text_slugs.id')
            ->get(['slug', 'string']);

        foreach ($translated_strings_en as $transation){
            $this->translated_en[$transation->slug] = $transation->string;
        }


    }


    public function translateText($slug)
    {

        if (isset($this->translated[$slug])){
            return $this->translated[$slug];
        } elseif(isset($this->translated_en[$slug])) {
            return $this->translated_en[$slug];
        }

        return $slug;
    }

    public  function getLocaleData()
    {
        return $this->locale_data;
    }

}
