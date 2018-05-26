<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CCfollowing extends Model
{
    public function scopeSearch($query, $er, $ed){
    	return $query->where([	['follower_id',$er]	, ['followed_id', $ed]	]);
    }
}
