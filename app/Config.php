<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    //
	protected $guarded = ['id','created_at','updated_at'];
	
	protected $casts = [
        'server' => 'array',
		'limit' => 'array',
		'casher' => 'array',
		'frontend' => 'array',
    ];
}
