<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TextString extends Model
{
    protected $table ="text_strings";

    protected $fillable = [
        'id',
        'id_lang',
        'id_slug',
        'string'
    ];
	/**
	 * Builds TextString/Locale Relationship
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 *
	 */
	public function idLang() {
    	return $this->belongsTo(Language::class);
    }

	/**
	 * Builds TextSlug/TextString Relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 *
	 */
    public function idSlug () {
    	return $this->belongsTo(TextSlug::class);
	}
}
