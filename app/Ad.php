<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $table = 'ads';

    protected $fillable = [
        'id',
        'code',
        'place',
        'description'
    ];

	/**
	 * Builds Post/Locale Relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function idLang() {
		return $this->belongsTo( Language::class );
	}


}
