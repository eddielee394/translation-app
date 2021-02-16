<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;
use App\Post;


class Category extends Model
{
    /**
	 * Builds Category/Post Relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 *
	 */

    protected $table = 'categories';


	public function posts()
	{
        return $this->hasMany('App\Post')
            ->published()
            ->orderBy('created_at', 'DESC');
    }

    public function parentId()
    {
        return $this->belongsTo(self::class);
	}

	/**
	 * Builds Category/Locale Relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 *
	 */
	public function idLang() {
		return $this->belongsTo( Language::class );
	}

}
