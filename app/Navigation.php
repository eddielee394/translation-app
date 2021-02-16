<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Navigation extends Model
{
	/**
	 * Builds Navigation/Locale Relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 *
	 */
	public function idLang() {
		return $this->belongsTo( Language::class );
	}

	/**
     * Builds Navigation Structure
     *
	 * @param $lang_slug
	 *
	 * @return array
	 */
	static function getStructure($lang_slug){
       
       $menu_struct = array();
       $menu_struct_collection = Navigation::where('id_lang', $lang_slug)
               ->where('id_parent', 0)
               ->orderBy('item_order', 'asc')
               ->take(10)
               ->get(['id','name','url']);
       
       
       foreach ($menu_struct_collection as $top_menu){
           
           $menu_item = new \stdClass();
           $menu_item->title = $top_menu->name;
           $menu_item->url = $top_menu->url;    
           
           $child_menu_struct = Navigation::where('id_lang', $lang_slug)
           ->where('id_parent', $top_menu->id)
           ->orderBy('item_order', 'asc')
           ->take(10)
           ->get(['id','name','url']);

           $childs = array();
           foreach ($child_menu_struct as $child_menu){
               $child_menu_item = new \stdClass();
               
               $child_menu_item->title = $child_menu->name;
               $child_menu_item->url = $child_menu->url;
               $childs[] = $child_menu_item;
               $child_child_menu_struct = DB::table('service_categories as sc')
                                          ->join('service_types as st', 'sc.id', '=', 'st.category_id')
                                          ->where('st.id_lang', '=', $lang_slug)
                                          ->where('sc.title', '=', $child_menu_item->title)
                                          ->get();

             $child_childs = array();
             $total_child_childs =0;
             foreach($child_child_menu_struct as $child_child_menu){
               $child_child_menu_item = new \stdClass();

               $child_child_menu_item->title = $child_child_menu->title;
               $child_child_menu_item->url = $child_child_menu->slug;
               $child_childs[] = $child_child_menu_item;

               $child_menu_item->child_childs = $child_childs;
               $child_menu_item->li_class = '';
               $child_menu_item->a_class = '';
               $total_child_childs = sizeof($child_childs);               
               $has_child_childs = 5;
               if($total_child_childs){
                 $has_child_childs = 5;
                 $child_menu_item->li_class = 'dropdown';
                 $child_menu_item->a_class = 'dropdown-toggle';
               }

               $child_menu_item->has_child_childs = $has_child_childs;
             }

           }
           $menu_item->childs = $childs;
           $menu_item->li_class = '';
           $menu_item->a_class = '';
           $total_childs = sizeof($childs);
           $has_childs = 0;
           if($total_childs){
               $has_childs = 1;
               $menu_item->li_class = 'dropdown';
               $menu_item->a_class = 'dropdown-toggle';
           }           

           $menu_item->has_childs = $has_childs;
           $menu_struct[] = $menu_item;

           //$menu_struct['childs'] = $child_menu_struct;
           
       }
       return $menu_struct;
   }
}

?>



