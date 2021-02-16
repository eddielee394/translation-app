<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{

    /**
     *  The table associated with the model.
     *
     * @var string
     */
    protected $table ="service_types";

    protected $fillable = [
        'id',
        'title',
        'excerpt',
        'body',
        'image',
        'seo_title',
        'meta_description',
        'meta_keywords',
        'slug',
        'category_id',
        'id_lang',
        'feature_1',
        'feature_2',
        'feature_3',
    ];

    /**
	 * Builds Service Type/Locale Relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 *
	 */
	public function idLang() {
		return $this->belongsTo( Language::class );
	}

	/**
	 * Relation to Service Categories
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function serviceCategories()
	{
		return $this->belongsTo('App\ServiceCategory');
	}

}
