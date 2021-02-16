<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent;

class ServiceCategory extends Model
{
	/**
	 * The Table Associated with the model
	 *
	 * @var string
	 */
	protected $table = 'service_categories';

    protected $fillable = [
        'id',
        'title',
        'excerpt',
        'image',
        'body',
        'seo_title',
        'meta_description',
        'meta_keywords',
        'slug',
        'id_lang',
    ];

	/**
	 * Builds Service Category/Locale Relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 *
	 */
	public function idLang() {
		return $this->belongsTo( Language::class );
	}

	/**
	 * Relation to Service Types
	 * @var string
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function serviceTypes()
	{
			return $this->hasMany('App\ServiceType', 'category_id');
	}

}
