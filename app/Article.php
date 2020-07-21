<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
	
	public $table = 'articles';
	
	protected $dates = [
		'published_at',
		'created_at',
		'updated_at',
		'deleted_at'
	];
	
    protected $fillable = [
        'title',
        'content',
        'introdution',
        'published_at',
		'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function scopePublished($query)
    {
        $query->where('published_at','<=',Carbon::now());
    }
}