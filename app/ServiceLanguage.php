<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceLanguage extends Model
{
	protected $table = "service_languages";

    protected $fillable = [
        'id',
        'name',
        'id_lang',
    ];

	/**
	 * Builds Service Language/Locale Relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 *
	 */
	public function idLang() {
		return $this->belongsTo( Language::class );
	}

	/**
	 * Service Type Relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function serviceTypes() {
		return $this->hasMany('App\ServiceType', 'id');
	}
}
