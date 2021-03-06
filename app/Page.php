<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Page extends Model
{
	/**
	 * Statuses.
	 */
	const STATUS_ACTIVE = 'ACTIVE';
	const STATUS_INACTIVE = 'INACTIVE';

	/**
	 * List of statuses.
	 *
	 * @var array
	 */
	public static $statuses = [ self::STATUS_ACTIVE, self::STATUS_INACTIVE ];

	protected $guarded = [];

	public function save( array $options = [] ) {
		// If no author has been assigned, assign the current user's id as the author of the post
		if ( ! $this->author_id && Auth::user() ) {
			$this->author_id = Auth::user()->id;
		}

		parent::save();
	}

	/**
	 * Scope a query to only include active pages.
	 *
	 * @param  $query  \Illuminate\Database\Eloquent\Builder
	 *
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeActive( $query ) {
		return $query->where( 'status', static::STATUS_ACTIVE );
	}

	/**
	 * Builds Page/Locale Relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 *
	 */
	public function idLang() {
		return $this->belongsTo( Language::class );
	}
}
