<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
	protected $fillable = [
    	'content','article_id'
    ];
    /**
     * Get the post that owns the comment.
     */
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
