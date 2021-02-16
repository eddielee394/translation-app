<?php

namespace App\Http\Controllers\Voyager;

use TCG\Voyager\Http\Controllers\VoyagerBreadController as BaseVoyagerBreadController;

use Illuminate\Http\Request;

use TCG\Voyager\Facades\Voyager;

use DB;
use App\Ad;
use App\Page;
use App\Category;
use App\Post;
use App\Quote;
use App\ServiceCategory;
use App\ServiceLanguage;
use App\ServiceType;
use App\Navigation;
use App\TextString;


class VoyagerBreadController extends BaseVoyagerBreadController
{
    // POST BRE(A)D
    public function duplicate(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        Voyager::canOrFail('add_'.$dataType->name);

        //Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows);

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }

        if (!$request->ajax()) {
            $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());

            //set all tables to duplicate
            if($request->duplicate == 'on'){
                $tables = [
                    "categories" => ["class" => "App\Category", "table" => "categories"],
                    "navigations" => ["class" => "App\Navigation", "table" => "navigations"],
                    "pages" => ["class" => "App\Page", "table" => "pages"],
                    "posts" => ["class" => "App\Post", "table" => "posts"],
                    "service_categories" => ["class" => "App\ServiceCategory", "table" => "service_categories"],
                    "service_languages" => ["class" => "App\ServiceLanguage", "table" => "service_languages"],
                    "service_types" => ["class" => "App\ServiceType", "table" => "service_types"],
                    "text_strings" => ["class" => "App\TextString", "table" => "text_strings"]
                ];

                foreach ($tables as $table){
                    $records = DB::table($table['table'])->where('id_lang', 1)->get();
                    foreach ($records as $record) {

                        $toCopy = $table['class']::find($record->id);
                        $toCopy->id_lang = $data->id;
                        $copy = $toCopy->replicate();
                        if ($table['table'] == 'navigations'){
                            if ($copy->name == 'Corporate' || $copy->name == 'Personal')
                                if(isset($parentIdServices))
                                    $copy->id_parent = $parentIdServices;
                            if ($copy->name == 'Contact Us' || $copy->name == 'FAQ')
                                if(isset($parentIdContact))
                                    $copy->id_parent = $parentIdContact;
                        }
                        $copy->save();

                        if ($table['table'] == 'navigations'){
                            if ($copy->name == 'Translation Services')
                                $parentIdServices = $copy->id;
                            if ($copy->name == 'Contact' && $copy->id_parent == 0)
                                $parentIdContact = $copy->id;
                        }
                    }
                }
            }

            return redirect()
                ->route("voyager.{$dataType->slug}.edit", ['id' => $data->id])
                ->with([
                    'message'    => "Successfully Added New {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
        }
    }
    public function copy($slug, $id){
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        //Replace '-' for '_' on $slug to search on table
        $table = str_replace('-', "_", $slug);

        if($slug == 'textslugs' ){
            $table = 'text_slugs';
        }

        if( $slug == 'textstrings'){
            $table = 'text_strings';
        }
        $version = phpversion();
        $versionNumber = (int) $version;
        if($versionNumber >= 7){
            $toCopy = $dataType->model_name->find($id);
            $copy = $toCopy->replicate();
            $copy->save();
        }

        else{
            //Select the row on db to copy
            $toCopy = DB::table($table)->where('id', $id)->first();

            //Select the last id to increment
            $last_id = DB::table($table)->select('id')->orderBy('id', 'desc')->first();
            $toCopy->id = $last_id->id+1;

            //Convert the querry result on array to copy
            $toCopyArray = (array) $toCopy;

            $copy = new $dataType->model_name($toCopyArray);
            $copy ->save();
        }


        return redirect()
                ->route("voyager.{$dataType->slug}.edit", ['id' => $copy->id])
                ->with([
                    'message'    => "Successfully Added New {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
    }


}
