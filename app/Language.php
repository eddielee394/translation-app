<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Language extends Model
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


	public function pageLocale() {
		return $this->hasMany('App\Page');
	}

	public function adLocale() {
		return $this->hasMany('App\Ad');
	}
    
}
